<?php
class db extends app {

################################################
    /* GESTION DES CONNEXIONS A LA BASE MYSQL */
###############################################
        static $dbInfos = array(
            0 => array(
                'server'    =>'db491656929.db.1and1.com',
                'user'      =>'dbo491656929',
                'pw'        =>'22560113',
                'base'      =>'db491656929',
                'type'      =>'mysql'
                )
        );

    function connexionDBO($db=0) {
/* CONNEXION A LA BASE DE DONNEES */


        $s = self::$dbInfos[$db]['server'];
        $u = self::$dbInfos[$db]['user'];
        $p = self::$dbInfos[$db]['pw'];
        $b = self::$dbInfos[$db]['base'];
        $t = self::$dbInfos[$db]['type'];

        try {
            $DB = new PDO($t . ':host=' . $s . ';dbname=' . $b, $u, $p);

            return $DB;
        } catch (PDOException $e) {
            msg::error(ui::rimg("error","64")." erreur de connexion serveur");
        }
    }

    function connexionDBOSQLITE($db) {
        try {
            $DB = new PDO('sqlite:p.sql');
            return $DB;
        } catch (PDOException $exception) {
            msg::error(ui::rimg("error","64")." erreur de connexion serveur");
        }
    }

#################################################
    /* GESTION DES REQUETES MYSQL */
#################################################

    function reqExec($p,$param="") {
        extract($p);
        $DB = self::connexionDBO($db);

        switch ($mode) {
            case "query":
                $r = $DB->query($cde);
                break;
            case "exec":
                $r = $DB->exec($cde);
                break;
            case "prepare":
                $rPrepa = $DB->prepare($cde);
                $r = $rPrepa->execute();
                break;
        }
        if ($param=="lastInsertId")
            return $DB->lastInsertId();
        else
            return $r;
    }

    /*
     * function reqSlt
     * @param $p['select']
     * @param $p['from']
     * @param $p['where']
     * @param $p['having']
     * @param $p['group']
     * @param $p['nbrsResult']
     * @param $p['sens']
     * @param $p['curPage']
     */

    function reqSlt($p) {
        self::mod_load("evaluate");
        //attribution de valeurs par defaut pour le tableau $p
        // scan les valeurs de chaque Key lister dans $scanKeyList dans le tableau $p et retourne les valeur vides si elle n'existe pas
        $scanKeyList = array('order', 'sens', 'where', 'having', 'group', 'limit');
        $p = evaluate::returnEmpty($scanKeyList, $p);

        // champs à selectionner
        $p['select'] = (empty($p['select'])) ? '*' : $p['select'];

        // construction des elements de la requete
        $select = 'SELECT ' . $p['select'];
        $from = 'FROM ' . $p['from'];
        $where = ($p['where'] != '') ? 'WHERE ' . $p['where'] : '';
        $having = ($p['having'] != '') ? 'HAVING ' . $p['having'] : '';
        $group = ($p['group'] != '') ? 'GROUP BY ' . $p['group'] : '';
        $order = ($p['order'] != '') ? 'ORDER BY ' . $p['order'] . ' ' . $p['sens'] : '';

        if (!empty($p['limit'])) {
            // identifi la page courrante du resultat
            $p['curPage'] = (empty($p['curPage'])) ? '1' : $p['curPage'];
            $p['start'] = $p['limit'] * ($p['curPage'] - 1);
            $p['stop'] = $p['limit'];

            $limit = 'LIMIT ' . $p['start'] . '  ,  ' . $p['stop'];
        }
        else
            $limit = "";

        // construction de la requete
        $cde = $select . ' ' . $from . ' ' . $where . ' ' . $group . ' ' . $having . ' ' . $order . ' ' . $limit;

        if (isset($p['mode']) && $p['mode'] == "cde")
            return $cde;
        else {
            // paramétrage d'execution de la requete
            $pExec['db'] = (empty($p['db']) || !isset($p['db'])) ? "0" : $p['db'];
            $pExec['mode'] = (!isset($p['mode']) || $p['mode'] = "") ? "query" : $p['mode'];
            $pExec['cde'] = $cde;
            // execution de la requete
            $r = db::reqExec($pExec);

            return $r;
        }
    }

    function reqTotalPag($p, $select = "*") {
        $limit = $p['limit'];

        $p['select'] = $select;
        $p['limit'] = '';
        $p['curPage'] = '';

        $r = self::reqSlt($p);

        $count = $r->rowCount(); // nb de resultat
        $nbPag = ceil($count / $limit); //nb de page

        return $nbPag;
    }

    /*
     * function reqAdd
     * @param $p['insert_into']
     * @param $p['where']
     */

    function reqAdd($p,$param,$protect=false) {

        //attribution de valeurs par defaut pour le tableau $p

        $insert_into = 'INSERT INTO ' . $p['insert_into'];
        $nameList = '';
        $valueList = '';

        if($protect){
            mnk::mod_load("evaluate");
            $p['value'] = evaluate::slasheArray($p['value']);
        }

        // construction de la liste des colonnes et des valeurs qui leurs sont attribuées.
        foreach ($p['value'] as $key => $value) {
            $nameList .= $key . ",";
            $valueList .= "'" . $value . "',";
        }
        // on supprime la derniere virgule de la chaine des colonnes
        $strSize = strlen($nameList);
        $nameList = substr($nameList, 0, ($strSize - 1));

        // on supprime la derniere virgule de la chaine des valeurs
        $strSize = strlen($valueList);
        $valueList = substr($valueList, 0, ($strSize - 1));

        $fieldName = '(' . $nameList . ')';

        $fieldValue = 'VALUES (' . $valueList . ')';

        $cde = $insert_into . ' ' . $fieldName . ' ' . $fieldValue;

        if (isset($p['mode']) && $p['mode'] == "cde")
            return $cde;
        else {
            $pExec['db'] = (empty($p['db']) || !isset($p['db'])) ? "0" : $p['db'];
            $pExec['mode'] = (!isset($p['mode']) || $p['mode'] = "") ? "query" : $p['mode'];
            $pExec['cde'] = $cde;

            $r = self::reqExec($pExec,$param);

            return $r;
        }
    }

    /*
     * function reqDel
     * @param $p['from']
     * @param $p['where']
     */

    function reqDel($p) {

        $scanKeyList = array('from', 'where');
        $p = self::returnEmpty($scanKeyList, $p);

        $delete = 'DELETE FROM ' . $p['from'];
        $where = 'WHERE ' . $p['where'];

        $cde = $delete . ' ' . $where;

        if (isset($p['mode']) && $p['mode'] == "cde")
            return $cde;

        else {
            $pExec['db'] = (empty($p['db']) || !isset($p['db'])) ? "0" : $p['db'];
            $pExec['mode'] = (!isset($p['mode']) || $p['mode'] = "") ? "exec" : $p['mode'];
            $pExec['cde'] = $cde;

            $r = self::reqExec($pExec);
            return $r;
        }
    }




    /*
     * function reqUpd
     * @param $p['update']
     * @param $p['where']
     * @param $p['value']
     */

    function reqUpd($p,$protect=false) {



        $p['db'] = (empty($p['db']) || !isset($p['db'])) ? "0" : $p['db'];

        //attribution de valeurs par defaut pour le tableau $p
        $scanKeyList = array('update', 'where');
       // $p = self::returnEmpty($scanKeyList, $p);

        $nameValueList = '';


        if($protect){
            mnk::mod_load("evaluate");
            $p['value'] = evaluate::slasheArray($p['value']);
        }
        // construction de la liste des colonnes et des valeurs qui leurs sont attribuées.
        foreach ($p['value'] as $key => $value) {
            if (!is_array($value))
                $nameValueList .= $key . "='" . $value . "',";
            else {
                $nameValueList .= $key . " = CASE " . $p['case'];
                foreach ($value as $keyCase => $valueSet) {
                    $nameValueList .= " WHEN " . $keyCase . " THEN " . $valueSet . " ";
                }
                $nameValueList .= " END ";
            }
        }

        // on supprime la derniere virgule de la chaine des colonnes
        $strSize = strlen($nameValueList);
        $nameValueList = substr($nameValueList, 0, ($strSize - 1));

        $update = 'UPDATE ' . $p['update'];
        $fieldValue = 'SET ' . $nameValueList;
        $where = 'WHERE ' . $p['where'];

        $cde = $update . ' ' . $fieldValue . ' ' . $where;



        if (isset($p['mode']) && $p['mode'] == "cde")
            return $cde;
        else {
            $pExec['db'] = (empty($p['db']) || !isset($p['db'])) ? "0" : $p['db'];
            $pExec['mode'] = (!isset($p['mode']) || $p['mode'] = "") ? "exec" : $mode;
            $pExec['cde'] = $cde;
            $r = self::reqExec($pExec);
            return $r;
        }
    }

    static function reqFile($file){
        $req=file_get_contents ($file);
        $req=str_replace("\n","",$req);
        $req=str_replace("\r","",$req);

         $pExec = array(
             'db'       => 0,
             'mode'   => "exec",
             'cde'      => $req
             );

        self::reqExec($pExec);
    }


    // format la date pour les insertions de la base de donnée
    function dbTime($timestamp="") {
        $timestamp = ($timestamp=="")?time():$timestamp;
        $dateDB = date("Y-m-j H:i:s",$timestamp);
        return $dateDB;
    }






    /******************************************************************************/
/*                                                                            */
/*                       __        ____                                       */
/*                 ___  / /  ___  / __/__  __ _____________ ___               */
/*                / _ \/ _ \/ _ \_\ \/ _ \/ // / __/ __/ -_|_-<               */
/*               / .__/_//_/ .__/___/\___/\_,_/_/  \__/\__/___/               */
/*              /_/       /_/                                                 */
/*                                                                            */
/*                                                                            */
/******************************************************************************/
/*                                                                            */
/* Titre          : Dump (sauvegarde) avec PHP d'une base de donnée MySQL     */
/*                                                                            */
/* URL            : http://www.phpsources.org/scripts612-PHP.htm              */
/* Auteur         : miragoo                                                   */
/* Date édition   : 28 Oct 2010                                               */
/*                                                                            */
/******************************************************************************/

// $mode = 1 les tables
// $mode = 2 les tables et les champs.
function dump($dbID, $dirFile, $mode)
{
    $connexion = mysql_connect(self::$dbInfos[$dbID]['server'], self::$dbInfos[$dbID]['user'], self::$dbInfos[$dbID]['pw']);
    mysql_select_db(self::$dbInfos[$dbID]['base'], $connexion);

    $entete  = "-- ----------------------\n";
    $entete .= "-- dump de la base ".$base." au ".date("d-M-Y")."\n";
    $entete .= "-- ----------------------\n\n\n";
    $creations = "";
    $insertions = "\n\n";

    $listeTables = mysql_query("show tables", $connexion);
    while($table = mysql_fetch_array($listeTables))
    {
        // structure ou la totalité de la BDD
        if($mode == 1 || $mode == 2)
        {
            $creations .= "-- -----------------------------\n";
            $creations .= "-- Structure de la table ".$table[0]."\n";
            $creations .= "-- -----------------------------\n";
            $listeCreationsTables = mysql_query("show create table ".$table[0], $connexion);
            while($creationTable = mysql_fetch_array($listeCreationsTables))
            {
              $creations .= $creationTable[1].";\n\n";
            }
        }
        // données ou la totalité
        if($mode > 1)
        {
            $donnees = mysql_query("SELECT * FROM ".$table[0]);
            $insertions .= "-- -----------------------------\n";
            $insertions .= "-- Contenu de la table ".$table[0]."\n";
            $insertions .= "-- -----------------------------\n";
            while($nuplet = mysql_fetch_array($donnees))
            {
                $insertions .= "INSERT INTO ".$table[0]." VALUES(";
                for($i=0; $i < mysql_num_fields($donnees); $i++)
                {
                  if($i != 0)
                     $insertions .=  ", ";
                  if(mysql_field_type($donnees, $i) == "string" || mysql_field_type($donnees, $i) == "blob" || mysql_field_type($donnees, $i) == "datetime")
                     $insertions .=  "'";
                  $insertions .= addslashes($nuplet[$i]);
                  if(mysql_field_type($donnees, $i) == "string" || mysql_field_type($donnees, $i) == "blob" || mysql_field_type($donnees, $i) == "datetime")
                    $insertions .=  "'";
                }
                $insertions .=  ");\n";
            }
            $insertions .= "\n";
        }
    }

    mysql_close($connexion);

    $file = $dirFile."/save_".date("Y-m-d_G-i").".sql";
    if (file_put_contents($file, $entete.$creations.$insertions))
        return msg::success("MySQL DB id : ".$dbID." Export -> <strong>Ok</strong>");
    else
        return msg::error("La sauvegarde ne c'est pas effectuer normalement ! ");
}




}
    ?>
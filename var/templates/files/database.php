<?php


    // $dbInfos = [
    //     'server'    => 'localhost:8888',
    //     'user'      => 'root',
    //     'pw'        => 'root',
    //     'base'      => 'databasename',
    //     'type'      => 'mysql'
    // ];

    // $file = $dirFile."/save_".date("Y-m-d_G-i").".sql";

/**
* database
*/
class database
{
    var $dbInfo;
    var $file;

    function __construct($dbInfos, $file)
    {
        $this->dbInfos = $dbInfos;
        $this->file    = $file;
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
    function dump($mode)
    {

        $connexion = mysql_connect($this->dbInfos[$dbID]['server'], $this->dbInfos[$dbID]['user'], $this->dbInfos[$dbID]['pw']);
        mysql_select_db($this->dbInfos[$dbID]['base'], $connexion);

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
                      if(mysql_field_type($donnees, $i) == "string" ||
    mysql_field_type($donnees, $i) == "blob" ||
    mysql_field_type($donnees, $i) == "datetime")
                         $insertions .=  "'";
                      $insertions .= addslashes($nuplet[$i]);
                      if(mysql_field_type($donnees, $i) == "string" ||
    mysql_field_type($donnees, $i) == "blob" ||
    mysql_field_type($donnees, $i) == "datetime")
                        $insertions .=  "'";
                    }
                    $insertions .=  ");\n";
                }
                $insertions .= "\n";
            }
        }

        mysql_close($connexion);


        $put = file_put_contents($this->file, $entete.$creations.$insertions);

        if ($put) {

            $r = [
                'infotype' => "success",
                'msg'      => "MySQL DB id : ".$dbID." Export -> <strong>Ok</strong>",
                'data'     => ''
            ];
        }

        else{
            $r = [
                'infotype' => "error",
                'msg'      => "La sauvegarde ne c'est pas effectuer normalement ! ",
                'data'     => ''
            ];
        }

        return $r;
    }

}
 ?>
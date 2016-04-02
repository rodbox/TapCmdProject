<?php
class parse extends app {

    var $reg = [
        'php'=>[
            'namespace' => "/namespace\s{1,}([a-zA-Z\\\]{0,})/",
            'class'     => "/class\s{1,}([a-zA-Z0-9_]{1,})/",
            'extends'   => "/extends\s{1,}([a-zA-Z0-9_]{1,})/",
            'use'       => "/use\s{1,}([a-zA-Z\\\]{1,})/",
            'function'  => "/(public|static|private){0,}\s{0,}function\s{1,}([a-zA-Z\_]{0,}\s{0,})\(([\$=\'\,a-zA-Z\s\[\]]{0,})\)/",
            'parent'    => "/public function\s{1,}([a-zA-Z0-9_\(\)\{\}\s]{1,})'([a-zA-Z]{0,})'/",
            'var'       => "/\\$([a-zA-Z_]{1,})/"
        ],
        'twig' => [
            'block'   => "/{% block ([a-zA-Z]{1,}) -{0,}%}/",
            'extends' => "/{% extends ([a-zA-Z.\s?\':]{1,}) %}/"
        ],
        'css' => [
            'selector'   => "/([#.,:\[\]\s\-a-zA-Z0-9]{0,}) {/"
        ],
        'todo'=>[
            'todo'=>"/ TODO : ([a-zA-Z\s\n0-9#.,:\'\[\]]{0,})/"
        ]
    ];


    /**
     * Retourne les commantaires TODOS d'un fichier
     * @param  [type] $file [description]
     * @return array       array todo
     */
    public function todo($file)
    {
        $reg     = $this->reg['todo'];

        $content = file_get_contents($file);

        $data    = [];
        $handle  = @fopen($file, "r");
        $i       = 1;

        $todos = '';

        if ($handle) {
            while (($line = fgets($handle, 4096)) !== false) {
                preg_match($reg['todo'], $line, $todo);
                if (count($todo)>0) {
                   $todos[] = [
                        'todo' => $todo[1],
                        'line' => $i
                    ];
                }
                $i++;
            }
        }

        return $todos;
    }

    public function twigContent($content)
    {
        $reg   = $this->reg['twig'];

        preg_match_all($reg['block'], $content, $block);
        preg_match($reg['extends'], $content, $extends);

        $blocks = '';
        $extends = $extends[1] ?? '';

        foreach ($block[1] as $key => $value) {

            $blocks[] = [
                'name'=>$value
            ];
        }

        return [
            'extends' => $extends,
            'blocks' => $blocks
        ];
    }


    public function cssContent($content)
    {
        $reg   = $this->reg['css'];

        preg_match_all($reg['selector'], $content, $selector);

        $selectors = '';

        foreach ($selector[1] as $key => $value) {
            $selectorExplode = explode(',',$value);
            foreach ($selectorExplode as $keyS => $valueS) {
                $selectors[] = [
                    'name'=> preg_replace(['/\s\s+/','/\n/'],[' ',''],$valueS)
                ];
            }


        }

        return [
            'selector' => $selectors
        ];
    }


    public function phpContent($content){
        $reg             = $this->reg['php'];

        preg_match($reg['namespace'], $content, $namespace);
        preg_match($reg['class'], $content, $class);
        preg_match($reg['extends'], $content, $extends);
        preg_match_all($reg['use'], $content, $use);
        preg_match_all($reg['function'], $content, $function);
        preg_match($reg['parent'], $content, $parent);

        $namespace = $namespace[1] ?? '';
        $class     = $class[1] ?? '';
        $extends   = $extends[1] ?? '';
        $use       = $use[1] ?? '';
        $parent    = $parent[2] ?? '';

        $functions = '';

        $uses = '';
        foreach ($use as $keyU => $valueU) {
            $uses[]=[
                'name'=>$valueU
            ];
        }

        /**
         * 1 : type [public, private, static]
         * 2 : function name
         * 3 : param
         */
        foreach ($function[2] as $key => $value) {

            $params = explode(',',$function[3][$key]);
            $p      = [];
            foreach ($params as $keyParam => $valueParam) {
                $var = explode('=',$valueParam);
                $p[$var[0]] = $var[1] ?? '';
            }

            $functions[] = [
                'name'   => $value,
                'type'   => $function[1][$key],
                'params' => $p
            ];
        }

        return [
            'class'     => $class,
            'extends'   => $extends,
            'uses'       => $uses,
            'namespace' => $namespace,
            'functions' => $functions,
            'parent'    => $parent
        ];
    }


    public function file($file, $line = true)
    {
        $info = pathinfo($file);
        $ext = $info['extension'];
        $method = $ext.'Content';

        if (in_array($ext, array_keys($this->reg))) {
            if($line)
                return $this->contentLine($file, $method);
            else{
                $content         = file_get_contents($file);
                return $this->$method($content);
            }
        }
        else{
            return ['pas de reg'];
        }
    }

    public function contentLine($file, $method)
    {
        $data    = [];
        $handle  = @fopen($file, "r");
        $content = '';
        $i       = 1;

        if ($handle) {
            while (($line = fgets($handle, 4096)) !== false) {
                $dataLine   = $this->$method($line);
                $dataExport = [];

                foreach ($dataLine as $key => $value) {
                    if ($value=='')
                        unset($dataLine[$key]);
                    else{
                        if (is_array($value)) {
                            $value[0]['line'] = $i;
                            $dataExport[$key] = $value;
                        }
                        else{
                            $dataExport[$key]['line'] = $i;
                            $dataExport[$key]['val']  = $value;
                        }
                    }
                }
                if (count($dataLine)>0)
                    $data = array_merge_recursive($dataExport,$data);
                $i++;
            }
            if (!feof($handle)) {
                $content .= "Erreur: fgets() a échoué\n";
            }
            fclose($handle);
        }
        return array_reverse($data);
    }



}

$parse = new parse();
?>
<?php
class parse extends app {

    var $reg = [
        'php'=>[
            'namespace' => "/namespace\s{1,}([a-zA-Z\\\]{0,})/",
            'class'     => "/class\s{1,}([a-zA-Z0-9_]{1,})/",
            'function'  => "/function\s{1,}([a-zA-Z_]{1,})\s{0,}\(((\,?\s{0,}\\$[a-zA-Z]{1,}(\s{0,}\=\s{0,}[a-zA-Z0-9]{1,}){0,}){0,})/",
            'parent'  => "/public function\s{1,}([a-zA-Z0-9_\(\)\{\}\s]{1,})'([a-zA-Z]{0,})'/",
            'var'       => "/\\$([a-zA-Z_]{1,})/"

        ]
    ];

    public function phpFile($file)
    {

        $info            = pathinfo($file);

        $content         = file_get_contents($file);
        $this->extension = $info['extension'];

        $reg             = $this->reg[$info['extension']];

        preg_match($reg['namespace'], $content, $namespace);
        preg_match($reg['class'], $content, $class);
        preg_match($reg['function'], $content, $function);
        preg_match($reg['parent'], $content, $parent);

        $namespace = $namespace[1] ?? '';
        $class     = $class[1] ?? '';
        $function  = $function[1] ?? '';
        $parent  = $parent[2] ?? '';

        return [
            'class'     => $class,
            'namespace' => $namespace,
            'function'  => $function,
            'parent'    => $parent
        ];
    }



}

$parse = new parse();
    ?>
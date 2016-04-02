<?php
    /**
     * Ajoute une nouvelle tache a la todo du projet selectionné.
     */
    use Symfony\Component\Finder\Finder;

    ini_set('memory_limit', '512M');

    $app    = new app();
    $finder = new Finder();
    $parse  = new parse();

    $cur    = $app->cur();

    $dir    = $app->dirProject();

    $finder->in($dir.'/src')->files();

    $todos = [];
    foreach ($finder as $key => $value) {
        $file      = $value->getRealpath();

        $fileTodos = $parse->todo($file);


        if ($fileTodos != '')
            $todos['files'][$value->getRelativePathname()] = $fileTodos;
    }


    $todo_list          = $app->getTodo($cur);
    $todo_list['files'] = $todos['files'] ?? [];
    // $todo_new           = $_POST['todo'];
    // $todo_new['date']   = time('d M Y H:i:s');
    // $todo_new['status'] = false;

    // $todo_list[]        = $todo_new;
    // $ks                 = array_keys($todo_list);
    // $k                  = end($ks);
    $d['todo']=$todo_list;
    $app->setTodo($cur, $todo_list);
     $target      = [
            '#filesTodo' => $c->viewsAsync('editor', 'todo-sidebar', $d)
        ];


if (true) {

    $r = [
        'infotype'  => "success",
        'target'    => $target,
        'a'         => "replaceWith",
        'msg'       => "ok exec name",
        'todo_list' => $todo_list,
        'cur'       => $todos
    ];
}


else{
    $r = [
        'infotype' => "error",
        'msg'      => "error exec name ",
        'data'     => ''
    ];
}
?>

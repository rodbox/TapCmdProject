<?php
    /**
     * Ajoute une nouvelle tache a la todo du projet selectionné.
     */

    $app = new app();


    $todo_list          = $app->getTodo($_GET['name']);

    $todo_new           = $_POST['todo'];
    $todo_new['date']   = time('d M Y H:i:s');
    $todo_new['status'] = false;

    $todo_list[]        = $todo_new;
    $ks                 = array_keys($todo_list);
    $k                  = end($ks);

    $app->setTodo($_GET['name'], $todo_list);


if (true) {

    $r = [
        'infotype' => "success",
        'msg'      => "ok exec name",
        'ks'       => end($ks),
        'todo'     => $c->viewsAsync('app','todo_item',[$k => $todo_new])
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
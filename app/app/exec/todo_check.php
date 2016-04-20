<?php
    /**
     * Check une tache
     */

    $app = new app();


    $todo_list        = $app->getTodo($_GET['name']);
    $todo_list[$k]['status'] = true;


    // $todo_list        = array_unshift($todo_list, $todo_list);
    $app->setTodo($_GET['name'], $todo_list);


if (true) {

    $r = [
        'infotype' => "success",
        'msg'      => "Todo check",
        'data'     => $todo_list,
        'todo'     => $todo_list[$k]
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
<?php
// exec name
//
//
    $app = new app();


    $todo_list        = $app->getTodo($_GET['name']);

    unset($todo_list[$k]);


    // $todo_list        = array_unshift($todo_list, $todo_list);
    $app->setTodo($_GET['name'], $todo_list);


if (true) {

    $r = [
        'infotype' => "success",
        'msg'      => "ok exec name",
        'data'     => $todo_list
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
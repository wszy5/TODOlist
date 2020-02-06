<?php
 function read() :array
 {
     if (file_exists(FILENAME) && !(empty(file_get_contents(FILENAME))))
     {
         return json_decode(file_get_contents(FILENAME, true));
     }
     return [];
 }
function display($tasks) :void
{
    echo "List" . PHP_EOL;
    echo "---------------------------------";
    foreach($tasks as $key => $value)
    {
     $key = $key + 1;
     echo PHP_EOL . "{$key}.{$value}" . PHP_EOL;
     }
    $x = count($tasks);
    echo "---------------------------------" . PHP_EOL . "All tasks: {$x}";
}
function add($tasks,$x)
{
    //array_push(array($tasks),$x);
    $tasks[] = $x;
    return $tasks;
}
function remove($tasks,$x)
{
    unset($tasks[$x-1]);
    $tasks = array_values($tasks);
    //$tasks = json_decode(file_get_contents(FILENAME, true));
    return $tasks;
}
function save($tasks)
{
    $data = json_encode($tasks);
    $tasks = file_put_contents(FILENAME,$data);
    return $tasks;
}

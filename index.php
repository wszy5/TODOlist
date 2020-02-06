<?php
define('FILENAME','tasks.txt');
require_once "functions.php";

$data = array_fill(0,3,null); //wypelnia tablice od indexu 0 do 3 null'ami

$argv = array_replace($data,$argv); //wstawia elementy z data do argv tam gdzie w argv ich nie ma

list($name,$comm,$cont) = $argv; //proste przypisanie zmiennych w kolejnosci

echo PHP_EOL;

switch($comm)
{
    case 'add':
        echo "Add TODO";
        $tasks = read();
        //add($tasks,$cont);
        $tasks = save(add($tasks,$cont));
        break;
    case 'remove':
        echo "Remove TODO";
        $tasks = read();
        $q = remove($tasks,$cont);
        save($q);
        break;
    case null:
        $tasks = read();
        display($tasks);
        break;
    default:
        echo "Sorry,invalid command!";
        break;
}
echo PHP_EOL;

 ?>

<?php

use eftec\DocumentStoreOne\DocumentStoreOne;

include "../lib/DocumentStoreOne.php";
echo "test<br>";
try {
    $flatcon = new DocumentStoreOne(dirname(__FILE__) . "/base", '');
} catch (Exception $e) {
    die("Unable to create document store");
}

echo "<br>setSchema:"; $flatcon->schema('tmp');
echo "<hr>";
echo "<br>insertOrUpdate:"; var_dump($flatcon->insertOrUpdate("example_1",json_encode(array("a1"=>'hello',"a2"=>'world'))));
echo "<br>insert:"; var_dump($flatcon->insert("example_2",json_encode(array("a1"=>'hello',"a2"=>'world'))));
echo "<br>update:"; var_dump($flatcon->update("example_2",json_encode(array("a1"=>'hola',"a2"=>'mundo'))));
echo "<hr>";
echo "<br>get:"; var_dump($flatcon->get("example_1"));
echo "<hr>";
echo "<br>select:";var_dump($flatcon->select("example_*"));
echo "<hr>";
//$flatcon->delete("1");
echo "<br>delete:"; var_dump($flatcon->delete("example_2"));
echo "<br>sequence"; var_dump($flatcon->schema('tmp2')->getNextSequence());
echo "<br>sequence reserve"; var_dump($flatcon->schema('tmp2')->getNextSequence("seq",-1,1,1,100));
echo "<br>sequence after reserve"; var_dump($flatcon->schema('tmp2')->getNextSequence());
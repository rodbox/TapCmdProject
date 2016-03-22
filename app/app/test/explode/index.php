<?php

$c = new controller();

$src['toto']['tata']['popo']='dzeedzdez';
$src['toto']['tata']['simfregregrergeon']='fklefjkz';


$index = 'toto.tata.simon.toto.gouuu.youyou';
$value = "youpla boom";

$r  = $c->indexToKey($index,$value);

echo"<pre>";
print_r($r);
echo"</pre>";


echo"<pre>";
print_r($src);
echo"</pre>";


$merge = array_replace_recursive($r,$src);

echo"<pre>";
print_r($merge);
echo"</pre>";

 ?>
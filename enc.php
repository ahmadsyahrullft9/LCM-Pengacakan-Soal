<?php


require_once 'factor.php';

$text = "PSR-2020-0001";

$m = strlen($text);
$b = 7;
$faktor_m = array_unique(factor($m));
$a = 1;
foreach($faktor_m as $f){
	$a = $a * $f;
}
$a = $a + 1;

$numbers[0] = rand(0, $m-1);

$i = 1;
while($i < $m){
	$numbers[$i] = (($a * $numbers[$i-1]) + $b) % $m;
	$i++;
}

$result = "";

foreach($numbers as $num){
	$result .= substr($text, $num, 1);
}

$enc = base64_encode(strtolower($result));
echo $enc;
echo '<br>';

$dec_1 = strtoupper(base64_decode($enc));
$sort_numbers = short_number($numbers);
$sort_result = "";
foreach($sort_numbers as $num){
	$sort_result .= substr($text, $num, 1);
}
$dec_1 = $sort_result;
echo $dec_1;


?>
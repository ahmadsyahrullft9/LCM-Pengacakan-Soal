<?php

//rumus Algoritma LCM adalah "X[n] = ((a . X[n-1]) + b) mod m"

require_once 'factor.php';

$jumlahsiswa = 10; //jumlah siswa
$jumlahsoalpersiswa = 50; //jumlah soal tiap siswa

$m = $jumlahsoalpersiswa; //jumlah seluruh soal // 2x5x5x1
$b = 7; //karena nilai b dan m tidak boleh memiliki faktor yg sama kecuali angka 1 // 7x1 // lebih mudahnya bilangan prima

$faktor_m = array_unique(factor($m)); //ambil nilai faktor prima dari m, kemudian unique hasilnya
$a = 1;
foreach($faktor_m as $f){
	$a = $a * $f;
}
$a = $a + 1; // dimana a-1 akan habis dibagi dengan nilai faktor prima dari m

$acak = array();
$size = array();

$j = 0;
while($j < $jumlahsiswa){
	
	/*$rand = rand(0, $m);
	while($rand % 2 == 0) {
		$rand = rand(0, $m);
	}*/
	
	$numbers[0] = rand(0, $m);

	$i = 1;
	while($i < $m){

		$numbers[$i] = (($a * $numbers[$i-1]) + $b) % $m;

		$i++;
	}
	//unset($numbers[0]);
	array_push($acak, $numbers);
	
	array_push($size, [
		'u'=>sizeof(array_unique($numbers)), 'n'=>sizeof($numbers) // cek apakah ada value yg sama atau duplikat //
	]);
	
	$j++;
}

header('content-type:application/json');
echo json_encode([
	'acak'=>$acak, 'size'=>$size, 'a'=>$a, 'b'=>$b, 'm'=>$m
]);
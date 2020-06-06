<?php 

//$a = 50;

function isPrime($a){
	if($a == 1) return 0;
	for($i=2; $i<=$a/2; $i++){
		if($a % $i == 0){
			return 0;
		}
	}
	return 1;
}

function factor($a){
	$arr = array();
	$i = 2;
	while(true){
		$f = $a / $i;
		if(floor($f) != $f){
			$i++;
		}else{
			$a = $f;
			array_push($arr, $i);
		}
		if(isPrime($a) == 1){
			array_push($arr, $a);
			break;
		}
	}
	
	/* for($i = 1; $i <= sqrt(abs($a)); $i++){
		if($a % $i == 0){
			$z = $a / $i;
			array_push($arr, $i, $z);
		}
	}*/
	return $arr;
}

//header('content-type:application/json');
//echo json_encode(factor($a));
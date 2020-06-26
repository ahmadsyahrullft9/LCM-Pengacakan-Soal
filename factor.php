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

function short_number($num){
	for($i = 0; $i < sizeof($num) - 1; $i++){
		$min = $i;
		for($j = $i+1; $j < sizeof($num); $j++){
			if($num[$j] < $num[$min]){
				$min = $j;
			}
		}
		$num = swap_position($num, $i, $min);
	}
	return $num;
}

function swap_position($data, $i, $min){
	$backup_data = $data[$min];
	$data[$min] = $data[$i];
	$data[$i] = $backup_data;
	return $data;
}

//header('content-type:application/json');
//echo json_encode(factor($a));
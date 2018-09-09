<?php
  // $a="1993-06-19";
   $a="1993-06-19 18:30:39";
  $b="2018-09-09 18:40:09";
	
  
  
  function findDate($x,$y){
	$p=0;
	$i;
	$year1=$year2=$month1=$month2=$date1=$date2=0;
	for($i=0;$i<strlen($x);$i++){

		if($x[$i]=='-'){
			if($p==0){
				$year1=(int)substr($x, $p,$i-$p);
				$p=$i+1;
			}
			else{
				$month1=(int) substr($x, $p,$i-$p);
				$p=$i+1;
			}
		}
	}
	$date1=(int)substr($x, $p);
	$p=0;

	for($i=0;$i<strlen($y);$i++){

		if($y[$i]=='-'){
			if($p==0){
				$year2=(int)substr($y, $p,$i-$p);
				$p=$i+1;
			}
			else{
				$month2=(int) substr($y, $p,$i-$p);
				$p=$i+1;
			}
		}
	}
	$date2=(int)substr($y, $p);
	$data=array();
	$data['year1']=$year1;
	$data['month1']=$month1;
	$data['date1']=$date1;
	$data['year2']=$year2;
	$data['month2']=$month2;
	$data['date2']=$date2;
	$carry=0;
	$total=0;
	if($date1>$date2){
		$carry=1;
		$total=$total+$date2+30-$date1;
		$data['day']=$total;
		if($month1>$month2){
			$total=$total+($month2+12-$month1-1)*30;
			$data['month']=($month2+12-$month1-1);
			$carry=1;

		}
		else{
			$total=$total+($month2-$month1-1)*30;
			$data['month']=($month2-$month1-1);
			$carry=0;
		}
		
		$data['year']=($year2-$year1-$carry);
		$total=$total+($year2-$year1-$carry)*12*30;

	}
	else{
		$carry=0;
		$total=$date2-$date1;
		$data['day']=$total;
		if($month1>$month2){
			$total=$total+($month2+12-$month1)*30;
			$data['month']=($month2+12-$month1);
			$carry=1;
		}
		else{
			$total=$total+($month2-$month1)*30;
			$data['month']=($month2-$month1);
			$carry=0;
		}
		$total=$total+($year2-$year1-$carry)*12*30;
		$data['year']=($year2-$year1-$carry);

	}
	$data['total']=$total;
	return $data;
	
  }
  $data=findDate($a,$b);
  echo $data['year1']." ".$data['month1']." ".$data['date1']." <br>";
   echo $data['year2']." ".$data['month2']." ".$data['date2']." <br>";
   echo $data['year']." ".$data['month']." ".$data['day']." <br>";
   echo $data['total']."</br>";

?>
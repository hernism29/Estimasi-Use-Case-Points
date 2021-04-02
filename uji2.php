<?php 

$file_name = 'sholiq_dataset.txt';
foreach (file($file_name) as $val) {
	
	$dataset[]=explode(",", $val);
	/*echo $val;
	echo "<br/>";*/
}
$max_x = max(array_column($dataset, 0));
$min_x = min(array_column($dataset, 0));
$max_y = max(array_column($dataset, 1));
$min_y = min(array_column($dataset, 1));
$a = [];
$b = [];
$r = 0.02;
$a_rand = (float) rand() / (float) getrandmax();
$b_rand = (float) rand() / (float) getrandmax();
$Y_predict = $a_rand + $b_rand * 0.88198757763975;
echo "Y Predict : ".$a_rand."+ ".$b_rand." * 0.89731563298296 = ".$Y_predict ;
$error =  $Y_predict - 0.88198757763975;
echo "</br>";
echo "Error = ".$error;
echo "</br>";
for ($i=0; $i<= 20 ; $i++) { 
	$a[$i] = (float) rand() / (float) getrandmax();
	$b[$i] = (float) rand() / (float) getrandmax();
echo "</br>";
	if ($i == 0) {
	echo 'Iterasi: '.$i.' a now: '.$a[$i].' b now: '.$b[$i].'<br>';	
	}
	if ($i != 0){
		echo "</br>";
		echo 'Iterasi: '.$i.' a now: '.$a[$i-1].' b now: '.$b[$i-1].'<br>';		
	}	
	$a[$i] = $a[$i] - $r * $error;
	$b[$i] = $b[$i] - $r * $error;
	echo 'a update: '.$a[$i].' b update: '.$b[$i];
	 
	}	
?>


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
foreach ($dataset as $key => $value) {
$x = ( $value[0] - $min_x ) / ($max_x - $min_x) ;
$y = ( $value[1] - $min_y ) / ($max_y - $min_y) ;
echo "</br>";
echo "_______________________________________________________________________________________________";
echo "</br>";

$Y_predict = $a_rand + $b_rand * $x;
echo "Y Predict : ".$a_rand."+ ".$b_rand." *  ".$x."= ".$Y_predict ;
$error =  $Y_predict - $y;
echo "</br>";
echo "Error : ".$Y_predict." - ".$y."= ".$error;

for ($i=0; $i<= 20 ; $i++) { 
	echo "</br>";
	if ($i == 0) {
		$a[$i] = (float) rand() / (float) getrandmax();
		$b[$i] = (float) rand() / (float) getrandmax();
		echo "nilai Y Predict: ".$Y_predict; 
		echo "&nbsp";
		echo "Error: ".$error ;
		echo "</br>";
		echo 'Iterasi: '.$i.' a now: '.$a[$i].' b now: '.$b[$i].'<br>';
	}
	if ($i != 0){
		echo "</br>";
		echo "nilai Y Predict: ".$Y_predict; 
		echo "&nbsp";
		echo "Error: ".$error ;
		echo "</br>";
		echo 'Iterasi: '.$i.' a now: '.$a[$i-1].' b now: '.$b[$i-1].'<br>';		
	}
	$Y_predict = $a[$i] + $b[$i] * $x;
	$error =  $Y_predict - $y;
	$a[$i+1] = $a[$i] - $r * $error;
	$b[$i+1] = $b[$i] - $r * $error;
	echo 'a update: '.$a[$i].' b update: '.$b[$i];

}
}
?>
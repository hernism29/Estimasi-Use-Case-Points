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
$a = (float) rand() / (float) getrandmax();
$b = (float) rand() / (float) getrandmax();
$Y_predict = $a + $b * 0.88198757763975;
echo "Y Predict : ".$a."+ ".$b." * 0.89731563298296 = ".$Y_predict ;
$error =  $Y_predict - 0.88198757763975;
echo "</br>";
echo "Error = ".$error;
for ($i=0; $i<= 20 ; $i++) { 

	$a = (float) rand() / (float) getrandmax();
	$b = (float) rand() / (float) getrandmax();
	$a_next[] = $a - $r * $error;
	$b_next[] = $b - $r * $error;
	echo "</br>";
	echo "a update : ".$a_next[$i];
	echo "&nbsp";
	echo "b update : ".$b_next[$i];

}
?>

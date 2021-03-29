<?php 

$file_name = 'sholiq_dataset.txt';
foreach (file($file_name) as $val) {
	
	$dataset[]=explode(",", $val);

	echo $val;
	echo "<br/>";	
}

print_r($dataset);
$loop=count($dataset);

for($i=0;$i<count($dataset);$i++){
	$a = (float) rand();
	$b = (float) rand();

	for($j=0;$j<1;$j++){
		echo "<br/>";
		echo "<br/>";
		
		echo "dataset [".$i."][".$j."] = ".$dataset[$i][$j];
		echo "<br/>";	
		$x=$dataset[$i][0]; 

		
		// hitung
		//kolom ke satu maka indeks ke 0 hitungnya
		echo "hitung ".$a."+".$b."*".$dataset[$i][0]."=";
		echo $Y_predict = $a + $b * $dataset[$i][0];
		echo "</br>";
		echo "</br>";

	}
	echo "dataset [".$i."][".$j."] = ".$dataset[$i][1];
	echo "</br>";
	echo "hitung SSE : 0.5 * ( ".$Y_predict. "-" .$dataset[$i][1]." ) ^ 2 =";
	echo $sse = 0.5 * pow($Y_predict - $dataset[$i][1], 2);
	echo "</br>";
	echo "gradient_a : absolute(".($Y_predict - $dataset[$i][1]).") =";
	echo $gradient_a = abs($Y_predict - $dataset[$i][1]);
	echo "</br>";
	echo "gradient_b :(".$gradient_a.") *".$dataset[$i][0]." =";
	echo $gradient_b = $gradient_a* $dataset[$i][0];
	
}
echo "</br>";
echo "___________________________________________________________________________________";
echo "___________________________________________________________________________________";
echo "</br>";

$a = [];
$b = [];
$r = 0.02;
for ($i=0; $i<= 100 ; $i++) { 
	echo "<table border = '1' width = '50%'>";
	echo "<tr><th>X</th><th>Y</th><th>Y Predict</th><th>SSE</th><th>Gradien a</th><th>Gradien b</th></tr>";

	$a[$i] = (float) rand() / (float) getrandmax();
	$b[$i] = (float) rand() / (float) getrandmax();

	echo 'Iterasi: '.$i.' a now: '.$a[$i].' b now: '.$b[$i].'<br>';
	if ($i != 0){
		echo 'Iterasi: '.$i.' a now: '.$a[$i-1].' b now: '.$b[$i-1].'<br>';		
	}

	//echo $i.' a: '.$a[$i].' b: '.$b[$i].' <br>';
	foreach ($dataset as $key => $value) {
		$x = $value[0];
		$y = $value[1];

		if ($i != 0){
			$Y_predict = $a[$i-1] + $b[$i-1] * $x;			
		}
		$Y_predict = $a[$i] + $b[$i] * $x;			
		$sse = 0.5 * pow($Y_predict - $y, 2);
		$sum_SSE[] = $sse;
		$gradient_a = - ($y - $Y_predict) ;
		$gradient_b = - ($y - $Y_predict) * $x ;

	echo "<tr><th>".$x."</th><th>".$y."</th><th>".$Y_predict."</th><th>".$sse."</th><th>".$gradient_a."</th><th>".$gradient_b."</th></tr>";
	}	
	echo 'a: '.$a[$i].' b: '.$b[$i].'<br>';
	$a[$i] = $a[$i] - $r * $gradient_a;
	$b[$i] = $b[$i] - $r * $gradient_b;
	echo 'a: '.$a[$i].' b: '.$b[$i].' SSE '.number_format(array_sum($sum_SSE),2).'<br>';


	$sum_SSE = [];
	echo "</table>";
}

?>

<?php 
echo "<table border = '1' width = '50%'>";
echo "<tr><th>X</th><th>Y</th><th> a + b * X[i]</th><th>hitung SSE </th><th> Gradien a</th><th>Gradien b</th></tr>";
$file_name = 'sholiq_dataset.txt';
foreach (file($file_name) as $val) {
	
	$dataset[]=explode(",", $val);

	echo $val;
	echo "<br/>";	
}

print_r($dataset);
$loop=count($dataset);
$a = rand(0, 1);
$b = rand(0, 1);


for($i=0;$i<count($dataset);$i++){
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

	echo "<tr><th>".$dataset[$i][0]."</th><th>".$dataset[$i][1]."</th><th>".$Y_predict."</th><th>
	".$sse."</th><th>".$gradient_a."</th><th>".$gradient_b."</th></tr>";
	
}

echo "</table>";
?>

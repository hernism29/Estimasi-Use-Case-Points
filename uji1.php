<?php 
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
$sse = 0.5 * pow($Y_predict - $dataset[$i][1], 2);
echo $sse;
}

?>

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

	for($j=0;$j<2;$j++){
		echo "<br/>";
		echo "<br/>";
		echo "dataset [".$i."][".$j."] = ".$dataset[$i][$j];
		echo "<br/>";
		$a = rand(0, 1);
		 
		echo "<br/>";
		$b = rand(0, 1);
		
		// hitung
		//kolom ke satu maka indeks ke 0 hitungnya
		echo "hitung ".$a."+".$b."*".$dataset[$i][0]."=";
		echo $a + $b * $dataset[$i][0];

	}

}

?>



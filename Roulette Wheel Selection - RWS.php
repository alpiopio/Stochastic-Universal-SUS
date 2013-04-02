<style>
table{
border-collapse:collapse;
}
td{
border : 1px solid #000000;
padding : 0px 5px;
}
</style>
<?php
for ($i=0;$i<6;$i++){
	$cromosom[] = round(mt_rand(0,15),2);
}
$cromosom_length = count($cromosom);
echo "NILAI,FITNESS,PROBABILITAS";
echo "<table>";																/*N*/
echo "<tr>";																/*I*/
echo "<td>nilai</td>";														/*L*/
foreach($cromosom as $nilai){												/*A*/
	echo "<td>".$nilai."</td>";												/*I*/
}																			/*!*/
$totla_nilai = array_sum($cromosom);										/*!*/
echo "<td>total = ".$totla_nilai."</td>";									/*!*/
echo "</tr>";																/*!*/

echo "<tr>";																/*F*/
echo "<td>fitness</td>";													/*I*/
foreach($cromosom as $fitness){												/*T*/
	$final_fitness = (15*$fitness)-pow($fitness,2);							/*N*/
	$array_fitness[] = (15*$fitness)-pow($fitness,2);						/*E*/
	echo "<td>".$final_fitness."</td>";										/*S*/
}																			/*S*/
$total_fitness = array_sum($array_fitness);									/*!*/
echo "<td>total = ".$total_fitness."</td>";									/*!*/
echo "</tr>";																/*!*/

echo "<tr>";																/*P*/
echo "<td>probabilitas</td>";												/*R*/
foreach($array_fitness as $fitness){										/*O*/
	$probabilitas = ($fitness/$total_fitness);								/*B*/
	$array_probabilitas[] = ($fitness/$total_fitness);						/*A*/
	echo "<td>".round($probabilitas,2)."</td>";								/*B*/
}																			/*I*/
$total_probabilitas = array_sum($array_probabilitas);						/*L*/
echo "<td>total = ".$total_probabilitas."</td>";							/*I*/
echo "</tr>";																/*T*/
echo "</table>";															/*A*/
																			/*S*/
echo "<br>PERCOBAAN RANDOM";
/*----------------------------------------------PROSES PEMUTARAN RODA ROULLETE---------------------------------------------------*/
$r = $total_probabilitas;
$n = 2;

$temp = $r*10;
for($i=0;$i<$n;$i++){
$c[] = rand(1,$temp) / 10;
}

echo "<table>";
echo "<tr>";
echo "<td>r</td><td colspan='".$n."'>percobaan</td>";
echo "</tr>";
echo "<tr>";echo "<tr>";
echo "<td>n = ".$n."</td>";

for($i=0;$i<$n;$i++){
	echo "<td>".$c[$i]."</td>";
}
echo "</tr>";
echo "</table>";
/*-----------------------------------------------PROSES SELEKSI RODA ROULLETE----------------------------------------------------*/
$probabilitasx = 0;
$array_length = count($array_probabilitas);
echo "<br>PROSES SELEKSI";
$individuterpilih = null;
for($s=0;$s<$n;$s++){
echo "<table>";
	for ($i=0;$i<$array_length;$i++){
		$probabilitasx += $array_probabilitas[$i];
		echo "<tr><td>perbandingan = ".round($probabilitasx,2)." : ".$c[$s]."</td></tr>";
			if (round($probabilitasx,2) >= $c[$s]){
			$index = $i + 1;
			echo "<tr><td>index ke = ".$index." dengan probabilitas = ".round($array_probabilitas[$i],2)." dan fitness = ".$array_fitness[$i]." (".$cromosom[$i].")</td></tr>";
			$x[] = $cromosom[$i];
			$probabilitasx = 0;
			break;
			}
	}
echo "</table><br>";
}
?>

<?php
	$databaseConnection = mysqli_connect("94.177.229.154", "Thia0012", "sta34utj", "bolcher");
	$databaseConnection->set_charset("utf8");
	
	$bolcherQuery = mysqli_query($databaseConnection, "SELECT bolcher.id, bolcher.navn, bolcher_farve.farve, bolcher.vaegt, bolcher_surhed.surhed, bolcher_styrke.styrke, bolcher_type.type, bolcher.varepris 
												   FROM bolcher 
												   INNER JOIN bolcher_farve ON bolcher.farve = bolcher_farve.id
												   INNER JOIN bolcher_surhed ON bolcher.smags_surhed = bolcher_surhed.id
												   INNER JOIN bolcher_styrke ON bolcher.smags_styrke = bolcher_styrke.id
												   INNER JOIN bolcher_type ON bolcher.smags_type = bolcher_type.id");
	
	
	
	while($bolcherRow = mysqli_fetch_assoc($bolcherQuery))
	{
		$nettoPris = $bolcherRow["varepris"] * 2.5;
		$salgsPris = $nettoPris + ($nettoPris * 0.25);
		$prisPerHundredeGram = round((100 / $bolcherRow["vaegt"]) * $salgsPris, 1);
		
		echo "<h3>";
		
		echo "Navn: ".$bolcherRow["navn"]." | Vægt: ";
		echo $bolcherRow["vaegt"]." | Pris: ";
		echo $bolcherRow["varepris"]." | Nettopris: ";
		echo $nettoPris." | Salgspris: ";
		echo $salgsPris." | Pris pr 100 gram: ";
		echo $prisPerHundredeGram;
		
		echo "</h3><br>";
	}
?>
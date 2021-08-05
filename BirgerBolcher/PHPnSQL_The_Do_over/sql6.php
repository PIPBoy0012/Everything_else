<?php
	$databaseConnection = mysqli_connect("94.177.229.154", "Thia0012", "sta34utj", "bolcher");
	$databaseConnection->set_charset("utf8");
	
	if($_GET["type"] == "1")
	{
		$databaseQuery = mysqli_query($databaseConnection, "SELECT kunder.id, kunder.navn, kunder.adresse, kunder.telefonnummer, postnummer.bynavn
														   FROM kunder 
														   INNER JOIN postnummer ON kunder.postnummer = postnummer.id
														   ORDER BY kunder.navn ASC");
	}
	else if($_GET["type"] == "2")
	{
		$databaseQuery = mysqli_query($databaseConnection, "SELECT ordre.id, kunder.navn, ordre.dato
														   FROM ordre
														   INNER JOIN kunder ON ordre.kunde_id = kunder.id														   
														   ORDER BY ordre.dato ASC");
	}
	else if($_GET["type"] == "3")
	{
		$databaseQuery = mysqli_query($databaseConnection, "SELECT ordre.id, kunder.navn, ordre.dato
														   FROM ordre
														   INNER JOIN kunder ON ordre.kunde_id = kunder.id														   
														   ORDER BY ordre.dato DESC
														   LIMIT 1");
	}
	
	while($databaseRow = mysqli_fetch_assoc($databaseQuery))
	{
		echo "<h3>";
		
		echo "Order ID: ".$databaseRow["id"]." | Kunde Navn: ";
		echo $databaseRow["navn"]." | Dato: ";
		echo $databaseRow["dato"];
		
		if($_GET["type"] == "3")
		{
			echo "<h2>----- Ordre -----</h2><br>";
			
			$orderQuery = mysqli_query($databaseConnection, "SELECT ordre_bolcher.antal, bolcher.navn
														   FROM ordre_bolcher
														   INNER JOIN bolcher ON ordre_bolcher.bolche_id = bolcher.id														   
														   WHERE ordre_id = '".$databaseRow["id"]."'");
														   
			while($ordreRow = mysqli_fetch_assoc($orderQuery))
			{
				echo "<h2>";
				
				echo "Bolche: ".$ordreRow["navn"]." | Antal: ";
				echo $ordreRow["antal"];
				
				echo "</h2><br>";
			}
		}
		
		echo "</h3><br>";
	}
?>
<?php
	$databaseConnection = mysqli_connect("94.177.229.154", "Thia0012", "sta34utj", "bolcher");
	$databaseConnection->set_charset("utf8");
	
	if($_GET["type"] == "1")
	{
		$bolcherQuery = mysqli_query($databaseConnection, "SELECT bolcher.id, bolcher.navn, bolcher_farve.farve, bolcher.vaegt, bolcher_surhed.surhed, bolcher_styrke.styrke, bolcher_type.type, bolcher.varepris 
												   FROM bolcher 
												   INNER JOIN bolcher_farve ON bolcher.farve = bolcher_farve.id
												   INNER JOIN bolcher_surhed ON bolcher.smags_surhed = bolcher_surhed.id
												   INNER JOIN bolcher_styrke ON bolcher.smags_styrke = bolcher_styrke.id
												   INNER JOIN bolcher_type ON bolcher.smags_type = bolcher_type.id");
	}
	else if($_GET["type"] == "2")
	{
		$bolcherQuery = mysqli_query($databaseConnection, "SELECT bolcher.id, bolcher.navn, bolcher_farve.farve, bolcher.vaegt, bolcher_surhed.surhed, bolcher_styrke.styrke, bolcher_type.type, bolcher.varepris 
												   FROM bolcher 
												   INNER JOIN bolcher_farve ON bolcher.farve = bolcher_farve.id
												   INNER JOIN bolcher_surhed ON bolcher.smags_surhed = bolcher_surhed.id
												   INNER JOIN bolcher_styrke ON bolcher.smags_styrke = bolcher_styrke.id
												   INNER JOIN bolcher_type ON bolcher.smags_type = bolcher_type.id
												   WHERE bolcher_farve.farve = 'Rød'");
	}
	else if($_GET["type"] == "3")
	{
		$bolcherQuery = mysqli_query($databaseConnection, "SELECT bolcher.id, bolcher.navn, bolcher_farve.farve, bolcher.vaegt, bolcher_surhed.surhed, bolcher_styrke.styrke, bolcher_type.type, bolcher.varepris 
												   FROM bolcher 
												   INNER JOIN bolcher_farve ON bolcher.farve = bolcher_farve.id
												   INNER JOIN bolcher_surhed ON bolcher.smags_surhed = bolcher_surhed.id
												   INNER JOIN bolcher_styrke ON bolcher.smags_styrke = bolcher_styrke.id
												   INNER JOIN bolcher_type ON bolcher.smags_type = bolcher_type.id
												   WHERE bolcher_farve.farve = 'Rød' OR bolcher_farve.farve = 'Blå'");
	}
	else if($_GET["type"] == "4")
	{
		$bolcherQuery = mysqli_query($databaseConnection, "SELECT bolcher.id, bolcher.navn, bolcher_farve.farve, bolcher.vaegt, bolcher_surhed.surhed, bolcher_styrke.styrke, bolcher_type.type, bolcher.varepris 
												   FROM bolcher 
												   INNER JOIN bolcher_farve ON bolcher.farve = bolcher_farve.id
												   INNER JOIN bolcher_surhed ON bolcher.smags_surhed = bolcher_surhed.id
												   INNER JOIN bolcher_styrke ON bolcher.smags_styrke = bolcher_styrke.id
												   INNER JOIN bolcher_type ON bolcher.smags_type = bolcher_type.id
												   WHERE NOT bolcher_farve.farve = 'Rød'
												   ORDER BY bolcher.navn ASC");
	}
	else if($_GET["type"] == "5")
	{
		$bolcherQuery = mysqli_query($databaseConnection, "SELECT bolcher.id, bolcher.navn, bolcher_farve.farve, bolcher.vaegt, bolcher_surhed.surhed, bolcher_styrke.styrke, bolcher_type.type, bolcher.varepris 
												   FROM bolcher 
												   INNER JOIN bolcher_farve ON bolcher.farve = bolcher_farve.id
												   INNER JOIN bolcher_surhed ON bolcher.smags_surhed = bolcher_surhed.id
												   INNER JOIN bolcher_styrke ON bolcher.smags_styrke = bolcher_styrke.id
												   INNER JOIN bolcher_type ON bolcher.smags_type = bolcher_type.id
												   WHERE bolcher.navn LIKE 'b%'");
	}
	else if($_GET["type"] == "6")
	{
		$bolcherQuery = mysqli_query($databaseConnection, "SELECT bolcher.id, bolcher.navn, bolcher_farve.farve, bolcher.vaegt, bolcher_surhed.surhed, bolcher_styrke.styrke, bolcher_type.type, bolcher.varepris 
												   FROM bolcher 
												   INNER JOIN bolcher_farve ON bolcher.farve = bolcher_farve.id
												   INNER JOIN bolcher_surhed ON bolcher.smags_surhed = bolcher_surhed.id
												   INNER JOIN bolcher_styrke ON bolcher.smags_styrke = bolcher_styrke.id
												   INNER JOIN bolcher_type ON bolcher.smags_type = bolcher_type.id
												   WHERE bolcher.navn LIKE '%e%'");
	}
	else if($_GET["type"] == "7")
	{
		$bolcherQuery = mysqli_query($databaseConnection, "SELECT bolcher.id, bolcher.navn, bolcher_farve.farve, bolcher.vaegt, bolcher_surhed.surhed, bolcher_styrke.styrke, bolcher_type.type, bolcher.varepris 
												   FROM bolcher 
												   INNER JOIN bolcher_farve ON bolcher.farve = bolcher_farve.id
												   INNER JOIN bolcher_surhed ON bolcher.smags_surhed = bolcher_surhed.id
												   INNER JOIN bolcher_styrke ON bolcher.smags_styrke = bolcher_styrke.id
												   INNER JOIN bolcher_type ON bolcher.smags_type = bolcher_type.id
												   WHERE bolcher.vaegt < 10
												   ORDER BY bolcher.vaegt ASC");
	}
	else if($_GET["type"] == "8")
	{
		$bolcherQuery = mysqli_query($databaseConnection, "SELECT bolcher.id, bolcher.navn, bolcher_farve.farve, bolcher.vaegt, bolcher_surhed.surhed, bolcher_styrke.styrke, bolcher_type.type, bolcher.varepris 
												   FROM bolcher 
												   INNER JOIN bolcher_farve ON bolcher.farve = bolcher_farve.id
												   INNER JOIN bolcher_surhed ON bolcher.smags_surhed = bolcher_surhed.id
												   INNER JOIN bolcher_styrke ON bolcher.smags_styrke = bolcher_styrke.id
												   INNER JOIN bolcher_type ON bolcher.smags_type = bolcher_type.id
												   WHERE bolcher.vaegt > 9 AND bolcher.vaegt < 13
												   ORDER BY bolcher.navn ASC");
	}
	else if($_GET["type"] == "9")
	{
		$bolcherQuery = mysqli_query($databaseConnection, "SELECT bolcher.id, bolcher.navn, bolcher_farve.farve, bolcher.vaegt, bolcher_surhed.surhed, bolcher_styrke.styrke, bolcher_type.type, bolcher.varepris 
												   FROM bolcher 
												   INNER JOIN bolcher_farve ON bolcher.farve = bolcher_farve.id
												   INNER JOIN bolcher_surhed ON bolcher.smags_surhed = bolcher_surhed.id
												   INNER JOIN bolcher_styrke ON bolcher.smags_styrke = bolcher_styrke.id
												   INNER JOIN bolcher_type ON bolcher.smags_type = bolcher_type.id
												   ORDER BY bolcher.vaegt DESC
												   LIMIT 3");
	}
	else if($_GET["type"] == "10")
	{
		$bolcherQuery = mysqli_query($databaseConnection, "SELECT bolcher.id, bolcher.navn, bolcher_farve.farve, bolcher.vaegt, bolcher_surhed.surhed, bolcher_styrke.styrke, bolcher_type.type, bolcher.varepris 
												   FROM bolcher 
												   INNER JOIN bolcher_farve ON bolcher.farve = bolcher_farve.id
												   INNER JOIN bolcher_surhed ON bolcher.smags_surhed = bolcher_surhed.id
												   INNER JOIN bolcher_styrke ON bolcher.smags_styrke = bolcher_styrke.id
												   INNER JOIN bolcher_type ON bolcher.smags_type = bolcher_type.id
												   ORDER BY RAND()
												   LIMIT 1");
	}
	
	while($bolcherRow = mysqli_fetch_assoc($bolcherQuery))
	{
		echo "<h3>";
		
		echo $bolcherRow["id"]." | ";
		echo $bolcherRow["navn"]." | ";
		echo $bolcherRow["farve"]." | ";
		echo $bolcherRow["vaegt"]." | ";
		echo $bolcherRow["surhed"]." | ";
		echo $bolcherRow["styrke"]." | ";
		echo $bolcherRow["type"]." | ";
		echo $bolcherRow["varepris"];
		
		echo "</h3><br>";
	}
?>
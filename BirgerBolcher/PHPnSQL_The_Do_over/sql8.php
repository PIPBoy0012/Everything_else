<?php
	$databaseConnection = mysqli_connect("94.177.229.154", "Thia0012", "sta34utj", "bolcher");
	$databaseConnection->set_charset("utf8");
	
	if($_GET["type"] == "1")
	{
		$databaseQuery = mysqli_query($databaseConnection, "SELECT kunder.id, kunder.navn FROM kunder WHERE id = '4'");
		
		$databaseRow = mysqli_fetch_assoc($databaseQuery);
		
		$ordreQuery = mysqli_query($databaseConnection, "SELECT ordre.id, ordre.dato FROM ordre WHERE kunde_id = '".$databaseRow["id"]."'");
		
		if(mysqli_num_rows($ordreQuery) > 0)
		{
			echo "<h2>".$databaseRow["navn"]."</h2><br>";
			
			echo "<h2>--------------------------</h2><br>";
			
			while($ordreRow = mysqli_fetch_assoc($ordreQuery))
			{
				echo "<h3>Ordre ID: ".$ordreRow["id"]."</h3><br>";
				
				$bolcheQuery = mysqli_query($databaseConnection, "SELECT ordre_bolcher.antal, bolcher.navn 
																  FROM ordre_bolcher 
																  INNER JOIN bolcher ON ordre_bolcher.bolche_id = bolcher.id 
																  WHERE ordre_id = '".$ordreRow["id"]."'");
				
				while($bolcheRow = mysqli_fetch_assoc($bolcheQuery))
				{
					echo "<h4>Navn: ".$bolcheRow["navn"]." | Antal: ".$bolcheRow["antal"]."</h4><br>";
				}
				
				echo "<h3>--------------------------</h3><br>";
			}
		}
	}
	else if($_GET["type"] == "2")
	{
		$databaseQuery = mysqli_query($databaseConnection, "SELECT kunder.id, kunder.navn FROM kunder");
		
		while($databaseRow = mysqli_fetch_assoc($databaseQuery))
		{
			$ordreQuery = mysqli_query($databaseConnection, "SELECT ordre.id, ordre.dato FROM ordre WHERE kunde_id = '".$databaseRow["id"]."'");
		
			if(mysqli_num_rows($ordreQuery) > 0)
			{
				$antalGram = 0;
				
				while($ordreRow = mysqli_fetch_assoc($ordreQuery))
				{
					$bolcheQuery = mysqli_query($databaseConnection, "SELECT ordre_bolcher.antal, bolcher.navn, bolcher.vaegt 
																	  FROM ordre_bolcher 
																	  INNER JOIN bolcher ON ordre_bolcher.bolche_id = bolcher.id 
																	  WHERE ordre_id = '".$ordreRow["id"]."'");

					while($bolcheRow = mysqli_fetch_assoc($bolcheQuery))
					{
						$antalGram += $bolcheRow["vaegt"] * $bolcheRow["antal"];
					}
				}
				
				if($antalGram > 100)
				{
					echo "<h2>".$databaseRow["navn"]."</h2><br>";
				
					echo "<h2>--------------------------</h2><br>";
					
					$ordreQueryPrint = mysqli_query($databaseConnection, "SELECT ordre.id, ordre.dato FROM ordre WHERE kunde_id = '".$databaseRow["id"]."'");
					
					while($ordreRowPrint = mysqli_fetch_assoc($ordreQueryPrint))
					{
						echo "<h3>Ordre ID: ".$ordreRowPrint["id"]."</h3><br>";
						
						$bolcheQueryPrint = mysqli_query($databaseConnection, "SELECT ordre_bolcher.antal, bolcher.navn, bolcher.vaegt 
																		  FROM ordre_bolcher 
																		  INNER JOIN bolcher ON ordre_bolcher.bolche_id = bolcher.id 
																		  WHERE ordre_id = '".$ordreRowPrint["id"]."'");
						
						while($bolcheRowPrint = mysqli_fetch_assoc($bolcheQueryPrint))
						{
							echo "<h4>Navn: ".$bolcheRowPrint["navn"]." | Antal: ".$bolcheRowPrint["antal"]."</h4><br>";
						}
					}
					
					echo "<h3>Vægt: ".$antalGram."</h3><br>";
						
					echo "<h3>--------------------------</h3><br>";
				}
			}
		}
	}
	else if($_GET["type"] == "3")
	{
		$databaseQuery = mysqli_query($databaseConnection, "SELECT kunder.id, kunder.navn FROM kunder WHERE kunder.postnummer = '5270'");
		
		while($databaseRow = mysqli_fetch_assoc($databaseQuery))
		{
			$ordreQuery = mysqli_query($databaseConnection, "SELECT ordre.id, ordre.dato FROM ordre WHERE kunde_id = '".$databaseRow["id"]."'");
		
			if(mysqli_num_rows($ordreQuery) > 0)
			{
				$hasStrongBolcher = false;
				
				while($ordreRow = mysqli_fetch_assoc($ordreQuery))
				{
					$bolcheQuery = mysqli_query($databaseConnection, "SELECT ordre_bolcher.antal, bolcher.navn, bolcher.vaegt, bolcher_styrke.styrke 
																	  FROM ordre_bolcher 
																	  INNER JOIN bolcher ON ordre_bolcher.bolche_id = bolcher.id 
																	  INNER JOIN bolcher_styrke ON bolcher.smags_styrke = bolcher_styrke.id 
																	  WHERE ordre_id = '".$ordreRow["id"]."'");

					while($bolcheRow = mysqli_fetch_assoc($bolcheQuery))
					{
						if($bolcheRow["styrke"] == "Stærk")
						{
							$hasStrongBolcher = true;
						}
					}
				}
				
				if($hasStrongBolcher == true)
				{
					echo "<h2>".$databaseRow["navn"]."</h2><br>";
				
					echo "<h2>--------------------------</h2><br>";
					
					$ordreQueryPrint = mysqli_query($databaseConnection, "SELECT ordre.id, ordre.dato FROM ordre WHERE kunde_id = '".$databaseRow["id"]."'");
					
					while($ordreRowPrint = mysqli_fetch_assoc($ordreQueryPrint))
					{
						echo "<h3>Ordre ID: ".$ordreRowPrint["id"]."</h3><br>";
						
						$bolcheQueryPrint = mysqli_query($databaseConnection, "SELECT ordre_bolcher.antal, bolcher.navn, bolcher.vaegt, bolcher_styrke.styrke
																		  FROM ordre_bolcher 
																		  INNER JOIN bolcher ON ordre_bolcher.bolche_id = bolcher.id 
																		  INNER JOIN bolcher_styrke ON bolcher.smags_styrke = bolcher_styrke.id 
																		  WHERE ordre_id = '".$ordreRowPrint["id"]."'");
						
						while($bolcheRowPrint = mysqli_fetch_assoc($bolcheQueryPrint))
						{
							echo "<h4>Navn: ".$bolcheRowPrint["navn"]." | Antal: ".$bolcheRowPrint["antal"]."</h4><br>";
						}
					}
					
					echo "<h3>Vægt: ".$antalGram."</h3><br>";
						
					echo "<h3>--------------------------</h3><br>";
				}
			}
		}
	}
	else if($_GET["type"] == "4")
	{
		$databaseQuery = mysqli_query($databaseConnection, "SELECT kunder.id, kunder.navn FROM kunder");
		
		while($databaseRow = mysqli_fetch_assoc($databaseQuery))
		{
			$ordreQuery = mysqli_query($databaseConnection, "SELECT ordre.id, ordre.dato FROM ordre WHERE kunde_id = '".$databaseRow["id"]."'");
			
			if(mysqli_num_rows($ordreQuery) > 0)
			{
				$hasStrongBolcher = false;
				
				while($ordreRow = mysqli_fetch_assoc($ordreQuery))
				{
					$bolcheQuery = mysqli_query($databaseConnection, "SELECT ordre_bolcher.antal, bolcher.navn, bolcher.vaegt, bolcher_styrke.styrke 
																	  FROM ordre_bolcher 
																	  INNER JOIN bolcher ON ordre_bolcher.bolche_id = bolcher.id 
																	  INNER JOIN bolcher_styrke ON bolcher.smags_styrke = bolcher_styrke.id 
																	  WHERE ordre_id = '".$ordreRow["id"]."'");

					while($bolcheRow = mysqli_fetch_assoc($bolcheQuery))
					{
						if($bolcheRow["styrke"] == "Stærk")
						{
							$hasStrongBolcher = true;
						}
					}
				}
				
				if($hasStrongBolcher == true)
				{
					echo "<h2>".$databaseRow["navn"]."</h2><br>";
				
					echo "<h2>--------------------------</h2><br>";
					
					$ordreQueryPrint = mysqli_query($databaseConnection, "SELECT ordre.id, ordre.dato FROM ordre WHERE kunde_id = '".$databaseRow["id"]."'");
					
					while($ordreRowPrint = mysqli_fetch_assoc($ordreQueryPrint))
					{
						echo "<h3>Ordre ID: ".$ordreRowPrint["id"]."</h3><br>";
						
						$bolcheQueryPrint = mysqli_query($databaseConnection, "SELECT ordre_bolcher.antal, bolcher.navn, bolcher.vaegt, bolcher_styrke.styrke
																		  FROM ordre_bolcher 
																		  INNER JOIN bolcher ON ordre_bolcher.bolche_id = bolcher.id 
																		  INNER JOIN bolcher_styrke ON bolcher.smags_styrke = bolcher_styrke.id 
																		  WHERE ordre_id = '".$ordreRowPrint["id"]."'");
						
						while($bolcheRowPrint = mysqli_fetch_assoc($bolcheQueryPrint))
						{
							echo "<h4>Navn: ".$bolcheRowPrint["navn"]." | Antal: ".$bolcheRowPrint["antal"]."</h4><br>";
						}
					}
					
					echo "<h3>Vægt: ".$antalGram."</h3><br>";
						
					echo "<h3>--------------------------</h3><br>";
				}
			}
		}
	}
?>
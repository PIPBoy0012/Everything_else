<?php
	if($_SERVER["REQUEST_METHOD"] == "POST" || $_GET["visAlle"] == true)
	{
		if(empty(trim($_POST["bolcherNavn"])) == true && empty(trim($_POST["bolcherFarve"])) == true)
		{
			echo "<h3>Vælg søgekriterier eller klik på Vis alle</h3>";
		}
		else
		{
			$databaseConnection = mysqli_connect("94.177.229.154", "Thia0012", "sta34utj", "bolcher");
			$databaseConnection->set_charset("utf8");
			
			$bolcherQuery = mysqli_query($databaseConnection, "SELECT bolcher.id, bolcher.navn, bolcher_farve.farve, bolcher.vaegt, bolcher_surhed.surhed, bolcher_styrke.styrke, bolcher_type.type, bolcher.varepris 
														   FROM bolcher 
														   INNER JOIN bolcher_farve ON bolcher.farve = bolcher_farve.id
														   INNER JOIN bolcher_surhed ON bolcher.smags_surhed = bolcher_surhed.id
														   INNER JOIN bolcher_styrke ON bolcher.smags_styrke = bolcher_styrke.id
														   INNER JOIN bolcher_type ON bolcher.smags_type = bolcher_type.id
														   WHERE bolcher.navn LIKE '%".mysqli_escape_string($databaseConnection, $_POST["bolcherNavn"])."%'
														   AND bolcher_farve.farve LIKE '%".mysqli_escape_string($databaseConnection, $_POST["bolcherFarve"])."%'");

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
		}
	}
?>
<html>
	<head>
	
	</head>
	<body>
		<h3>-------------------------------------</h3>
		<h3>Bolcher Søgning</h3><a href="sql3.php?visAlle=true"><button type="submit">Vis Alle Bolcher</button></a>
		<form action="sql3.php?visAlle=false" method="post">
			<label for="fname">Navn</label><br>
			<input type="text" id="bolcherNavn" name="bolcherNavn"><br>
			
			<label for="fname">Farve</label><br>
			<input type="text" id="bolcherFarve" name="bolcherFarve"><br>
			
			<input type="submit" value="Submit">
		</form>
	</body>
</html>
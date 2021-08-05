<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>SQL-02</title>
</head>

<body>
    <div class="center">
    <h3>SQL-02</h3>
    <br>
    <br>
    <br>
    <?php
    
    echo '<button onclick="allebolcher()"> Show all </button>';
    echo "<br>";
    
    include ("SQL-02.php");
    ?>

<script>
    function allebolcher(){
        <?php
        include ("SQL-02.php");
        ?>
    }
    </script>
    <br>



<p id="demo"></p>
    </div>
</body>
<footer class="footer">
    <ul>
        <li><a href="/BirgerBolcher/Page1.php">Page1</a></li>
        <li><a href="/BirgerBolcher/Page2.php">Page2</a></li>
        <li><a href="/BirgerBolcher/Page3.php">Page3</a></li>
        <li><a href="/BirgerBolcher/Page4.php">Page4</a></li>
    </ul>
</footer>
</html>
<?php  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dynamische applicatie";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (PDOException $e){
    echo "connection failed" . $e->getMessage();
}
$query = $conn->prepare('SELECT * FROM characters ORDER BY name');
$query->execute();
$result = $query->fetchall();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Characters</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet">
</head>
<body>
<header><h1>Alle [10] characters uit de database</h1>

</header>
<div id="container">
     <?php
foreach ($result as $name) {
    ?>

    <img src="images/<?php echo $name["avatar"] ?>" id="img" style="width: 100px; height: 100px; border-radius: 50%" >
    <?php
     echo "<a href='character.php?id={$name['id']}' href='character.php'>". $name['name']."</a>"." &emsp;"."<i class=\"fas fa-heart\"></i>".$name['health'] ." &emsp;"."<i class=\"fas fa-fist-raised\"></i>" . $name['attack'] . " &emsp;"."<i class=\"fas fa-shield-alt\"></i>" . $name['defense'] . "<br>" . "<br>";
    }?>





</a>
</div>
<footer>&copy; [Swen Sperling] 2020</footer>
</body>
</html>
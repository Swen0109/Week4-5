<?php  
$id = $_GET['id'];

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
$query = $conn->prepare("SELECT * FROM characters WHERE id = '$id'");
$query->execute();
$result = $query->fetchall();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Character</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet">
</head>
<body>
<header>
    <a class="backbutton" href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Terug</a></header>
    <div id="container">
    <div class="detail">

        <?php
            foreach ($result as $name){
         ?>

         <h1 style="..."><?php echo $name['name']?></h1>
         <img src="images/<?php echo $name["avatar"]?>" id="img" style="width:200px; height:200px; border-radius:50%">
         <div id="informatie" style="background-color: <?php echo $name['color']?>">

        <?php
                echo  " &emsp;"."<i class=\"fas fa-heart\"></i>".$name['health']."<br>"." &emsp;"."<i class=\"fas 
                fa-fist-raised\"></i>" . $name['attack']."<br>" . " &emsp;"."<i class=\"fas fa-shield-alt\"></i>" 
                . $name['defense'] . "<br>" . "<br>" . $name['weapon'] . "<br>" . $name['armor'] . $name['color'];   
          }?>

        <div class="left">
         </div>


        </div>
        </div>
   
         <div class="right">
            <p><?php echo $name['bio']?></p>
         </div>
        

</div>
<footer>&copy; [Swen Sperling] 2020</footer>
</body>
</html>
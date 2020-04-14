<?php

require("Function.php");
$result = AllCharacters();
$count = CountCharacters();
$hero = getCharacter(1); 

$id=$_GET['id'];

$servername="localhost";
$username="root";
$password="";
$dbname="dynamische applicatie";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (PDOException $e){
    echo "connection failed" . $e->getMessage();
}
$query = $conn->prepare("SELECT * FROM characters WHERE id='$id'");
$query->execute();
$result = $query->fetchall();
 
?>

<?php require 'header.php'?>

<div id="container">
    <div class="detail" style="height:220px;">
        <div class="left">
            <?php 
                foreach ($result as $name){
            ?>
                <h1 style="position: absolute; top: -60px; left:400px; display: inline-block;"><?php echo $name["name"]?> </h1>
                <img src="images/<?php echo $name['avatar']?>" id="img" style="width:200px; height:200px; border-radius:50%">
                <div id="statsbalk" style="background-color:<?php echo $name['color']?>">
            <?php  
                echo  " &emsp;" . "<br>" . "<i class=\"fas fa-heart\"></i>".$name['health'] . "<br>" . " &emsp;"."<i 
                class=\"fas fa-fist-raised\"></i>" . $name['attack'] . "<br>" . " &emsp;"."<i class=\"fas fa-shield-alt\"></i>"
                . $name['defense'] . "<br>" . "<br>" .  $name["weapon"] . "<br>" . $name["armor"];
            }
            ?>
        
            </div>  
        </div>
     </div>
        <div class="right">
        </div>
        
        <div>
            <a><?php echo $name["bio"]?></a>
        </div>
</div>
    <?php require 'Footer.php'?>
</body>
</html>
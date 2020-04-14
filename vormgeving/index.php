<?php
    require("Function.php");
    $result = AllCharacters();
    $count = CountCharacters();
    $hero = getCharacter(1);
?>

<?php require 'header.php'?>
<body>
    <div id="container">
      <?php
        foreach($result as $name){
      ?>

    <img src="images/<?php echo $name["avatar"] ?>" id="img" style="width: 100px; height: 100px; border-radius: 50%">
    
    <?php
     echo "<a href='character.php?i{$name['id']}' href='character.php'>" . $name['name']."</a>"." &emsp;"."<i class=\"fas fa-heart\"></i>".$name['health'] ." &emsp;"."<i class=\"fas fa-fist-raised\"></i>" . $name['attack'] . " &emsp;"."<i class=\"fas fa-shield-alt\"></i>" . $name['defense'] . "<br>" . "<br>";
      } 
    ?>

</div>
    <?php require 'Footer.php'?>
</body>
</html>
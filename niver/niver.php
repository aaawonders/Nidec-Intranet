<?php 

$Multi = true;

?>

<style><?php include ('./niverStyle.css') ;?></style>

<div class="NiverCard">
    <p class="CloseCard">X</p>
    <h1>Feliz Aniversário! 🎉</h1>
    <?php if ($Multi) {}
    echo "<div class='ListaNiver'>";
        echo "<div class='Niverr 1'>";
            echo "<img src='./André Silva.jpeg' alt='' srcset=''>";
            echo "<h2 class='NomeCard'>André Silva</h2>";
            echo "<h3 class='Data'>15 de agosto</h3>";
        echo "</div>";
        echo "<span class='Line'></span>";
        
        echo "<div class='Niverr 2'>";
            echo "<img src='./André Silva.jpeg' alt='' srcset=''>";
            echo "<h2 class='NomeCard'>André Silva</h2>";
            echo "<h3 class='Data'>15 de agosto</h3>";
         echo "</div>";
    echo "</div>";

        if ($Multi){ } ?>
    <p></p>
</div>

<script type="text/javascript" src="jquery-3.6.0.js"></script>
<script src="./niverScript.js"></script>
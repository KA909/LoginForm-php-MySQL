<?php
    include_once 'header.php';
?>  
    <div class="home-body">
    
        <h2>Welcome to SL Geek </h2>
        <?php
        if (isset($_SESSION["username"])){
            echo "<h5>Hello " . $_SESSION["username"] . "!</h5>";
        }
        ?>
        
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, enim.</p>

    </div>
    
    <?php
    include_once 'footer.php';
?>
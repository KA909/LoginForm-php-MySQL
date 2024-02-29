<?php
    include_once 'header.php';
?>  

    <form class = "main-form" action="includes/login.inc.php" method="post">
        <h2 style="font-family: sans-serif; text-align:center">SL Geek School</h2><br>
        <div class="form-group">
            <label for="exampleInputEmail1">Email / Username</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name=uid>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email/Uid with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pwd">
        </div>
        <p style="font-size: 13px;">Don't have an account? <a href = "signup.php">Register!</a></p>
        <button type = "submit" class = "btn btn-success" name= "login-submit" >Login</button>

    </form>

    <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyFillerror"){
                    echo '<div class="alert alert-danger" role="alert">Fill in all the blanks!</div>';
                }
                else if($_GET["error"] == "wronglogin"){
                    echo '<div class="alert alert-danger" role="alert">Invalid Username or password!</div>';
                    
                }
                else if($_GET["error"] == "stmtfailed"){
                    echo '<div class="alert alert-danger" role="alert">Something went wrong, try again!</div>';         
                }
                else if($_GET["error"] == "none"){
                    echo '<div class="alert alert-success" role="alert">Account created!</div>';
                }
               
            }
        ?>
    
    
<?php
    include_once 'footer.php';
?>
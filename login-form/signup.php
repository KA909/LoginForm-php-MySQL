<?php
    include_once 'header.php';
?>  
       <form class = "signup-form" action="includes/signup.inc.php" method ="post">
            <h2 style="font-family: sans-serif; text-align:center">Signup Form</h2><br>
            <div class="form-group">
                <label for="formGroupExampleInput">Name</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Name" name = "name">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput1">Email</label>
                <input type="email" class="form-control" id="formGroupExampleInput1" placeholder="Email" name = "email">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Username</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Username" name = "username">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput3">Password</label>
                <input type="password" class="form-control" id="formGroupExampleInput3" placeholder="password" name = "password">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput4">Re-Enter Password</label>
                <input type="password" class="form-control" id="formGroupExampleInput4" placeholder="password" name = "r-password">
            </div>
            <p style="font-size: 13px;">Already have an account? <a href = "login.php">Login!</a></p>
            <button type = "submit" class = "btn btn-success" name= "signup-submit" >Create account</button>

        </form>

        <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyinput"){
                    echo '<div class="alert alert-danger" role="alert">Fill in all the blanks!</div>';
                }
                else if($_GET["error"] == "invaildUid"){
                    echo '<div class="alert alert-danger" role="alert">Choose a proper username!</div>';
                    
                }
                else if($_GET["error"] == "invaildEmail"){
                    echo '<div class="alert alert-danger" role="alert">Choose a proper email!</div>';
                    
                }
                else if($_GET["error"] == "passwordMismatch"){
                    echo '<div class="alert alert-danger" role="alert">Passwords doesnt match!</div>';
                    
                }
                else if($_GET["error"] == "usernameTaken"){
                    echo '<div class="alert alert-danger" role="alert">Username already taken!</div>';
                    
                }
                else if($_GET["error"] == "stmtfailed"){
                    echo '<div class="alert alert-danger" role="alert">Something went wrong, try again!</div>';
                    
                }
               
            }
        ?>

<?php
    include_once 'footer.php';
?>  

    
   
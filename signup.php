<?php include 'dependency.php'; ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>SIGNUP</title>
        <link rel="stylesheet" type="text/css" href="css/main.css" />
    </head>
    <body>
        <?php
        $enteryErrors = array();
        
        if(count($_POST))
        {
            $signupClass = new Signup(); // creats new instence of the Signup class file
            
            if($signupClass->entryIsValid()) // will call all the checking to make sure it is a valid signup form
            {
                if( $signupClass->saveEntry() ) // if everything was good the entrys will save
                {
                    header("Location: login.php"); // send them to login.php if they signed up correctly
                }
                else
                {
                    echo "something went wrong";
                }
            } 
            else
            {
                $enteryErrors = $signupClass->getErrors(); // if something is wrong this will get the errors and display them 
            }
        }
        ?>
        
        <div id="wrapper">
            <div id="header">
                <h1>Capstone Project</h1>
            </div>   <!-- end div header -->
            
            <div id="nav">  <!--  start nav  -->
                <div id="buttons">
                    <a class="btn" href="index.php"><b>HOME</b></a>
                    <a class="btn" href="proposal.php"><b>PROPOSAL</b></a>
                    <a class="btn" href="prototype.php"><b>PROTOTYPE</b></a>
                    <a class="btn" href="#"><b>Link</b></a>
                    <a class="btn" href="#"><b>Link</b></a>	
                    <a class="btn" href="#"><b>Link</b></a>
                    <a class="btn" href="#"><b>Link</b></a>
                    <a class="btn" href="login.php"><b>GAME</b></a>
                </div>  
            </div>  <!--  end nav  -->    
           
            <div id="container">
                
                <div id="forms">
                    <h1>Sign Up</h1>
                    <form name="signupform" action="signup.php" method="post">

                        Username: <input type="text" name="username" /> <br />
                            <?php 
                                if ( !empty($enteryErrors["username"]) )
                                {
                                    echo '<p class="errorText">',$enteryErrors["username"],'</p>'; // display errors
                                }       
                            ?>
                        Email: <input type="text" name="email" /> <br />
                            <?php 
                                if ( !empty($enteryErrors["email"]) )
                                {
                                    echo '<p class="errorText">',$enteryErrors["email"],'</p>'; // display errors
                                }       
                            ?>
                        Password: <input type="password" name="password" /> <br />
                            <?php 
                                if ( !empty($enteryErrors["password"]) )
                                {
                                    echo '<p class="errorText">',$enteryErrors["password"],'</p>'; // display errors
                                }       
                            ?>
                        <input type="submit" value="Sign Up" />
                        <p class='link'>Already have an account? <a href ="login.php">Login</a></p>
                    </form>
                </div>
                
            </div> <!-- end div container -->
            
            <div id="footer">  <!--  start footer  -->
                    <p class="info">Terms of use | site map | contact</p>
                    <p class="copyr">&copy; McCormick and Lougee, 2014.</p>
            </div>  <!--  end footer  -->
        
        </div><!-- end div wrapper -->
        
    </body>
</html>
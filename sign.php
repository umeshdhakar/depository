<?php session_start();
require ('dbconnect.php');

    if($_SESSION['uid'])
    {
        echo '<script>window.location = "form.php"</script>';
        
    }
    $in=$_POST['signin'];
    $up=$_POST['signup'];
    
    if($in)
    {$uemail=$_POST['uemail'];
     $upass=$_POST['upass'];
     if($uemail&&$upass)
     { $sql="select * from users where email = '$uemail'" ;		
		 $result=$conn->query($sql);
         if($result->num_rows)
         {   $i = $result->fetch_assoc();
             $dbpass=$i['password'];
             $dbemail=$i['email'];
             if($dbemail==$uemail&&$dbpass==$upass)
             {   
                 $_SESSION['uid']=$i['id'];
                 $_SESSION['uname']=$i['username'];
                 echo '<script>window.location = "form.php"</script>';
             }
             else $er='Incorrect password';
         }
         else $er='Email not exist';
     }
     else $er='Incomplete Details';
    }
    if($up)
    {
        $uname=$_POST['name'];
        $uemail=$_POST['email'];
        $upass=$_POST['pass'];
        $ucontact=$_POST['contact'];
        if($uname&&$upass&&$uemail&&$ucontact)
        {    
            $sql="select email from users where email = '$uemail'" ;		
		    $result=$conn->query($sql);
            if($result->num_rows) $er1 = "Email already exist";
            $sql="select contact from users where contact = '$ucontact'" ;		
		    $result=$conn->query($sql);
            if($result->num_rows) $er2= "Contact already exist";
            if (!$er1 && !$er2) {
             $sql = "INSERT INTO users VALUES ('' , '$uname', '$uemail', '$upass', '$ucontact')";
             if ($conn->query($sql)== TRUE ) {
             $id = $conn->insert_id;
             $_SESSION['uid']=$id;
             $_SESSION['uname']=$uname;
             } else {
             echo "Error: " . $sql . "<br>" . $conn->error;
            }
             echo '<script>window.location = "form.php"</script>';
            }           
        }
        else $er='Incomplete Details';
    }
    
   ?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
        <title>login</title>
        <!-- BOOTSTRAP CORE STYLE  -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link href="css/bootstrap.css" rel="stylesheet" />
        <!-- FONT AWESOME ICONS  -->
        <link href="css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLE  -->

        <link rel="stylesheet" href="color/default2.css" />
        <link rel="stylesheet" href="css/style.css" />
        <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        <style>
            success {
                color: limegreen;
            }
            
            .error {
                color: red;
            }
        </style>
    </head>

    <body>
        <div id="navigation">
            <nav class="navbar navbar-custom" role="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="site-logo">
                                <a href="index.php" class="brand">Depository</a>
                            </div>
                        </div>
                        <div class="col-md-2 pull-right">

                            <a href="index.php#service" class="btn btn-info">Back</a>
                        </div>
                    </div>
                </div>
                <!-- /.container -->
            </nav>
        </div>
        <br>
        <div class="container">
            <div class="col-md-4 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">SIGN IN</div>
                    <div class="panel-body">
                        <form method="post" action="sign.php">
                            <div class="form-group">
                                <label for="InputEmail1">E mail</label>
                                <input type="text" name="uemail" class="form-control" id="InputEmail1" placeholder="Enter email" />

                            </div>
                            <div class="form-group">
                                <label for="InputPassword">Password</label>
                                <input type="password" name="upass" class="form-control" id="InputPassword" placeholder="Enter password" />
                            </div>
                            <button type="submit" class="btn btn-info" name="signin" value="in">SIGN IN</button>
                            <span class="error"> <?php echo $er; ?> </span>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">SIGN UP</div>
                    <div class="panel-body">
                        <form method="post" action="sign.php">
                            <div class="form-group">
                                <label for="Inputuser">User name</label>
                                <input type="text" name="name" class="form-control" required id="Inputuser" placeholder="Enter name" />
                            </div>
                            <div class="form-group">
                                <label for="InputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" required id="InputEmail1" placeholder="Enter email" />
                            </div>
                            <div class="error">
                            </div>
                            <div class="form-group">
                                <label for="InputPassword">Password</label>
                                <input type="password" name="pass" class="form-control" required id="InputPassword" placeholder="Enter password" />
                            </div>
                            <div class="form-group">
                                <label for="Inputcontact">Contact</label>
                                <input type="text" name="contact" class="form-control" required id="Inputcontat" placeholder="Enter contact" />
                            </div>
                            <div class="error">
                            </div>
                            <button type="submit" class="btn btn-info" name="signup" value="up">SIGN UP</button>
                            <span class="error"> <?php echo $er1.$er2; ?> </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="footer-menu">
                            <li><a href="index.php#service">Home</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 text-right">
                        <p>&copy;Copyright 2017 - depository.com
                            <!-- 
                        All links in the footer should remain intact. 
                        Licenseing information is available at: http://bootstraptaste.com/license/
                        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Bocor
                    -->
                    </div>
                </div>
            </div>
        </footer>
    </body>

    </html>
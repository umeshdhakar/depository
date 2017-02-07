<?php session_start();
require ('dbconnect.php');
date_default_timezone_set("Asia/Kolkata");
$typeErr = $collegeErr = $imgErr = "";
function generateRandomString() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 6; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["type"])) {
               $typeErr = "required";
            }else {
               $type = test_input($_POST["type"]);
               ins("types","type",$type);
            }
            if (empty($_POST["college"])) {
               $collegeErr = "required";
            }else {
               $college = test_input($_POST["college"]);
               ins("colleges","college",$college);
            }
            if (empty($_POST["where"])) {
               $where = 'Not mentioned';
            }else {
               $where = test_input($_POST["where"]);
            }
            if (empty($_POST["color"])) {
               $color = 'Not mentioned';
            }else {
               $color = test_input($_POST["color"]);
            }
            if (empty($_POST["remark"])) {
               $remark = 'Not mentioned';
            }else {
               $remark = test_input($_POST["remark"]);
            }
            $flag = 5;
            if(!empty($_FILES['image']['name'])){
                $flag= 1 ;   
                $errors= array();
                $file_name = $_FILES['image']['name'];
                $file_size =$_FILES['image']['size'];
                $file_tmp =$_FILES['image']['tmp_name'];
                $file_type=$_FILES['image']['type'];
                if(!$file_info = getimagesize($_FILES['image']['tmp_name']))			
                {$imgErr = "not a image ";
                }

                elseif($file_size > 2097152){
                $sizeErr='File size must be less than 2 MB';
                }
                /*else {
                $defaultimg="Image uploaded" ;
                }*/
            }
            //elseif (!$typeErr)
            elseif (empty($_FILES['image']['name']))
            {//$defaultimg="Default image uploaded" ;
             $flag = 0 ;   
            }
            if(!($typeErr || $sizeErr || $imgErr || $collegeErr))
            { $uid=$_SESSION['uid'];
              $date=date("d/m/Y");
              if($flag == 1)
              {//move_uploaded_file($file_tmp,"images/".$file_name);
               //compress_image($file_tmp, $file_tmp);
               //$move_file = move_uploaded_file($file_tmp, "D:/xampplite/htdocs/lfnew".$file_name);
               $ext = pathinfo($file_name, PATHINFO_EXTENSION);
               $file_name=generateRandomString().'.'.$ext;
               $move_file = move_uploaded_file($file_tmp, "images/".$file_name);
               $sql = "INSERT INTO items VALUES ('' ,'$type','$college', '$where', '$color', '$file_name','$remark', '$date', '$uid')";
               $retval = $conn->query($sql);
               if($retval) $success= "Posted Successfully" ;
              }
              elseif($flag == 0)
              {$fn = "nophoto.jpg";
               $sql = "INSERT INTO items VALUES ('' ,'$type','$college', '$where', '$color', '$fn','$remark', '$date', '$uid')";
               $retval = $conn->query($sql);
               if($retval) $success= "Posted Successfully" ;
              }
            }  
            else
            $fail="Failed to post";
         }
          function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
         function ins($tn,$cn,$w)
		 { GLOBAL $conn;
         	$que="select * from $tn where $cn = '$w'" ;
		    $result=$conn->query($que);
		  if(!($result->num_rows))
		  $conn->query("insert into $tn values('$w')");
		 }
         function val($tn,$cn)
	     {GLOBAL $conn; $out = "";
		  $res = $conn->query("select * from $tn");
		  while($i = $res->fetch_assoc())
		  {$ch = $i[$cn];$out .= "<option value='$ch'>$ch</option>" ;
	 	  }	
           return $out;
	     }
         
         $alltypes = val("types", "type");
         $allcolleges = val("colleges", "college");
?>

    <html>

    <head>
        <title>form </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="color/default2.css" />
        <link rel="stylesheet" href="css/style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .success {
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
                                <a href="index.php#service" class="brand">Depository</a>
                            </div>
                        </div>
                        <div class="col-md-10">

                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                                    <i class="fa fa-bars"></i>
                                </button>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="menu">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href=""> hello: &nbsp; <?php echo $_SESSION['uname']; ?></a></li>
                                    <li><a href="out.php" class="btn btn-info" style="padding:10px;">Log out</a></li>
                                </ul>
                            </div>
                            <!-- /.Navbar-collapse -->
                        </div>
                    </div>
                </div>
                <!-- /.container -->
            </nav>
        </div>
        <br>
        <div class="container">
            <div class="col-md-8 col-md-offset-2 col-xs-12">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Register Item
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="post" action="<?php 
                        echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" enctype="multipart/form-data">
                                <input autofocus style="visibility:hidden">
                                <div class="form-group">
                                    <label for="itemtype" class="col-sm-3 control-label">What</label>
                                    <div class="col-sm-7">
                                        <input type="text" list="items" name="type" id="itemtype" placeholder="What" class="form-control">
                                        <datalist id="items">
                                            <label>Or select from the list </label>
                                            <select name='type' class="form-control alt-list">
                                                <option value="" disabled selected>What</option>
                                                <?php echo $alltypes ?>
                                            </select>
                                        </datalist>
                                    </div>
                                    <div class="col-sm-2"><span class="error">*<?php echo $typeErr; ?></span></div>
                                </div>
                                <div class="form-group">
                                    <label for="itemcollege" class="col-sm-3 control-label">College</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="itemcollege" name="college" class="form-control" placeholder="College" list="colg">
                                        <datalist id="colg">
                                            <label>Or select from the list </label>
                                            <select name='college' class="form-control alt-list">
                                                <option value="" disabled selected>College</option>
                                                <?php echo $allcolleges; ?>
                                            </select>
                                        </datalist>
                                    </div>
                                    <div class="col-sm-2"><span class="error">*<?php echo $collegeErr; ?></span></div>

                                </div>
                                <div class="form-group">
                                    <label for="clrs" class="col-sm-3 control-label">Color</label>
                                    <div class="col-sm-7">
                                        <input type="tetx" id="clrs" list="colors" name="color" placeholder="Color" class="form-control">
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>
                                <div class="form-group">
                                    <label for="itemlocs" class="col-sm-3 control-label">Where</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="where" id="itemlocs" placeholder="Where" class="form-control">
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>

                                <div class="form-group">
                                    <label for="images" class="col-sm-3 control-label">Image</label>
                                    <div class="col-sm-7">
                                        <input type="file" id="images" name="image" class="form-control" />
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>
                                <div class="form-group">
                                    <label for="itemremark" class="col-sm-3 control-label">Remark</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="itemremark" name="remark" class="form-control" placeholder="remark">
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-7 col-sm-offset-3">
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary btn-block ">Register</button>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="index.php#service" type="submit" class="btn btn-primary btn-block">Go Back</a>
                                        </div>
                                        <div class="col-sm-12">
                                            <span class="success"> <?php echo $success;?></span>
                                            <span class="error"> <?php echo $fail.' '.$imgErr.' '.$sizeErr;;?></span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /form -->
            </div>
        </div>
        <!-- ./container -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="footer-menu">
                            <li><a href="index.php#service">Home</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 text-right">
                        <p>depository.com</p>
                        <!-- 
                        All links in the footer should remain intact. 
                        Licenseing information is available at: http://bootstraptaste.com/license/
                        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Bocor
                    -->
                    </div>
                </div>
            </div>
        </footer>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
            $(function() {
                $(document).on('click', 'option', function() {
                    $('.altlist').parent().prev().prev().val(this.text);
                });
            });
        </script>

    </body>
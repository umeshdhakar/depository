<?php session_start(); 
 require ('dbconnect.php');
  if ($_POST['search']) {
  $_SESSION['type']=$_POST["type"];
  $ty=$_SESSION['type'];
  $_SESSION['col']=$_POST["college"];
  $clg=$_SESSION['col'];
  }
    if($_SESSION['type'])
  {
      $ty=$_SESSION['type'];
      $clg=$_SESSION['col'];
  }
 function valu($tn,$cn)
	     {GLOBAL $conn; $out = "";
		  $res = $conn->query("select * from $tn");
		  while($i = $res->fetch_assoc())
		  {$ch = $i[$cn];$out .= "<option value='$ch'>$ch</option>" ;
	 	  }	
           return $out;
	     }
    $alltypes = valu("types", "type");
    $allcolleges = valu("colleges", "college");
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>depository</title>

    <!-- css -->
    <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">-->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/search.css" rel="stylesheet">

</head>

<body>
    <div id="navigation">
        <nav class="navbar navbar-custom" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="site-logo">
                            <a href="index.php#sevice" class="brand">Depository</a>
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
                                <!--<li class="active"><a href="#intro">Home</a></li>-->
                                <li class="active"><a href="index.php#service">Home</a></li>
                            </ul>
                        </div>
                        <!-- /.Navbar-collapse -->
                    </div>
                </div>
            </div>
            <!-- /.container -->
        </nav>
    </div>
    <form method="post" action="search.php">
        <div class="sortpanel">
            <div>
                <ul>
                    <li class="separater">
                        <!--<input list="items" class="text" name="type" placeholder="what" id="itemt" size="10" />
                        <datalist id="items">
                            <?php echo $alltypes; ?>
                        </datalist>
                        -->
                        <select name="type" class="text">
                        <option value="" disabled selected>what</option>
                         <?php echo $alltypes; ?>
                         </select>
                    </li>
                    <li class="separater">
                        <select name="college" class="text" >
                         <option value="" disabled selected>college</option>
                         <?php echo $allcolleges; ?>
                         </select>
                    </li>
                    <li class="separater">
                        <input style="height:42px; width:100px" type="submit" name="search" class="btn btn-success" value="search" />
                    </li>
                </ul>

            </div>
        </div>
    </form>
  <div class="row results">
    <?php  
   if($_SESSION['type'])
   {if(1)
    {      
     $sql = "SELECT * from items where type='$ty' and college='$clg'";
     $it = $conn->query($sql);
     $count=0;
     while($data = $it->fetch_assoc())
     {++$count;
      $colour=$data['color'];
      $in=$data['image'];
      $where = $data['where'];
      $id=$data['id'];
      $ig="images/$in" ;
	  $link="fulldetail.php?idd=$id";      				
       /*echo '<div class="tile">'.
              '<div class="i">'.
                '<span class="helper"></span><img src='.$ig.'>'.
              '</div>'.
               '<div class="det">'.
                  '<table width="100%">'.
                    '<tr><td>'.$colour.'</td></tr>'.
                    '<tr><td>'.$where.'</td></tr>'.
                    '<tr><td colspan="2">'.
                    '<a href='.$link." ".'style="width:100%" class="btn btn-info">Show Details</a></td></tr>'.		
                '</table></div></div>';*/
                ?>
        <div class="tile">
              <div class="i">
                <span class="helper"></span><img src='<?php echo $ig ;?>'>
              </div>
              <div class="det">
                  <table width="100%">
                    <tr><td><?php echo $colour; ?></td></tr>
                    <tr><td><?php echo $where; ?></td></tr>
                    <tr><td colspan="2">
                    <a href='<?php echo $link; ?>' style="width:100%" class="btn btn-info">Show Details</a></td></tr>		
                  </table>
               </div>
        </div>
     <?php
	 }
     if($count==0)
     {  $noresult="sorry, not found" ;
         echo "<div class='message'>$noresult</div>";
     }     
    }
   }
   else   echo '<div class="message" > type your item details and<br> hit search</div>';
   ?>
  </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<script src="js/top.js"></script>
</body>
    
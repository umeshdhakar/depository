<?php session_start();
require ('dbconnect.php');
  $i=$_GET['idd'];
  $sql = "SELECT type, college , items.where, color, remark, items.date, image, items.by from items where items.id= $i";
  $results = $conn->query($sql);
  $data = $results->fetch_assoc();
  $type=$data['type'];
  $college=$data['college'];
  $where=$data['where'];
  $color=$data['color'];
  $in=$data['image'];
  $remark=$data['remark'];
  $date = $data['date'];
  $by=$data['by'];
  $sql = "SELECT username, email, contact from users where id=$by";
  $results = $conn->query($sql);
  $data = $results->fetch_assoc();
  $email=$data['email'];
  $con=$data['contact'];
  $name=$data['username']; 
?>
<html>

<head>
    <title>full details</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style2.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background-image: url(img/backrepeat.jpg);
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
                        <a href="search.php" class="btn btn-info">back</a>
                    </div>
                </div>
            </div>
            <!-- /.container -->
        </nav>
    </div>

    <div class="row">
        <div class="col-md-6 imgarea">
            <div class="heading">image</div>
            <div class="imgdiv">
                <img src='<?php echo "images/$in" ;?>' class="ima">
            </div>
        </div>
        <div class="col-md-6 detailarea">
            <div class="heading">details</div>
            <div class="detaildiv">
                <table>
                    <tr>
                        <th class="about" colspan="2">about item</th>
                    </tr>
                    <tr>
                        <td>Type: </td>
                        <td>
                        <?php echo $type ; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Color:</td>
                        <td>
                        <?php echo $color ; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Remark:</td>
                        <td>
                        <?php echo $remark ; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Date:</td>
                        <td>
                        <?php echo $date; ?>        
                        </td>
                    </tr>
                    <tr>
                        <td>College:</td>
                        <td>
                        <?php echo $college ; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Where:</td>
                        <td>
                        <?php echo $where; ?>
                        </td>
                    </tr>
                    <tr>
                        <th class="about" colspan="2">Contact Details: </th>
                    </tr>
                    <tr>
                        <td>Name:</td>
                        <td>
                        <?php echo $name; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Contact:</td>
                        <td>
                        <?php echo $con; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>
                        <?php echo $email; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
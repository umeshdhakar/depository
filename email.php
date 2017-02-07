<?php
if($_POST){
    $name = $_POST['name'];
    $from = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $to = "kumar886umesh@gmail.com";
    $message = $name . " wrote the following:" . "\n\n" . $_POST['message']. "\nfrom:".$from;
    $headers = "From:" . $from;
    $retval = mail($to,$subject,$message,$headers);
    echo $retval;
}
?>
<?php 
     $res = date_default_timezone_set('Asia/Calcutta');
echo '<br>';
echo date_default_timezone_get();
echo date('d/m/Y'). '---'.$res;
?>
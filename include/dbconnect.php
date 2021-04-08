<?php 
    $connect = mysqli_connect('localhost','root','','giftcorner');
    session_start();








function count_data($query){
    global $connect;

    $r = mysqli_query($connect,$query);
    $count = mysqli_num_rows($r);
    
    return $count;
}




?>

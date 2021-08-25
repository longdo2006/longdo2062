<?php
if(!defined('SECURITY')){
	die('Ban khong co quyen truy cap file nay');
}
$conn = mysqli_connect("localhost", "root", "", "thietbiyte");
if($conn){
    mysqli_query($conn, "SET NAMEs 'utf8'");
}
else{
    echo " Ket noi that bai!";
}
?>
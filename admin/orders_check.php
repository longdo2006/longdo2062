<?php
if (!defined('SECURITY')) {
    die('Ban khong co quyen truy cap trang nay');
}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
    <?php
  $od_id = $_GET['od_id'];
    // $sql = "SELECT * FROM orders
    //         WHERE od_id = $od_id";
    // $query = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_array($query);
   
    if(isset($_POST['sbm'])){
        $od_check = $_POST['od_check'];

        $sql_update = "UPDATE orders SET od_check = '$od_check' WHERE od_id='$od_id'";
        $query_update = mysqli_query($conn,$sql_update);
        header('location: index.php?page_layout=orders');


    }
   
    ?>
    <form method="post" action="">
    <select name="od_check">
        <option value=1>Đã xử lý</option>
        <option value=0>Chưa xử lý</option>
    </select>
    <button name="sbm" type="submit">Submit</button>
    </form>
</div>



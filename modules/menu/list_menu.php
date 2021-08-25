<?php
$sql = "SELECT*FROM category ORDER BY cat_id ASC LIMIT 5";
$query = mysqli_query($conn,$sql);
?>
<div id="list-menu">

    <li class="nav-item dropdown">
        <div class="list-cat">
            <a class="nav-link" href="#" id="navbarDropdown"><i class="fa fa-bars" aria-hidden="true"></i> Danh mục sản phẩm</a>
        </div>
        <?php

        ?>
        <div class="dropdown-content">
        <?php while($row = mysqli_fetch_array($query)){ ?>
            <a class="dropdown-item" href="index.php?page_layout=category&cat_id=<?php echo $row['cat_id']; ?>&cat_name=<?php echo $row['cat_name']; ?>"><b style="font-size: 16px;"><?php echo $row['cat_name']; ?></b></a>
        <?php } ?>
            

        </div>
    </li>
</div>
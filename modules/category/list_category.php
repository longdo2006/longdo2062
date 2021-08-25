<div class="col-lg-3 col-md-4 col-sm-12">

<nav class="vertical">

<ul>
  <?php
  $sql_cat = "SELECT * FROM category
                   ORDER BY cat_id ASC";
  $query_cat = mysqli_query($conn, $sql_cat);
  $cat_id =  "SELECT DISTINCT cat_id FROM category";
  $sql = "SELECT prd_id,prd_name,cat_id FROM product WHERE cat_id IN(SELECT DISTINCT cat_id FROM category)";
  $query = mysqli_query($conn, $sql);
  
  $rows_cat = [];
  $rows = [];
  while ($row_cat = mysqli_fetch_array($query_cat)) {
    array_push($rows_cat, $row_cat);
    
  }
  while ($row = mysqli_fetch_array($query)) {
    array_push($rows, $row);

  }
  for ($i = 0; $i < count($rows_cat); $i++) {
  ?>
    <li><a href="index.php?page_layout=category&cat_id=<?php echo $rows_cat[$i]['cat_id']; ?>&cat_name=<?php echo $rows_cat[$i]['cat_name']; ?>"><?php echo $rows_cat[$i]['cat_name']; ?></a>
      <?php for ($j = 0; $j < count($rows); $j++) {
        if ($rows_cat[$i]['cat_id'] == $rows[$j]['cat_id']) {
      ?>
          <ul>
            <li>
              <a href="index.php?page_layout=product&prd_id=<?php echo $rows[$j]['prd_id']; ?>">
                <?php echo $rows[$j]['prd_name']; ?>
              </a>
            </li>
          </ul>
      <?php
        }
      }
      ?>

    </li>
  <?php } ?>

</ul>

</nav>
</div>
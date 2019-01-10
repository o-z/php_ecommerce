<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <?php

              $query = query("SELECT * FROM categories WHERE cat_id=" .escape_string($_GET['id']) . "");
              confirm($query);
              while ($row = fetch_array($query)) {
$category = <<<DELIMETER
<h2>{$row['cat_title']}</h2>

DELIMETER;
echo $category;}
              ?>
        </header>

        <form name="Table Properties" method="post" >

          <button type="submit" name="sort_week" class="button" value="0"> Fiyat Azalan </button>
          <button type="submit" name="sort_week" class="button" value="1"> Fiyat Artan </button>
        </form>
        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Products</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

            <?php
            if (isset($_POST['sort_week'])) {
              if($_POST['sort_week'] == "0") {
                 get_products_in_cat_page(0);
               }else if ($_POST['sort_week'] == "1") {
                 get_products_in_cat_page(1);
               }
            }else {
              get_products_in_cat_page(3);
            }


              ?>



        </div>
        <!-- /.row -->



    </div>
    <!-- /.container -->

    <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>

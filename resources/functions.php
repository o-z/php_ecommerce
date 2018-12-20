<?php

// helper fonctions

function redirect(){
  header("Location : $location");
}
function query($sql){
  global $connection;
  return mysqli_query($connection , $sql);

}
function confirm($result){
  global $connection;
  if (!$result) {
    die("SORGU HATASI". mysqli_error($connection));
  }
}
function escape_string($string){
  global $connection;
  return msqli_real_escape_string($connection, $string);
}

function fetch_array($result){
   return mysqli_fetch_array($result);
}



//get products

function get_products(){

$query= query(" SELECT * FROM products");
confirm($query);

while ($row = fetch_array($query)) {
$product = <<<DELIMETER

<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <a href="item.php?id={$row['product_id']}"> <img src="{$row['product_image']}" alt=""></a>
        <div class="caption">
            <h4 class="pull-right">&#36;{$row['product_price']}</h4>
            <h4><a href="product.html">{$row['product_title']}</a>
            </h4>
            <p>{$row['product_description']}</p>
            <a class="btn btn-primary"  href="item.php?id={$row['product_id']}">Add to Cart</a>
        </div>

    </div>
</div>

DELIMETER;
echo $product;
}

}
 ?>

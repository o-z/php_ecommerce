<?php

// helper fonctions
function set_message($msg){
  if (!empty($msg)) {
    $_SESSION['message']=$msg;
  }else{
    $msg="";
  }
}
function display_message(){
  if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  }
}


function redirect($location){
return  header("Location: $location");
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
  return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result){
   return mysqli_fetch_array($result);
}

/*****front end fonctions*****/

//get products

function get_products(){

$query= query(" SELECT * FROM products");
confirm($query);

while ($row = fetch_array($query)) {
$product = <<<DELIMETER

<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <a href="item.php?id={$row['product_id']}"> <img src="{$row['product_image']}" alt="" style="width:320px;height:150px; "></a>
        <div class="caption">
            <h4 class="pull-right">&#36;{$row['product_price']}</h4>
            <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
            </h4>
            <p>{$row['short_desc']}</p>
            <a class="btn btn-primary"  href="cart.php?add={$row['product_id']}">Buy Now</a>
            <a class="btn btn-primary"  href="item.php?id={$row['product_id']}">More Info</a>
        </div>

    </div>
</div>

DELIMETER;
echo $product;
}

}
function get_categories(){
  $query = query("SELECT * FROM categories");
  confirm($query);
  while ($row = fetch_array($query)) {
$category_links = <<<DELIMETER

     <a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>
DELIMETER;
echo $category_links;
  }


}

function get_products_in_cat_page(){

$query= query(" SELECT * FROM products WHERE product_category_id= " .escape_string($_GET['id']) . "");
confirm($query);

while ($row = fetch_array($query)) {
$product = <<<DELIMETER

<div class="col-md-3 col-sm-6 hero-feature">
    <div class="thumbnail">
        <a href="item.php?id={$row['product_id']}"> <img src="{$row['product_image']}" alt="" style="width:320px;height:150px;"></a>
        <div class="caption" style="overflow:hidden">
            <h4 class="pull-right">&#36;{$row['product_price']}</h4>
            <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
            </h4>
            <p>{$row['short_desc']}</p>
            <a class="btn btn-primary"  href="cart.php.php?add={$row['product_id']}">Buy Now</a>
            <a class="btn btn-primary"  href="item.php?id={$row['product_id']}">More Info</a>
        </div>

    </div>
</div>

DELIMETER;
echo $product;
}

}

function get_products_in_shop_page(){

$query= query(" SELECT * FROM products");
confirm($query);

while ($row = fetch_array($query)) {
$product = <<<DELIMETER

<div class="col-md-3 col-sm-6 hero-feature">
    <div class="thumbnail">
        <a href="item.php?id={$row['product_id']}"> <img src="{$row['product_image']}" alt="" style="width:320px;height:150px;"></a>
        <div class="caption">
            <h4 class="pull-right">&#36;{$row['product_price']}</h4>
            <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
            </h4>
            <p>{$row['short_desc']}</p>
            <a class="btn btn-primary"  href="item.php?id={$row['product_id']}">Buy Now</a>
            <a class="btn btn-primary"  href="item.php?id={$row['product_id']}">More Info</a>
        </div>

    </div>
</div>

DELIMETER;
echo $product;
}

}


function login_user(){

if(isset($_POST['submit'])){

  $username = escape_string($_POST['username']);
  $password = escape_string($_POST['password']);

  $query=query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'");
  confirm($query);

  if(mysqli_num_rows($query)== 0){
    set_message("Your Password or Userrname are wrong");
    redirect("login.php");
  }else{
    set_message("Welcome to Admin {$username}");
    redirect("admin");
  }
}



}

function  send_message(){
  if(isset($_POST['submit'])){
    $to        = "eticaretoguzzeyveli@gmail.com";
    $from_name = $_POST['name'];
    $subject   = $_POST['subject'];
    $email     = $_POST['email'];
    $message     = $_POST['message'];
    $ip_adress  =$_SERVER['REMOTE_ADDR'];
    $headers   = "From:{$from_name} Ip address: {$ip_adress}";
    $result = mail($to ,$subject,"Message:{$message} Email: {$email}",$headers );
    if (!$result) {
      return "ERROR!";


    }else {
      return "SENT";


    }
}
}
/*****Back end fonctions*****/

 ?>

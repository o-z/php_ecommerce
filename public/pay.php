<?php require_once("../resources/config.php"); ?>
<?php require_once("cart.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div class="container" >
        <div class="row">



          <div class="col-xs-12 col-md-4">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">
                          Payment Details
                      </h3>
                      <div class="checkbox pull-right">
                          <label>
                              <input type="checkbox" />
                              Remember
                          </label>
                      </div>
                  </div>
                  <div class="panel-body">
                      <form role="form">
                      <div class="form-group">
                          <label for="cardNumber">
                              CARD NUMBER</label>
                          <div class="input-group">
                              <input type="text" class="form-control" id="cardNumber" placeholder="Valid Card Number"
                                  required autofocus />
                              <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-xs-7 col-md-7">
                              <div class="form-group">
                                  <label for="expityMonth">
                                      EXPIRY DATE</label>
                                  <div class="col-xs-6 col-lg-6 pl-ziro">
                                      <input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
                                  </div>
                                  <div class="col-xs-6 col-lg-6 pl-ziro">
                                      <input type="text" class="form-control" id="expityYear" placeholder="YY" required /></div>
                              </div>
                          </div>
                          <div class="col-xs-5 col-md-5 pull-right">
                              <div class="form-group">
                                  <label for="cvCode">
                                      CV CODE</label>
                                  <input type="password" class="form-control" id="cvCode" placeholder="CV" required />
                              </div>
                          </div>
                      </div>
                      </form>
                  </div>
              </div>
              <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a href="#"><span class="badge pull-right"><span class="glyphicon glyphicon-usd"></span><?php echo escape_string($_GET['add']) ?></span> Final Payment</a>
                  </li>
              </ul>
              <br/>
              <a href="tesekkur.php" class="btn btn-success btn-lg btn-block" role="button">Pay</a>
          </div>






        </div>
    </div>



  </body>
  <style media="screen">
  body { margin-top:20px; }
  .panel-title {display: inline;font-weight: bold;}
  .checkbox.pull-right { margin: 0; }
  .pl-ziro { padding-left: 0px; }

  </style>

</html>



    <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>

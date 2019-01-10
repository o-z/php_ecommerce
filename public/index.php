<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!--Categories here-->
            <?php include(TEMPLATE_FRONT . DS . "side_nav.php") ?>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <!--Carause-->
                        <?php include(TEMPLATE_FRONT . DS . "slider.php") ?>

                    </div>


                <div class="row">
                <div class="col-sm-4">
                <div id="clockdiv" style="text-align: right;">
                  <style media="screen">



                  #clockdiv{
                  	font-family: sans-serif;
                  	color: #fff;
                  	display: inline-block;
                  	font-weight: 100;
                  	text-align: center;
                  	font-size: 12px;

                    margin-top:  10px;
                  }

                  #clockdiv > div{
                  	padding: 10px;
                  	border-radius: 5px;
                  	background: #777777;
                  	display: inline-block;
                    text-align: center;
                  }

                  #clockdiv div > span{
                  	padding: 15px;
                  	border-radius: 3px;
                  	background: #333333;
                  	display: inline-block;
                  }

                  .smalltext{
                  	padding-top: 5px;
                  	font-size: 12px;
                  }


                  </style>

                  <div>
                    <span class="hours"></span>
                    <div class="smalltext">Hours</div>
                  </div>
                  <div>
                    <span class="minutes"></span>
                    <div class="smalltext">Minutes</div>
                  </div>
                  <div>
                    <span class="seconds"></span>
                    <div class="smalltext">Seconds</div>
                  </div>
                </div>

                </div>

                <div class="col-sm-8" style="text-align: left; margin-top:20px;">
                  <h4 >Saat içerisinde Kargoda</h4>

                  </div>
                </div>
                </div>
                <br>

                <script type="text/javascript">
                function getTimeRemaining(endtime) {
                  var d = new Date();

                  var seconds = 60-d.getSeconds();
                  var minutes = 60-d.getMinutes();
                  var hours = 17-d.getHours()-1;
                  if (d.getHours() >= 17) {
                    var seconds = 0;
                    var minutes = 0;
                    var hours = 0;
                  }
                return {


                'hours': hours,
                'minutes': minutes,
                'seconds': seconds
                };
                }

                function initializeClock(id, endtime) {
                var clock = document.getElementById(id);
                var daysSpan = clock.querySelector('.days');
                var hoursSpan = clock.querySelector('.hours');
                var minutesSpan = clock.querySelector('.minutes');
                var secondsSpan = clock.querySelector('.seconds');

                function updateClock() {
                var t = getTimeRemaining(endtime);


                hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
                minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
                secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

                if (t.total <= 0) {
                  clearInterval(timeinterval);
                }
                }

                updateClock();
                var timeinterval = setInterval(updateClock, 1000);
                }

                var deadline = new Date(Date.parse(new Date()) + 1 * 24 * 60 * 60 * 1000);
                initializeClock('clockdiv', deadline);
                </script>



                <div class="row">

                  <?php  get_products();  ?>






                </div> <!--row end here-->
                </div>
            </div>

        </div>

    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>

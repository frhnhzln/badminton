
<?php 
include 'dbconn.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <title>Book A Car</title>

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="http://localhost/crental/assets/css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/crental/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/crental/assets/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/crental/assets/css/bootstrap.cus.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/crental/assets/css/bootstrap_custom.css"> 
    <link rel="stylesheet" type="text/css" href="http://localhost/crental/assets/css/sistemkik.css"/>
    <link rel="stylesheet" type="text/css" href="http://localhost/crental/assets/css/bootstrap-datatables.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/crental/assets/css/datepicker.css">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="assets/css/plugins/slicknav.min.css" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="assets/css/plugins/magnific-popup.css" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="assets/css/plugins/owl.carousel.min.css" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="assets/css/plugins/gijgo.css" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="assets/css/reset.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="style.css" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="assets/css/responsive.css" rel="stylesheet">

    <script src="http://localhost/crental/assets/js/jquery-1.10.2.min.js"></script>
    <script src="http://localhost/crental/assets/js/validation.js"></script>
    
    <script src="http://localhost/crental/assets/js/jquery-1.10.2.min.js"></script>
    <!--<script src="http://localhost/crental/assets/js/jquery.validate.js"></script>-->
    <script src="http://localhost/crental/assets/js/bootstrap.js"></script>
    <script src="http://localhost/crental/assets/js/bootstrap-datepicker.js"></script>
   
  

    <style>

      .btn{
        font-family: Arial;
       -webkit-border-radius: 5px;
       -moz-border-radius: 5px;
            border-radius: 5px;
        filter: progid:dximagetransform.microsoft.gradient(startColorstr='#ffffff', endColorstr='#e6e6e6', GradientType=0);
        filter: progid:dximagetransform.microsoft.gradient(enabled=false);
        *zoom: 1;
        -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 5px rgba(0, 0, 0, 0.05);
           -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 5px rgba(0, 0, 0, 0.05);
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 5px rgba(0, 0, 0, 0.05);
                box-shadow: 4px 4px 4px #888888;
      }

  
      .btn-primary{
        background-color: #4B194D;
        font-size:12px;
      }

      .btn-danger{
        background-color: #DF344D;
        font-size:12px;
      }

      .btn-success{
        font-size:12px;
      }

      .accordion-group{
        border-color: #CCC;
      }

    </style>

    <style>
    .pagination ul > li > a, .pagination ul > li > span
    {
     
      border: 1px solid #ccc;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
           -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -webkit-transition: border linear 0.2s, box-shadow linear 0.2s;
           -moz-transition: border linear 0.2s, box-shadow linear 0.2s;
            -ms-transition: border linear 0.2s, box-shadow linear 0.2s;
             -o-transition: border linear 0.2s, box-shadow linear 0.2s;
                transition: border linear 0.2s, box-shadow linear 0.2s;  
                 
    }
    .pagination ul > li > a:hover,
    .pagination ul > .active > a,
    .pagination ul > .active > span,
    .pagination ul > .MarkupPagerNavOn > a,
    .pagination ul > .MarkupPagerNavOn > span {
      background-color: #DF344D;
    }


    
    </style>

 
  </head>

  <body>

    

    
       
<script>

    $(document).ready(function() {   

    var startDate = new Date('dd/mm/yyyy');
    var FromEndDate = new Date();
    var ToEndDate = new Date();

    ToEndDate.setDate(ToEndDate.getDate());

    $('.from_date').datepicker({
        
        weekStart: 1,
        startDate: '+1d',
        endDate: startDate,
        autoclose: true,
        format: 'dd/mm/yyyy'
    })
        .on('changeDate', function(selected){
            startDate = new Date(selected.date.valueOf());
            startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
            $('.to_date').datepicker('setStartDate', startDate);
            $('.to_date')[0].focus();
        }); 


    $('.to_date')
        .datepicker({
            
            weekStart: 1, 
            startDate: '+1d',
            endDate: startDate,
            autoclose: true,
            format: 'dd/mm/yyyy'
        })       
    });
    
</script>
   
</head>

    <body class="loader-active">

    <!--== Preloader Area Start ==-->
    
    <!--== Preloader Area End ==-->

    <!--== Header Area Start ==-->
    <header>
        <!--== Header Top Start ==-->
        <div >
          
        </div>
        <!--== Header Top End ==-->

        <!--== Header Bottom Start ==-->
        <div id="header-bottom">
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <div class="col-lg-4">
                         <H1>CAR RENTAL HUB</H1>
                         <a href="indexafterlogin.php" class="logo">
                           
                        </a>
                    </div>
                    <!--== Logo End ==-->

                    <!--== Main Menu Start ==-->
                    <div class="col-lg-8 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>
                                <li class="active"><a href="indexafterlogin.php">Home</a>
                                 
                                </li>
                                
                            
                                <li><a href="catalogue.php">Car List</a>
                                    
                                </li>
                                <li><a href="reservation.php">Make A Book</a>
                                    
                                </li>
                                
                                <li><a href="about.php">T&C</a></li>
                                <li><a href="contact.php">Contact Us</a></li>
                                <li><a href="indexafterlogin.php">Hi,<?php echo $_SESSION['email']; ?></a>
                                    <ul>
                                        <li><a href="profile.php">My Profile</a></li>
                                        <li><a href="history2.php">Booking History</a></li>

                                        <li><a href="logout1.php">Sign Out</a></li>
                                       
                                      
                                    </ul>
                                </li>
                              
                                    
                            </ul>
                        </nav>
                    </div>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>


        <!--== Header Bottom End ==-->
    </header>
 
        
   
        <br>
        <div align="center">  <p><b><h3>INSERT YOUR DETAILS</h3></b></p></div><br>
        <div class="container layoutcontainer breadcrumb">
<form class="form-horizontal" method="post" name="form1" id="form1" action="carlistss.php">

  <table border="0" class="">
    <tr>
      <td>&nbsp;<td>
      <td>&nbsp;<td>
      <td>&nbsp;<td>
    <tr>
    <tr>
      <td><font face="Arial" size="3px"><strong>Pick-up Date/Time</strong></font><td>
      <td>&nbsp;</td>
      <td><font face="Arial" size="3px"><strong>Return Date/Time</strong></font><td>
    <tr>
    <tr>
      <td>
        <div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
        <input class="from_date input-medium" name="pick_up" id="pick_up" contenteditable="false" type="text">
        <span class="add-on"><i class="icon-calendar"></i></i></span>
        </div>

        <select class="input-small" name="pick_hour" id="pick_hour" style="width:75px">
          <option value="00">00</option>
          <option value="01">01</option>
          <option value="02">02</option>
          <option value="03">03</option>
          <option value="04">04</option>
          <option value="05">05</option>
          <option value="06">06</option>
          <option value="07">07</option>
          <option value="08" selected>08</option>
          <option value="09">09</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
        </select>

        <select class="input-small" name="pick_minute" id="pick_minute" style="width:75px">
          <option value="00">00</option>
          <option value="01">01</option>
          <option value="02">02</option>
          <option value="03">03</option>
          <option value="04">04</option>
          <option value="05">05</option>
          <option value="06">06</option>
          <option value="07">07</option>
          <option value="08">08</option>
          <option value="09">09</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
          <option value="32">32</option>
          <option value="33">33</option>
          <option value="34">34</option>
          <option value="35">35</option>
          <option value="36">36</option>
          <option value="37">37</option>
          <option value="38">38</option>
          <option value="39">39</option>
          <option value="40">40</option>
          <option value="41">41</option>
          <option value="42">42</option>
          <option value="43">43</option>
          <option value="44">44</option>
          <option value="45">45</option>
          <option value="46">46</option>
          <option value="47">47</option>
          <option value="48">48</option>
          <option value="49">49</option>
          <option value="50">50</option>
          <option value="51">51</option>
          <option value="52">52</option>
          <option value="53">53</option>
          <option value="54">54</option>
          <option value="55">55</option>
          <option value="56">56</option>
          <option value="57">57</option>
          <option value="58">58</option>
          <option value="59">59</option>
        </select>
      <td>
      <td style="padding-left: 200px;">&nbsp;</td>
      <td>
        <div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
        <input class="to_date input-medium" name="return" id="return" contenteditable="false" type="text">
        <span class="add-on"><i class="icon-calendar"></i></span>
        </div>
        <select class="input-small" name="return_hour" id="return_hour" style="width:75px">
          <option value="00">00</option>
          <option value="01">01</option>
          <option value="02">02</option>
          <option value="03">03</option>
          <option value="04">04</option>
          <option value="05">05</option>
          <option value="06">06</option>
          <option value="07">07</option>
          <option value="08" selected>08</option>
          <option value="09">09</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
        </select>
        <select class="input-small" name="return_minute" id="return_minute" style="width:75px">
          <option value="00">00</option>
          <option value="01">01</option>
          <option value="02">02</option>
          <option value="03">03</option>
          <option value="04">04</option>
          <option value="05">05</option>
          <option value="06">06</option>
          <option value="07">07</option>
          <option value="08">08</option>
          <option value="09">09</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
          <option value="32">32</option>
          <option value="33">33</option>
          <option value="34">34</option>
          <option value="35">35</option>
          <option value="36">36</option>
          <option value="37">37</option>
          <option value="38">38</option>
          <option value="39">39</option>
          <option value="40">40</option>
          <option value="41">41</option>
          <option value="42">42</option>
          <option value="43">43</option>
          <option value="44">44</option>
          <option value="45">45</option>
          <option value="46">46</option>
          <option value="47">47</option>
          <option value="48">48</option>
          <option value="49">49</option>
          <option value="50">50</option>
          <option value="51">51</option>
          <option value="52">52</option>
          <option value="53">53</option>
          <option value="54">54</option>
          <option value="55">55</option>
          <option value="56">56</option>
          <option value="57">57</option>
          <option value="58">58</option>
          <option value="59">59</option>
        </select>
      <td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
   
  </table>

  <br><br>
  <input class="btn btn-success" type="submit" name="booking" id="booking" value="Reserve Date">
  <a class="btn btn-danger" href="cancel.php">Cancel Reservation</a>

</form>



</div>



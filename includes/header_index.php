
<header>
  <div class="default-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2">
          <div class="logo">
            <a href="indexx.php">
              <img src="image/bdmntn logo only.png" alt="image" style="width: 160px; height: auto;">
            </a>
          </div>
        </div>
        <div class="col-sm-9 col-md-10">
          <div class="header_info">
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
              <p class="uppercase_text">Email us : </p>
              <a "mailto:khairil@gmail.com">khairil@gmail.com </a> </div>
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
              <p class="uppercase_text">Call Us: </p>
              <a href="tel:012-365 7295">+6012-365 7295</a> </div>
            <div class="social-follow">
              <ul>
                <li><a href="https://www.facebook.com/selangor.badminton.sba/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                <!-- <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li> -->
                <li><a href="https://www.instagram.com/ba.selangor/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              </ul>
            </div>
  <!-- <?php   if(strlen($_SESSION['login'])==0)
	{
?>-->

<?php }
else{

echo "Welcome To Car Rental Hub";
 } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>


   <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
           <!--<?php if($_SESSION['student_id']){?>-->
            <li><a href="profile.php">Profile Settings</a></li>
              <li><a href="update-password.php">Update Password</a></li>
            <li><a href="mybooking.php">My Booking</a></li>
            <li><a href="logout_c.php">Sign Out</a></li>
            <?php } else { ?>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Profile Settings</a></li>
              <!--<li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Update Password</a></li>-->
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Booking</a></li>
            <li><a href="logout_c.php"  data-toggle="modal" data-dismiss="modal">Sign Out</a></li>
            <?php } ?>
          </ul>
            </li>
          </ul>
        </div>
        <div class="header_search">
          <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
          <form action="car-listing.php?name=" method="get" id="header-search-form">
            <input type="text" placeholder="Search..." class="form-control">
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <!-- <li><a href="index.php">Book Now!</a>    </li> -->
          <li><a href="indexx.php">Home</a>    </li>
          <li><a href="field-listing.php">Court</a>
          <li><a href="page.php?type=aboutus">About Us</a></li>
          <li><a href="page.php?type=faqs">FAQs</a></li>
          <li><a href="contact-us.php">Contact Us</a></li>
          <!-- <li><a href="logout_c.php">Login</a></li> -->
          <?php if(!isset($_SESSION['student_id']) || empty($_SESSION['student_id'])) { ?>
              <li><a href="signincust.php">Log In</a></li>
          <?php } else { ?>
              <li><a href="logout_c.php">Log Out</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end -->

</header>

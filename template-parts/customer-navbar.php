<?php include("template-parts/customer-header");?>
<nav class="navbar navbar-default navbar-fixed">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle " data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
          <span>
              <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
              takeAway
          </span>
      </a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li>
              <a href="#">
                  <p>Orders</p>
              </a>
          </li>
          <li>
              <a href="#">
                  <p>Add Menu</p>
              </a>
          </li>
          <li>
              <a href="#">
                  <p>History</p>
              </a>
          </li>
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-user"></i>
              </a>
              <ul class="dropdown-menu">
                  <li><a href="#">User Profile</a></li>
                  <li><a href="#">Logout</a></li>
              </ul>
          </li>
        </ul>
    </div>
  </div>
</nav>

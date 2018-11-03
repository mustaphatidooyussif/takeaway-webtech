<nav class="navbar navbar-default navbar-fixed"> <!-- NAVBAR -->
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
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
                        <li class="dropdown atule-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <p>
                                    Select cafeteria
                                    <b class="caret"></b>
                                </p>

                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Akornor</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Bigben</a></li>
                            </ul>
                        </li>

                        <li class="atule-dropdown">
                            <a href="">
                                <p>History</p>
                            </a>
                        </li>

                        <li class="atule-dropdown">
                            <a href="">
                                <i class="fas fa-cart-plus" style="padding-bottom: 14px;"></i>
                                <span class="badge"><?php echo $number_of_orders ?></span>
                            </a>
                        </li>
                        <li class="dropdown atule-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="far fa-user" style="padding-bottom: 14px;"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav><!-- END NAVBAR -->
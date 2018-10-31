<?php include('template-parts/admin-header.php'); ?>
   

 <div class="wrapper"> <!-- WRAPPER -->
    <?php include('template-parts/atule-customer-navbar.php'); ?>
        <div class="atule-content"><!-- CONTENT CONTAINER-->

            <div class="container-fluid"> <!-- ORDER CONTAINER -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Your Orders</h4>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Food Item</th>
                                            <th>Type</th>
                                            <th>Price</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Akornor Jollof</td>
                                                <td>Full Portion</td>
                                                <td>Ghc8.50</td>
                                                
                                                <td><button type="button" class="btn btn-danger btn-fill pull-right">Remove order</button></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Minerva Hooper</td>
                                                <td>$23,789</td>
                                                <td>Curaçao</td>
                                                <td><button type="button" class="btn btn-danger btn-fill pull-right">Remove order</button></td>                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="row atule-orders-table"><!-- orders submit button -->
                                    <div class="col-md-3 atule-total-price">
                                        <label>Total Price: </label>
                                        <button type="button" class="btn btn-light disabled">Ghc13.50</button>
                                    </div>
                                    <div class="col-md-3 atule-submit-orders">
                                        <button type="submit" class="btn btn btn-success">Submit order</button>
                                    </div>
                                </div><!-- end orders submit button -->
                            </div> 
                        </div>
                    </div>
            </div><!-- END ORDERS CONTAINER -->



            <div class="row atule-searchbox"><!-- SEARCH AND FILTER BOXES -->
                <div class="col-md-4" >
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="search food menu " aria-describedby="sizing-addon1">
                    </div>
                </div>

                <div class="col-md-2 atule-filter">
                    <div class="input-group input-group-lg">
                        <div class="input-group-btn">
                            <!-- Button and dropdown menu -->
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Breakfast</a></li>
                                <li><a href="#">Lunch</a></li>
                                <li><a href="#">Supper</a></li>
                                <li><a href="#">Drinks & Snacks</a></li>
                            </ul>
                        </div>
                        <input type="text" class="form-control" aria-label="..." value="Filter By">
                    </div>
                </div>
            </div><!-- END SEARCH AND FILTER BOXES -->


                <div class="container-fluid"> <!-- FOOD MENU CONTAINER -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Akornor Food Menu</h4>
                                    <p class="category">Here is a subtitle for this table</p>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Food Item</th>
                                            <th>Type</th>
                                            <th>Price</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Akornor Jollof</td>
                                                <td>Full Portion</td>
                                                <td>Ghc8.50</td>
                                                <td><button type="button" class="btn btn-success btn-fill pull-right"><i class="fa fa-plus"></i> <b>ADD</b></button></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Minerva Hooper</td>
                                                <td>$23,789</td>
                                                <td>Curaçao</td>
                                                <td><button type="button" class="btn btn-success btn-fill pull-right"><i class="fa fa-plus"></i> <b>ADD</b></button></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Sage Rodriguez</td>
                                                <td>$56,142</td>
                                                <td>Netherlands</td>
                                                <td><button type="button" class="btn btn-success btn-fill pull-right"><i class="fa fa-plus"></i> <b>ADD</b></button></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Philip Chaney</td>
                                                <td>$38,735</td>
                                                <td>Korea, South</td>
                                                <td><button type="button" class="btn btn-success btn-fill pull-right"><i class="fa fa-plus"></i> <b>ADD</b></button></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Doris Greene</td>
                                                <td>$63,542</td>
                                                <td>Malawi</td>
                                                <td><button type="button" class="btn btn-success btn-fill pull-right"><i class="fa fa-plus"></i> <b>ADD</b></button></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Mason Porter</td>
                                                <td>$78,615</td>
                                                <td>Chile</td>
                                                <td><button type="button" class="btn btn-success btn-fill pull-right"><i class="fa fa-plus"></i> <b>ADD</b></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- END FOOF MENU CONTAINER -->

        </div><!-- END CONTENT DIV -->

        </div><!-- END WRAPPER DIV -->


<?php include('template-parts/atule-customer-footer.php'); ?>
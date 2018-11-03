<?php
$admin_email = "mustapha@ashesi.edu.gh";
$admin_table = "admins_table";
?>
<?php include('template-parts/admin-header.php'); ?>

<div class="wrapper">
	<!--sidebar-->
    <?php include('template-parts/admin-sidebar.php'); ?>

    <div class="main-panel">
			<!--navbar-->
				<?php include('template-parts/admin-navbar.php'); ?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <?php
                                    //Get admin by id
                                    //$admin_table
                                    $admin = $db->selectItemByColumn($admin_table, "admin_email", $admin_email)->fetch();
                                 ?>
                                <form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" placeholder="Username" value ="<?php echo $admin['admin_username']; ?>" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" placeholder="Email" value ="<?php echo $admin['admin_email']; ?>" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea id="aboutme" rows="8"  class="form-control" placeholder="Description here"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!--Profile Photo-->
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image" >
                                <img  src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                            <input id="imageUpload" type="file" name="profile_photo" placeholder="Photo" required="" capture>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img id="profileImage" class="avatar border-gray" src="images/faces/face-8.jpg" alt="..."/>

                                      <h4 class="title">mustapha<br />
                                         <small>mustapha.yussif@ashesi.edu.gh</small>
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center" id="display_aboutme"> You have an administrator<br>
                                                    Privilleges <br>
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

<?php include('template-parts/admin-footer.php'); ?>

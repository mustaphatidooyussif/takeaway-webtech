<!DOCTYPE html>
<html>
<body>
	<div>
		<div>
            <footer class="footer">
                <div class="container-fluid">
                   <!--Footer code will go here-->
                </div>
            </footer>

        </div>
    </div>

<!--   Core JS Files   -->
<script src="js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>

<!--Editor-->
<script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
    // ClassicEditor
    //     .create( document.querySelector( '#aboutme' ) )
    //     .catch( error => {
    //         console.error( error );
    //     } );
</script>

<!--  Charts Plugin -->
<script src="js/chartist.min.js"></script>
<script src="js/admin.js"></script>

<!--  Notifications Plugin    -->
<script src="js/bootstrap-notify.js"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<!-- <script src="js/demo.js"></script> -->

</body>

</html>

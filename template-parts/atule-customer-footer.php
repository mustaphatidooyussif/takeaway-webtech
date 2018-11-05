
	<footer >
		<div class="container-fluid">
			<!--Footer code will go here-->
			<div class="pull-right">
				<ul class="nav-list">
					<li><a href="#">BACK TO TOP</a></li>
					<li><a href="#">HELP</a></li>
				</ul>
			</div>

			<a href="#"><i class="fab fa-facebook-f fa-3x"></i></a>
			<a href="#"><i class="fab fa-instagram fa-3x"></i></a>
			<a href="#"><i class="fab fa-linkedin fa-3x"></i></a>

			<p class="h6">
				Take Away Online ordering system
				<a href="#" target="_blank"></a>
			</p>
		</div>
	</footer>

    <!--   Core JS Files   -->
    <script src="js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<!-- <script src="js/chartist.min.js"></script> -->

    <!--  Notifications Plugin    -->
    <script src="js/bootstrap-notify.js"></script>
	<script src="http://malsup.github.com/jquery.form.js"></script> 

	<!-- alert confirmation before user sends order -->
	<script>
		$('#modal-dialog').on('show', function() {
			var link = $(this).data('link'),
				confirmBtn = $(this).find('.confirm');
		})

		$('#btnYes').click(function() {
		// submit form
			$('#submit_order_form').submit();
		
		});
	</script>
	<!-- notification -->
	<script type="text/javascript" >
				$(document).ready(function(){
					$.notify({
						icon: 'pe-7s-gift',
						message: "Welcome to <b>Food Menu</b> - select food to order."
					},{
						type: 'info',
						timer: 4000
					});
				});
	</script>

	<!-- ajax for live search -->

		<script>
			$(document).ready(function(){
				load_data();
				function load_data(query)
				{
					$.ajax({
						url:"live-search.php",
						method:"post",
						data:{query:query},
						success:function(data)
						{
							$('#result').html(data);
						}
					});
				}
				
				$('#search_text').keyup(function(){
					var search = $(this).val();
					if(search != '')
					{
						load_data(search);
					}
					else
					{
						load_data();			
					}
				});
			});
	</script>

	<!-- email sent notification -->
	<?php
		if(isset($_SESSION['status'])){
			if($_SESSION['status'] == 'success'){ ?>
				<!-- javascript -->
				<script>
					$.notify({
						icon: 'pe-7s-gift',
						message: "<b>Email Sent!</b> - your order has been sent to your email."

					},{
						type: 'info',
						timer: 4000
					});
				</script>
	<?php 
			// unset session
			unset($_SESSION['status']);
		} }?>
			
</body>
</html>

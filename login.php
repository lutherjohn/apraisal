
<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='<?php echo base_url(). "Admin/bower_components/bootstrap/dist/css/bootstrap.min.css" ?>' rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href='<?php echo base_url(). "Admin/bower_components/metisMenu/dist/metisMenu.min.css" ?>' rel="stylesheet">
	<link href = '<?php echo base_url(). "Admin/css/sb-admin-2.css" ?>' rel="stylesheet">

	 <!-- Custom Fonts -->
    <link href='<?php echo base_url(). "Admin/bower_components/font-awesome/css/font-awesome.min.css" ?>' rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->	 
	<title>Appraisal System</title>
	<style type="text/css">
		#box-2 {
			width: 150px;
			position: relative;
			right: -14em;
		}
	</style>
</head>
<body>

<br />
<br />
<br />
<br />

<div id="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
                    <h3 class="panel-title">Log in Panel</h3>
                </div>
                <div class="panel-body">                	
                		<fieldset>
                			<?php
					
								echo form_open('Mainx/login_validation');
								
								echo validation_errors();

								echo "<div class='form-group'>Username:";
								echo form_input('username');
								echo "</div>";
								
								echo "<div class='form-group'>Password:";
								echo form_password('password');
								echo "</div>";
								
								echo "<div id = 'box-2'>";
								echo form_submit('login_submit', 'Login');
								echo "</div>";
								
								echo form_close();
							
							?>
                		</fieldset>	                	
						
                </div>
			</div>
				<footer>
					<p>Desmark Corporation &copy; 2016</p>
				</footer>
		</div>		
	</div>
</div>


<!-- jQuery -->
    <script src='<?php echo base_url() ."Admin/bower_components/jquery/dist/jquery.min.js" ?>' ></script>

    <!-- Bootstrap Core JavaScript -->
    <script src='<?php echo base_url() ."Admin/bower_components/bootstrap/dist/js/bootstrap.min.js" ?>' ></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src='<?php echo base_url() ."Admin/bower_components/metisMenu/dist/metisMenu.min.js" ?>'></script>

    <!-- Custom Theme JavaScript -->
    <script src='<?php echo base_url() ."Admin/dist/js/sb-admin-2.js" ?>'></script>

    <!-- Bootstrap Core JavaScript -->


</body>
</html>
<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='<?php echo base_url(). "Admin/bower_components/bootstrap/dist/css/bootstrap.min.css" ?>' rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href='<?php echo base_url(). "Admin/bower_components/metisMenu/dist/metisMenu.min.css" ?>' rel="stylesheet">
    <!-- Timeline CSS -->
    <link href='<?php echo base_url() ."Admin/dist/css/timeline.css" ?>' rel="stylesheet">

	<link href = '<?php echo base_url(). "Admin/dist/css/sb-admin-2.css" ?>' rel="stylesheet">

	 <!-- Morris Charts CSS -->
    <link href='<?php echo base_url(). "Admin/bower_components/morrisjs/morris.css" ?>' rel="stylesheet">

	 <!-- Custom Fonts -->
    <link href='<?php echo base_url(). "Admin/bower_components/font-awesome/css/font-awesome.min.css" ?>' rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<title>Appraisal System | Employee</title>

</head>
<body>
<?php 
$logged_in = '';
$logged_in = $this->session->userdata('username');

$fname = '';
$midname = '';
$lastname = '';

$sql = $this->db->select("*")->from("tb_employee")->where("username",$logged_in)->get();
foreach($sql->result() as $r){
    $fname = $r->firstname;
    $midname = $r->mi;
    $lastname = $r->lastname;
}
?>
<div id="wrapper">
	

	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>            
           
        </div>
        <!-- /.navbar-header -->
        
        <ul class="nav navbar-top-links navbar-right">       
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-steam-square fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                                                                    
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> <?php echo $lastname . ','. $midname . ' ' . $fname; ?></a>
                                                                    
                    </li>
                    <li><a href='<?php echo base_url() ."mainx/change_password" ?>'><i class="fa fa-gear fa-fw"></i> Change Password</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href = '<?php echo base_url(). "mainx/logout" ?>' ><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href='<?php echo base_url(). "mainx/admin" ?>'><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href='#'><i class="fa fa-sliders fa-fw"></i> Maintenance<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                             <li>
                                <a href='<?php echo base_url() ."mainx/index2" ?>'><i class="fa fa-bar-chart-o fa-fw"></i>Branch</a>                 
                             </li>

                            <li>
                                <a href='<?php echo base_url(). "mainx/employee_pagination" ?>'><i class="fa fa-table fa-fw"></i> Employee</a>
                            </li>

                            <li>
                                <a href='<?php echo base_url(). "mainx/designation_pagination" ?>'><i class="fa fa-list-alt"></i> Designation</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href='#'><i class="fa fa-tasks fa-fw"></i> Task<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                             <li>
                                <a href=<?php echo base_url() . "mainx/employee_evaluate" ?> ><i class="fa fa-th-list fa-fw"></i>Evaluation</a>
                                <a href=<?php echo base_url() . "mainx/question_form" ?> ><i class="fa fa-th-list fa-fw"></i> Question</a>
                                <a href=<?php echo base_url() . "mainx/templates_form" ?> ><i class="fa fa-th-list fa-fw"></i>Templates</a>
                            </li>                              
                        </ul>
                    </li> 

                    <li>
                        <a href='#'><i class="fa fa-eye fa-fw"></i> Reports</a>
                    </li>                      
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
	<div id="page-wrapper">	
		<h1>Employee Profile</h1>


		
		<div class="table-responsive">
			<table class="table table-hover">



			<?php foreach($single_employee as $emp):?>
				<tr>
					<td>Employee Id: <?php echo $emp->employee_id;?></td>
					<td>Username: <?php echo $emp->username;?></td>
				</tr>

				<tr>
					<td>Lastname: <?php echo $emp->lastname;?></td>
					<td>Firstname: <?php echo $emp->firstname;?></td>
					<td>Middle Initial<?php echo $emp->mi;?></td>
				</tr>

				<tr>
					<td>Address1: <?php echo $emp->address1;?></td>
					<td>Address2: <?php echo $emp->address2;?></td>
					<td>&nbsp;</td>
				</tr>

				<tr>
					<td>Gender: <?php echo $emp->gender;?></td>
					<td>Birthdate:<?php echo $emp->birthdate;?></td>
					<td>&nbsp;</td>
				</tr>

				<tr>
					<td>Civil Status:  <?php echo $emp->civil_status;?></td>
					<td>Email Address: <?php echo $emp->emailadd;?></td>
					<td>&nbsp;</td>
				</tr>

			<?php endforeach;?>
				<tr>
					<td></td>
				</tr>

			</table>

			<div class="panel-body">
			    <!-- Button trigger modal -->
			    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
			        Additional info
			    </button>
			    <!-- Modal -->
			    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			        <div class="modal-dialog">
			            <div class="modal-content">
			                <div class="modal-header">
			                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                    <h4 class="modal-title" id="myModalLabel">Additional Information</h4>
			                </div>
			                <div class="modal-body">         
			                   

			                    <?php
	
									echo form_open('Mainx/employee_info_id');
									
									echo validation_errors();
									
									$emp_id = '';
									foreach($single_employee as $emp):
									$emp_id = $emp->employee_id;
									endforeach;
									echo "<p>";
									
									echo form_hidden('employee_id', $emp_id );
									
									echo "</p>";

									echo "<p>FatherName:";
									echo form_input('employee_fname');
									echo "</p>";

									echo "<p>MotherName:";
									echo form_input('employee_mname');
									echo "</p>";

									echo "<p>Contact Person:";
									echo form_input('contact_person');
									echo "</p>";							        

									echo "<p>Contact Number:";
									echo form_input('cnumber');
									echo "</p>";

									echo "<p>SSS:";
									echo form_input('employee_sss');
									echo "</p>";

									echo "<p>Philhealth:";
									echo form_input('employee_philhealth');
									echo "</p>";

									echo "<p>TIN:";
									echo form_input('employee_tin');
									echo "</p>";

																		
									echo "<p>";
									echo form_submit('submit', 'Submit');
									echo "</p>";
									
									echo form_close();
								
								
								?>
			                </div>
			                <div class="modal-footer">
			                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			                </div>
			            </div>
			            <!-- /.modal-content -->
			        </div>
			        <!-- /.modal-dialog -->
			    </div>
			    <!-- /.modal -->
			</div>


			<h1>Employee additional info</h1>
			<table class="table table-hover">

			<?php $sql = $this->db->select("*")->from("tb_emp_info")->where("employee_id",$emp_id)->get();
			//foreach($sql->result() as $my_info){ 
			if($sql->num_rows() == 1){
			?>

			<?php foreach($sql->result() as $rows):?>
				<tr>
					<td>Father Name: <?php echo $rows->fathername;?></td>
				</tr>

				<tr>
					<td>Mother Name: <?php echo $rows->mothername;?></td>
					<td>Contact Person: <?php echo $rows->contact_person;?></td>
					<td>Contact Number: <?php echo $rows->contact_number;?></td>
				</tr>

				<tr>
					<td>SSS #: <?php echo $rows->SSS;?></td>
					<td>Philhealth: <?php echo $rows->PhilHealth;?></td>
					<td>&nbsp;</td>
				</tr>

				<tr>
					<td>TIN #: <?php echo $rows->TIN;?></td>
					<td>&nbsp;</td>
				</tr>
			<?php endforeach;?>
				<tr>
					<td></td>
				</tr>
			<?php }else{ echo 'no data for now...';}?>
			</table>
		</div>
			

		
	</div>

	<footer>
		<p>Desmark Corporation</p>
	</footer>

</div>
  	<script src='<?php echo base_url() ."Admin/bower_components/jquery/dist/jquery.min.js" ?>' ></script>

    <!-- Bootstrap Core JavaScript -->
    <script src='<?php echo base_url() ."Admin/bower_components/bootstrap/dist/js/bootstrap.min.js" ?>' ></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src='<?php echo base_url() ."Admin/bower_components/metisMenu/dist/metisMenu.min.js" ?>'></script>

    <!-- Morris Charts JavaScript -->
    <script src='<?php echo base_url() ."Admin/bower_components/raphael/raphael-min.js" ?>' ></script>
    <script src='<?php echo base_url() ."Admin/bower_components/morrisjs/morris.min.js" ?>'></script>
    <script src='<?php echo base_url() ."Admin/js/morris-data.js" ?>' ></script>

    <!-- Custom Theme JavaScript -->
    <script src='<?php echo base_url() ."Admin/dist/js/sb-admin-2.js" ?>'></script>
</body>
</html>

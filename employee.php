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
                                <a href="#"><i class="fa fa-th-list fa-fw"></i>Evaluation<span class="fa arrow"></span></a>                 
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href='#' > &nbsp;</a>
                                    </li>
                                    <li>
                                        <a href='#'>&nbsp;</a>
                                    </li>
                                </ul>
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

			<!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Employee
                        </div>
                        <!-- /.panel-heading -->
                        <?php if( $this->session->flashdata("notification") ){
                                echo "<script type='text/javascript'> alert(\"".$this->session->flashdata("notification")."\"); </script>";
                                }
                        ?>
                        <div class="panel-body">
                            <div class="table-responsive">
                            	<?php
	
									echo form_open('Mainx/employee_validation');
									
									echo validation_errors();
									
									
									echo "<p>Employee Code:";
									echo form_input('employee_id');
									echo "</p>";

									echo "<p>Username:";
									echo form_input('username');
									echo "</p>";

									echo "<p>Password:";
									echo form_password('password');
									echo "</p>";

									echo "<p>Confirm Password:";
									echo form_password('cpassword');
									echo "</p>";

									echo "<p>LastName:";
									echo form_input('lname');
									echo "</p>";

									echo "<p>FirstName:";
									echo form_input('fname');
									echo "</p>";

									echo "<p>MiddleName:";
									echo form_input('mname');
									echo "</p>";

									echo "<p>Address 1:";
									echo form_input('address1');
									echo "</p>";

									echo "<p>Address 2:";
									echo form_input('address2');
									echo "</p>";

									$gender = array(
										'#' => '&larr; Select Gender &rarr;',
										'Male' => 'Male',
										'Female' => 'Female'
									 );

									echo "<p>Gender:";
									echo form_dropdown('gender', $gender, '', 'Options');
									echo "</p>";

									$months = array(
									"choose"=>"Month",
									"Jan"=>"Jan",
									"Feb"=>"Feb",
									"Mar"=>"Mar",
									"Apr"=>"Apr",
									"May"=>"May",
									"Jun"=>"Jun",
									"Jul"=>"Jul",
									"Aug"=>"Aug",
									"Sep"=>"Sep",
									"Oct"=>"Oct",
									"Nov"=>"Nov",
									"Dec"=>"Dec"
									);

									$days = array(
							        "choose"=>"Day",
							        "1"=>"1",
							        "2"=>"2",
							        "3"=>"3",
							        "4"=>"4",
							        "5"=>"5",
							        "6"=>"6",
							        "7"=>"7",
							        "8"=>"8",
							        "9"=>"9",
							        "10"=>"10",
							        "11"=>"11",
							        "12"=>"12",
							        "13"=>"13",
							        "14"=>"14",
							        "15"=>"15",
							        "16"=>"16",
							        "17"=>"17",
							        "18"=>"18",
							        "19"=>"19",
							        "20"=>"20",
							        "21"=>"21",
							        "22"=>"22",
							        "23"=>"23",
							        "24"=>"24",
							        "25"=>"25",
							        "26"=>"26",
							        "27"=>"27",
							        "28"=>"28",
							        "29"=>"29",
							        "30"=>"30",
							        "31"=>"31"
							        );

							        

									echo "<p>Months:";
									echo form_dropdown('months', $months, '', 'Options');
									echo "</p>";

									echo "<p>Days:";
									echo form_dropdown('days', $days, '', 'Options');
									echo "</p>";


									echo "Years: &nbsp; <select name = 'year'>";

									$date = '';
									$date = date("Y");

									for ($i=$date; $i > 1900;$i--) { 
									echo "<option value = ".$i.">" .$i. "</option>";
									}

									echo "</select>";


									//echo "<p>Years:";
									//echo form_input('year');
									//echo "</p>";
									

									$civil_status = array(
										'#' => '&larr; Select Status &rarr;',
										'Single' => 'Single',
										'Married' => 'Married' ,
										'Divorced' =>'Divorced',
										'Widow' => 'Widow'
									);

									echo "<p>Civil Status";
									echo form_dropdown('civil_status', $civil_status);
									echo "</p>";

									echo "<p>Email Address:";
									echo form_input('bemail');
									echo "</p>";

									$admin = '';
									$evaluator ='';
									$user = '';

									$sql = $this->db->select("*")->from("tbl_userlevel")->get();

									foreach($sql->result() as $r){

										$id = $r->userlevel_id;
										$userlevel1 = $r->userlevel;
									}

									$userlevel = array(
										'#' => '&larr; Select UserLevel &rarr;',
										'1' => 'Admin',
										'2' =>'Evaluator',
										'3' => 'User'
									);

									echo "<p>UserLevel";
									echo form_dropdown('userlevel', $userlevel);
									echo "</p>";

									
									echo "<p>";
									echo form_submit('submit', 'Submit');
									echo "</p>";
									
									echo form_close();
								
								
								?>
                              
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
               
                <!-- /.col-lg-6 -->
            </div>
	<footer>
		<p>Desmark Corporation</p>
	</footer>


</div>

<!-- /#wrapper -->

    <!-- jQuery -->
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

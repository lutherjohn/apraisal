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
	<title>Appraisal System | Change Password</title>

</head>
<body>
<?php 
$logged_in = '';
$logged_in = $this->session->userdata('username');

$fname = '';
$midname = '';
$lastname = '';
$count_emp = '';
$count_br = '';
$user_id = '';
$emp_id = '';

$sql = $this->db->select("*")->from("tb_employee")->where("username",$logged_in)->get();
foreach($sql->result() as $r){
    $emp_id = $r->employee_id;
    $fname = $r->firstname;
    $midname = $r->mi;
    $lastname = $r->lastname;
}
$employee_count = $this->db->select("*")->from("tb_employee")->get();
$count_emp = $employee_count->num_rows();

$branch_count = $this->db->select("*")->from("tb_branch")->get();
$count_br = $branch_count->num_rows();

$sql2 = $this->db->select("username, user_level")->from("tb_account")->where("username", $logged_in)->get();
foreach($sql2->result() as $user_level){

    $user_id = $user_level->user_level;

}

$stmt = $this->db->select("*")->from("tb_message")->where("mess_recepient", $logged_in)->get();
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
                    <i class="fa fa-envelope fa-fw"></i><i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                    <?php foreach($stmt->result() as $msg):?>
                        <?php $s = $this->db->select("lastname, firstname,mi")->from("tb_employee")->where("employee_id",$msg->sender)->get(); ?>
                                    
                        <a href=<?php echo base_url() ."mainx/show_msg_id/". $msg->msg_id; ?>  >  
                                   <?php foreach($s->result() as $t):?>               
                            <div>
                                <strong><?php echo $t->lastname . ' ' . $t->firstname;?></strong>                            
                                <span class="pull-right text-muted">
                                    <em><?php echo date('m/d/Y H:i:s' ,$msg->timestamp); ?></em>
                                </span>
                            </div>
                            <div><?php echo $msg->message;?></div>
                        </a>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                    </li>                  
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href='<?php echo base_url() ."mainx/message" ?>'>
                            <strong>Read All Messages</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                    <!-- /.dropdown-messages -->
                </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>                    
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                <span class="pull-right text-muted small">12 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> Message Sent
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-tasks fa-fw"></i> New Task
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-steam-square fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> <?php echo $lastname . ','. $midname . ' ' . $fname; ?></a></li>
                    <li><a href='<?php echo base_url() ."mainx/change_password" ?>'><i class="fa fa-gear fa-fw"></i> Change Password</a></li>
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
                                <a href=<?php echo base_url() . "mainx/evaluation" ?> ><i class="fa fa-th-list fa-fw"></i>Evaluation</a>
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
                           Change Password
                        </div>
                        <!-- /.panel-heading -->
                        <?php if( $this->session->flashdata("notification") ){
                                echo "<script type='text/javascript'> alert(\"".$this->session->flashdata("notification")."\"); </script>";
                                }
                        ?>
                        <div class="panel-body">
                            <div class="table-responsive">
                            	<?php
	
									echo form_open('Mainx/password_validation');

									
									echo validation_errors();
									
									
									echo "<p>Current Password:";
									echo form_password('c_password');
									echo "</p>";

									echo "<p>New Password:";
									echo form_password('n_password');
									echo "</p>";

									echo "<p>Confirm Password:";
									echo form_password('r_password');
									echo "</p>";
									
									echo "<p>";
									echo form_submit('submit', 'Update Password');
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

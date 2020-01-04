<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='<?php echo base_url() ."Admin/bower_components/bootstrap/dist/css/bootstrap.min.css" ?>' rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href='<?php echo base_url() ."Admin/bower_components/metisMenu/dist/metisMenu.min.css" ?>' rel="stylesheet">

	<link href='<?php echo base_url() ."Admin/dist/css/sb-admin-2.css" ?>' rel="stylesheet">

	
    <!-- DataTables CSS -->
    <link href='<?php echo base_url() ."Admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" ?>' rel="stylesheet">

     <!-- DataTables Responsive CSS -->
    <link href='<?php echo base_url() ."Admin/bower_components/datatables-responsive/css/dataTables.responsive.css" ?>' rel="stylesheet">

	 <!-- Custom Fonts -->
    <link href='<?php echo base_url() ."Admin/bower_components/font-awesome/css/font-awesome.min.css" ?>' rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<title>Admin Page | Update Branch</title>

</head>
<body>

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
                <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-messages">
                <li>
                    <a href="#">
                        <div>
                            <strong>John Smith</strong>
                            <span class="pull-right text-muted">
                                <em>Yesterday</em>
                            </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <strong>John Smith</strong>
                            <span class="pull-right text-muted">
                                <em>Yesterday</em>
                            </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <strong>John Smith</strong>
                            <span class="pull-right text-muted">
                                <em>Yesterday</em>
                            </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
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
                                <a href="#"><i class="fa fa-list-alt"></i> Designation<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href='<?php echo base_url(). "mainx/designation" ?>' > Add designation</a>
                                    </li>
                                    <li>
                                        <a href='#'>View Designation</a>
                                    </li>
                                </ul>
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
	<h1>Employee Edit</h1>
    <?php
        if($this->session->flashdata('key') == true) {
        $messenger = $this->session->flashdata('key');
        ?>
            <div class="alert alert-success" id=<?php echo $messenger['id']; ?> ><?php echo $messenger['messenger']; ?></div>
        <?php
        }
    ?> 
	
	

</div>

</div>


<footer>
	<p>Desmark Corporation</p>
</footer>

<!-- /#wrapper -->

    <script src='<?php echo base_url() ."Admin/bower_components/jquery/dist/jquery.min.js" ?>' ></script>

    <!-- Bootstrap Core JavaScript -->
    <script src='<?php echo base_url() ."Admin/bower_components/bootstrap/dist/js/bootstrap.min.js" ?>' ></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src='<?php echo base_url() ."Admin/bower_components/metisMenu/dist/metisMenu.min.js" ?>'></script>

    <!-- Custom Theme JavaScript -->
    <script src='<?php echo base_url() ."Admin/dist/js/sb-admin-2.js" ?>'></script>

     <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

     <!-- Page-Level Demo Scripts - Notifications - Use for reference -->
    <script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

    // popover demo
    $("[data-toggle=popover]")
        .popover()
    </script>
</body>
</html>
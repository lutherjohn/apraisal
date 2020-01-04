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


$sql2 = $this->db->select("username, user_level")->from("tb_account")->where("username", $logged_in)->get();
foreach($sql2->result() as $user_level){

    $user_id = $user_level->user_level;

}

$stmt = $this->db->select("*")->from("tb_message")->where("mess_recepient", $logged_in)->get();
?>
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
                    </ul>
                </li>

                <li>
                    <a href='#'><i class="fa fa-tasks fa-fw"></i> Task<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                         <li>
                            <a href=<?php echo base_url() . "mainx/employee_evaluate" ?> ><i class="fa fa-th-list fa-fw"></i>Evaluation</a>
                            <a href=<?php echo base_url() . "mainx/question_form" ?> ><i class="fa fa-th-list fa-fw"></i> Question</a>
                            <a href=<?php echo base_url() . "mainx/templates_form" ?> ><i class="fa fa-th-list fa-fw"></i>Templates</a>
                            <a href=<?php echo base_url() . "mainx/designation_pagination" ?> ><i class="fa fa-list-alt"></i> Designation</a>
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
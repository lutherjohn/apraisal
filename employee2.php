<div id="wrapper">
    <div id="page-wrapper">
    <br />

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
               <button type="button" data-toggle="modal" href="<?php echo base_url() ."mainx/load_new_employee_modal"; ?>" data-target="#employee_modal" class="btn btn-primary btn-sm">
               New Employee
               </button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="employee_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                </div>
            </div>
        </div> 
        <!-- /.modal -->

        <br>

        <div class="row">
            <div class="col-md-8 col-md-offset-2 well">
            <?php 
            $attr = array("class" => "form-horizontal", "role" => "form", "id" => "form1", "name" => "form1");
            echo form_open("Mainx/search_employee", $attr);?>
            <div class="form-group">
                <div class="col-md-6">
                    <input class="form-control" id="ecode" name="ecode" placeholder="Search for Employee Code..." type="text" value="<?php echo set_value('ecode'); ?>" />
                </div>
                <div class="col-md-6">
                    <input id="btn_search" name="btn_search" type="submit" class="btn btn-info" value="Search" />
                    <a href="<?php echo base_url(). "/Mainx/index2"; ?>" class="btn btn-danger">Show All</a>
                </div>
            </div>
            <?php echo form_close(); ?>
                
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Employee Code</th>
                            <th>Username</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($ecode); ++$i) { ?>
                         <tr data-toggle="modal" href="<?php echo base_url() ."mainx/load_employee_modal/".$ecode[$i]->employee_id; ?>" data-target="#myModal" style = "cursor:pointer">
                            <td><?php echo ($page+$i+1); ?></td>
                            <td><?php echo $ecode[$i]->employee_id; ?></td>
                            <td><?php echo $ecode[$i]->username; ?></td>
                            <td><?php echo $ecode[$i]->lastname .', &nbsp;'. $ecode[$i]->firstname .' &nbsp;'. $ecode[$i]->mi; ?></td>
                        </tr>
                        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
                        <script type="text/javascript">
                           $(document).ready(function(){
                              $('body').on('hidden.bs.modal', '.modal', function () {
                                $(this).removeData('bs.modal');
                                $("#" + $(this).attr("id") + " .modal-content").empty();
                                $("#" + $(this).attr("id") + " .modal-content").append("Loading...");
                              });
                            });
                        </script> 
                        <?php } ?>                  
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?php echo $pagination; ?>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                </div>
            </div>
        </div>



    </div>
</div>


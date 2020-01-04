<div id="wrapper">
    <div id="page-wrapper">
    <br />



        <div class="row">
            <div class="col-md-8 col-md-offset-2">
               <button type="button" data-toggle="modal" href="<?php echo base_url() ."mainx/designation"; ?>" data-target="#myModal" class="btn btn-primary btn-sm">
                   New designation
               </button> 
            </div>
        </div>

       
        <br />

        <div class="row">
            <div class="col-md-8 col-md-offset-2 well">
                <?php 
                $attr = array("class" => "form-horizontal", "role" => "form", "id" => "form1", "name" => "form1");
                echo form_open("Mainx/search_designation", $attr);?>
                    <div class="form-group">
                        <div class="col-md-6">
                            <input class="form-control" id="ecode" name="dcode" placeholder="Search for Designation Code..." type="text" value="<?php echo set_value('dcode'); ?>" />
                        </div>
                        <div class="col-md-6">
                            <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search" />
                            <a href="<?php echo base_url(). "/Mainx/designation_pagination"; ?>" class="btn btn-primary">Show All</a>
                        </div>
                    </div>
                <?php echo form_close(); ?>                    
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Designation Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($dcode); ++$i) { ?>
                        <tr data-toggle="modal" href="<?php echo base_url() ."mainx/designation_modal/".$dcode[$i]->designation_id; ?>" data-target="#designation_modal" style="cursor: pointer">
                            <td><?php echo ($page+$i+1); ?></td>
                            <td><?php echo $dcode[$i]->designation_name; ?></td>
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
            <div class="modal fade" id="designation_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    </div> <!-- /.modal-content -->
                </div> <!-- /.modal-dialog -->
            </div> 
            <!-- /.modal -->


             <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    </div> <!-- /.modal-content -->
                </div> <!-- /.modal-dialog -->
            </div> 
            <!-- /.modal -->
    </div> 
</div>

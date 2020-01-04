<div id="wrapper">
    <div id="page-wrapper">
    <br />
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
               <button type="button" data-toggle="modal" href="<?php echo base_url() ."mainx/load_modal"; ?>" data-target="#branch_modal" class="btn btn-primary btn-sm">
               New Branch
               </button>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="branch_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                </div> <!-- /.modal-content -->
            </div> <!-- /.modal-dialog -->
        </div> 
        <!-- /.modal -->

        <br />  


        <div class="row">
            <div class="col-md-8 col-md-offset-2 well">
                <?php 
                $attr = array("class" => "form-horizontal", "role" => "form", "id" => "form1", "name" => "form1");
                echo form_open("Mainx/search", $attr);?>
                    <div class="form-group">
                        <div class="col-md-6">
                            <input class="form-control" id="bcode" name="bcode" placeholder="Search for Branch Code..." type="text" value="<?php echo set_value('bcode'); ?>" />
                        </div>
                        <div class="col-md-6">
                            <input id="btn_search" name="btn_search" type="submit" class="btn btn-info" value="Search" />
                            <a href="<?php echo base_url(). "/Mainx/index2"; ?>" class="btn btn-danger">Show All</a>
                        </div>
                    </div>
                <?php echo form_close(); ?>



            <!---->
            <table class="table table-striped table-hover" id="load_modal_branch">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Branch Code</th>
                        <th>Branch Name</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($bcode)){
                                for ($i = 0; $i < count($bcode); ++$i) {
                    ?>
                    
                    <tr data-toggle="modal" href="<?php echo base_url() ."mainx/load_edit_modal/".$bcode[$i]->branch_id; ?>" data-target="#myModal" style = "cursor:pointer">
                        <td>                       
                            <?php echo ($page+$i+1); ?>
                        </td>
                        <td>     
                            <?php echo $bcode[$i]->branch_id; ?>
                        </td>
                        <td>
                            <?php echo $bcode[$i]->branch_name; ?>
                        </td>
                        <td>
                            <?php echo $bcode[$i]->address; ?>                       
                        </td>                  
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
        <?php } ?>

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

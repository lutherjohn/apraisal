<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Designation Modal</h4>
</div>      <!-- /modal-header -->
<div class="modal-body">
<script type="text/javascript">

    $(document).ready(function(){
      $('.edit').click(function(){
        $(this).hide();
        $('input[type="submit"]').show();
        $('.control-label').show();

        $( '.text_label' ).each(function(){
          $(this).hide();
          $(this).prev().hide();
          $(this).next().show();
          //$(this).next().select();                  
        });
      });

    });

</script>

<style type="text/css">
  input[type=text], input[type=submit]{
    margin-top:8px;
    font-size:14px;
    color:#545454;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    -border-radius: 2px;
    display:none;
    width:180px;
  }
  select{
    display: none;
  }

  /**
  .control-label{
    display: none;
  }
  **/

  label{
    display:block;
    margin-top:8px;
    font-size:14px;
    color:#545454;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    -border-radius: 2px;
  }

  .edit{
    float:left;
    margin-right: 22px;
    width:52px;
    height:32px;
    display:block;
    cursor: pointer;
    background: #337ab7;
    border: 2px solid rgba(33, 68, 72, 0.59);
    text-align: center;
  }
</style>


<div id="show_phase">
    


</div>


<div id = "edit_phase">

    <?php

        echo form_open('Mainx/update_designation');
        
        foreach($single_designation as $des):
            $designation_id = $des->designation_id;
    ?>
    <div class="row">
        <div class="col-md-3 col-md-offset-3">
            <div class="control-group">
                <label class="control-label" for="Designation Code">Designation Code:</label>
                <div class="controls">
                    <label class="text_label"><?php echo $designation_id; ?></label>    
                    <input type="text" id="Designation Code" name = "update_dcode" value="<?php echo $designation_id; ?>" />
                </div>
            </div>


            <div class="control-group">
                <label class="control-label" for="Designation Name">Designation Name:</label>
                <div class="controls">
                    <label class="text_label"><?php echo $des->designation_name; ?></label> 
                    <input type="text" id="Designation Name" name = "update_dcname" value="<?php echo $des->designation_name; ?>" />
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="Description">Description:</label>
                <div class="controls">
                    <label class="text_label"><?php echo $des->description; ?></label> 
                    <input type="text" id="Description" name = "update_description" value="<?php echo $des->description; ?>" />
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <input type="submit" name = "submit" value="Update" class="btn btn-primary btn-sm" />
                <?php endforeach; ?>   

                    <?php 
                        echo form_close();
                    ?>

                    <?php echo form_open('Mainx/delete_designation'); ?>
                        <input type="hidden" name = "id" value="<?php echo $designation_id; ?>">
                        <input type="submit" name = "delete_btn" value="Delete" class="btn btn-danger btn-sm" />
                    <?php echo form_close(); ?>

                </div>
            </div>
        </div>
    </div>
    
    
</div>
    
</div>      <!-- /modal-body -->
<div class="modal-footer">
    <div class="edit">Edit</div>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>      <!-- /modal-footer -->
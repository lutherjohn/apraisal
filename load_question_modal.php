<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title">Edit Question Form Modal</h4>
  </div>      <!-- /modal-header -->
  <div class="modal-body">

    <div class = "row">
        <div class="col-md-4 col-md-offset-3">
            <?php echo form_open('Mainx/update_question_2');?>  

                <?php 
                        foreach($question_description as $row):
                ?>

            <div class="control-group">
            <label class="control-label" for="Branch Code">Question description:</label>
                <div class="controls">
                <input type="hidden" name="update_id" value=<?php echo $row->id; ?> />
                <textarea name="question_description" class="form-control" rows="6" ><?php echo $row->question_description; ?> </textarea>
                </div>
            </div>
            <br />
            <div class="control-group">
                <div class="controls">
                <input type="submit" name = "edit_btn" value="Update" class="btn btn-primary btn-sm" />
                </div>
            </div>

            
                <?php endforeach; ?>
            <?php echo form_close();?>
            
        </div>

        
        
    </div>
            
             
    </div>      <!-- /modal-body -->
  <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>      <!-- /modal-footer -->
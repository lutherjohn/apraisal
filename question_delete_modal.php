<div class="modal-header s-example-modal-sm" aria-labelledby="mySmallModalLabel">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">Delete Modal</h4>
</div>      <!-- /modal-header -->
<div class="modal-body">
  <?php echo form_open("Mainx/delete_question"); ?>
	  <?php foreach($question_description as $row):?>
	  <p>Are you sure that you want to delete this question?</p> 
	  <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
	  <input type="hidden" name="delete_id" value="<?php echo $row->id; ?>" />
	  <input type="submit" name = "delete_btn" value = "Yes" class="btn btn-danger btn-sm" />
	  <?php endforeach; ?>
  <?php echo form_close(); ?>

</div>
	<div class="modal-footer">
</div>
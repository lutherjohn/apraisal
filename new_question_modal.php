<div class="modal-header s-example-modal-sm" aria-labelledby="mySmallModalLabel">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title">New Question Modal</h4>
  </div>      <!-- /modal-header -->
<script type="text/javascript">

function q_header() {

  var question = document.getElementById('question').value;

  $.ajax({
     url: "<?php echo base_url('Mainx/insert_question_header');?>",
     type: "post",
     data: {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',"question":question},
     success: function(){
       document.getElementById("ack").innerHTML= 'success';
       window.location.href = "<?php echo base_url('Mainx/question_form');?>";
     },
     error:function(){
       document.getElementById("ack").innerHTML= 'failed';
     }
  });

}
  
  
</script>
  <div class="modal-body">
  <form action = "" method="post">     

  <div>
      <label>Question Header:</label> <input type="text" name="question" id="question"/>
      <input type="button" name="submit" id="submit" class="btn btn-primary btn-xm" value="save" onclick="q_header()" />
      <br />
      <div id="ack"></div>
  </div>
  </form>

  </div>      <!-- /modal-body -->
  <div class="modal-footer">
</div>      <!-- /modal-footer -->
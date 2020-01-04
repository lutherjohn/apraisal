<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title">Branch Modal</h4>
  </div>      <!-- /modal-header -->

  <script type="text/javascript">
    $(document).ready(function(){
      $('.edit').click(function(){
        $(this).hide();
        $('input[type="submit"]').show();
        $('.control-label').show();
        $('#del_btn').hide();

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
      input[type=text], input[type=submit][name = 'edit_btn']{
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
        display:inline;
        cursor: pointer;
        background: #337ab7;
        border: 2px solid rgba(33, 68, 72, 0.59);
        text-align: center;
      }

      #del_btn{
        float: left;
      }
    </style>
  

    <div class="modal-body">
      <center>

        <?php echo form_open('Mainx/update_branch'); ?>


       <?php

        foreach($single_branch as $r){

          $br_id = $r->branch_id;

        ?>
      

      <div class="control-group">
        <label class="control-label" for="Branch Code">Branch Code:</label>
        <div class="controls">
          <label class="text_label"><?php echo $br_id; ?></label>    
          <input type="text" id="Branch Code" name = "update_bcode" value="<?php echo $br_id; ?>" />
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="Branch Name">Branch Name:</label>
        <div class="controls">
        <label class="text_label"><?php echo $r->branch_name; ?></label> 
          <input type="text" id="Branch Name" name = "update_bname" value="<?php echo $r->branch_name; ?>" />
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="Branch Address">Branch Address:</label>
        <div class="controls">
        <label class="text_label"><?php echo $r->address; ?></label> 
          <input type="text" id="Branch Address" name = "update_baddress" value="<?php echo $r->address; ?>" />
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="Area">Area:</label>
        <div class="controls">
        <label class="text_label"><?php echo $r->area; ?></label> 
          <input type="text" id="Area" name = "update_barea" value="<?php echo $r->area; ?>" />
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="Area">Branch type:</label>
        <div class="controls">
          <label class="text_label"><?php echo $r->branch_type; ?></label> 
          <select name="update_btype">
            <option value="<?php echo $r->branch_type; ?> "> <?php echo $r->branch_type; ?></option>
            <option value="Desmark">Desmark</option>
            <option value="Premio">Premio</option>
          </select>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="emailAddress">Email Address:</label>
        <div class="controls">
        <label class="text_label"><?php echo $r->email_address; ?></label> 
          <input type="text" id="emailAddress" name = "update_bemail" value="<?php echo $r->email_address; ?>"  />
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="descriiption">Description:</label>
        <div class="controls">
        <label class="text_label"><?php echo $r->description; ?></label> 
          <input type="text" id="description" name = "update_bdescription" value="<?php echo $r->description; ?>" />
        </div>
      </div>
        

      
      <br />
      

      <div class="control-group">
        <div class="controls">
          <input type="submit" name = "edit_btn" value="Update" class="btn btn-primary btn-sm" />
      <?php 

      }

      ?>

      <?php echo form_close(); ?>
      
        </div>
      </div>  
        
      </center>
              

    </div>      <!-- /modal-body -->
  <div class="modal-footer">
  <div class="edit">Edit</div>

    <?php echo form_open('Mainx/delete_branch'); ?>
      <input type="hidden" name = "id" value="<?php echo $br_id; ?>">
      <input type="submit" name = "delete_btn" value="Delete" id = "del_btn" class="btn btn-danger btn-sm" />
    <?php echo form_close(); ?>

  



  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>      <!-- /modal-footer -->
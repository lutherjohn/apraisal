<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">&nbsp;</h4>
    <script type="text/javascript">
      
      $('#phase2').hide();
      $('#phase3').hide();
      //$('.edit_employee' ).hide();
      $('#Back').hide();
      $('#Back2').hide();
      
      

      $(document).ready(function(){

        $('#edit_employee_btn').click(function(){
          $(this).hide();
          $('input[type="submit"]').show();
          $('.control-label').show();

          $( '.edit_employee' ).each(function(){
            $(this).hide();
            $(this).prev().hide();
            $(this).next().show();
            //$(this).next().select();                  
          });
        });



        $('#Next').click(function(){
          $(this).hide();
          $('#Back').show();
          $('#Back2').hide();
          $('#phase1').hide();
          $('#phase2').show();
          $('#edit_employee_btn').hide();
          $('.edit_employee').hide();
        });

        $('#Back').click(function(){
          $(this).hide();
          $('#Next').show();
          $('#edit_employee_btn').show();
          $('.edit_employee').show();
          $('#phase1').show();
          $('#phase2').hide();
          $('#Back2').hide();
        });


        $('#new_info').click(function(){
          $('#phase2').hide();
          $('#phase3').show();
          $('#Next').hide();
          $('#Back').hide();
          $('#Back2').show();
          $('input[type="submit"]').show();
          $('input[type="reset"]').show();
          $('input[type="text"]').show();
        });

        $('#Back2').click(function(){
          $(this).hide();        
          $('#new_info').show();
          $('input[type="text"]').hide();
          $('input[type="submit"]').hide();
          $('#phase2').show();
          $('#phase3').hide();
          $('#Back').show();
        });
          
      });
    </script>

    <style type="text/css">
        input[type=text], input[type=submit],input[type=reset]{
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

        .edit_employee_btn{
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
</div>      <!-- /modal-header -->
<div class="modal-body">

  <div class="row">
    <div id="phase1">
     <h3 id="status">Employee</h3>
    

      <?php

      echo form_open('Mainx/update_employee');

      echo validation_errors();

      foreach($single_employee as $r):

        $emp_id = $r->employee_id;
      ?>

      <div class="col-md-6">
        <div class="control-group">
        <label class="control-label" for="Employee Code">Employee Code:</label>
        <div class="controls">
          <label class="edit_employee"><?php echo $emp_id; ?></label>
          <input type="text" id="Employee Code" name = "update_employee_id" value="<?php echo $emp_id; ?>" />
        </div>
        </div>


        <div class="control-group">
        <label class="control-label" for="Username">Username:</label>
        <div class="controls">
          <label class="edit_employee"><?php echo $r->username; ?></label>
          <input type="text" id="Username" name = "update_username" value="<?php echo $r->username; ?>" />
        </div>
        </div>

        <div class="control-group">
        <label class="control-label" for="Lastname">Lastname: </label>
        <div class="controls">
          <label class="edit_employee"><?php echo $r->lastname; ?></label>
          <input type="text" id="Lastname" name = "update_lastname" value="<?php echo $r->lastname; ?>" />
        </div>
        </div>

        <div class="control-group">
        <label class="control-label" for="Firstname">Firstname: </label>
        <div class="controls">
          <label class="edit_employee"><?php echo $r->firstname; ?></label>
          <input type="text" id="Lastname" name = "update_firstname" value="<?php echo $r->firstname; ?>" />
        </div>
        </div>

        <div class="control-group">
        <label class="control-label" for="Middle Initial">Middle Initial:</label>
        <div class="controls">
          <label class="edit_employee"><?php echo $r->mi; ?></label>
          <input type="text" id="Middle Initial" name = "update_mi" value="<?php echo $r->mi; ?>" />
        </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="control-group">
        <label class="control-label" for="Address1">Address1: </label>
        <div class="controls">
          <label class="edit_employee"><?php echo $r->address1; ?></label>
          <input type="text" id="Address1" name = "address1" value="<?php echo $r->address1; ?>" />
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="Address2">Address2: </label>
        <div class="controls">
          <label class="edit_employee"><?php echo $r->address2; ?></label>
          <input type="text" id="Address2" name = "address2" value="<?php echo $r->address2; ?>" />
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="Area">Gender:</label>
        <div class="controls">
          <label class="edit_employee"><?php echo $r->gender; ?></label>
          <select name="update_gender">
            <option value="<?php echo $r->gender; ?> "> <?php echo $r->gender; ?></option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="Civil Status">Civil Status:</label>
        <div class="controls">
          <label class="edit_employee"><?php echo $r->civil_status; ?></label>
          <select name="update_cs">
            <option value="<?php echo $r->civil_status; ?> "> <?php echo $r->civil_status; ?></option>
            <option value="single">single</option>
            <option value="married">Married</option>
            <option value="divorced">Divorced</option>
            <option value="widow">Widow</option>
          </select>
        </div>
      </div>


      <div class="control-group">
        <label class="control-label" for="emailaddress">Emaill address:</label>
        <div class="controls">
          <label class="edit_employee"><?php echo $r->emailadd; ?></label>
          <input type="text" id="emailaddress" name = "update_email" value="<?php echo $r->emailadd; ?>" />
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <input type="submit" name = "submit" value="Update" class="btn btn-primary btn-sm" />
        </div>
      </div>
      <?php 
      endforeach;
      echo form_close();
      ?>
        

        <div class = "btn btn-info btn-sm" id="edit_employee_btn">Edit</div>
      </div>
      
  </div>
    
    
  </div>
   
     

  <div id="phase2">
  <h3 id="status">Employee Additional Info</h3>
    <div class="row">
      <div class="col-md-6 col-md-offset-3">

        <?php $sql = $this->db->select("*")->from("tb_emp_info")->where("employee_id",$emp_id)->get();
        //foreach($sql->result() as $my_info){ 
        if($sql->num_rows() == 1){
        ?>

        <?php foreach($sql->result() as $rows):?>

        <div class="control-group">          
          <div class="controls">
            <label class="control-label" for="Fathername"><?php echo $rows->fathername;?></label>
          </div>
        </div>

        <div class="control-group">          
          <div class="controls">
            <label class="control-label" for="Mothername"><?php echo $rows->mothername;?></label>
          </div>
        </div>


        <div class="control-group">          
          <div class="controls">
            <label class="control-label" for="Contact Person"><?php echo $rows->contact_person;?></label>
          </div>
        </div>


        <div class="control-group">          
          <div class="controls">
            <label class="control-label" for="Contact Number"><?php echo $rows->contact_number;?></label>
          </div>
        </div>

        <div class="control-group">          
          <div class="controls">
            <label class="control-label" for="SSS Number"><?php echo $rows->SSS;?></label>
          </div>
        </div>


        <div class="control-group">          
          <div class="controls">
            <label class="control-label" for="Philhealth Number"><?php echo $rows->PhilHealth;?></label>
          </div>
        </div>

        <div class="control-group">          
          <div class="controls">
            <label class="control-label" for="TIN Number"><?php echo $rows->TIN;?></label>
          </div>
        </div>

        <div class="edit">Edit</div>

        <?php endforeach;?>
        <?php 
        }else
            {
        ?>

        <div class="control-group">          
          <div class="controls">
            <p class="bg-info">no data for now</p>
          </div>
        </div>            


        <div class="control-group">          
          <div class="controls">
            <button class="btn btn-info btn-sm" id = "new_info">Add Info</button>
          </div>
        </div>

        <?php 
        }
        ?>
      </div>
    </div>
  
  </div>

  <div id ="phase3">
  <h3 id="status">Additional Info</h3>
    <div class="row">
      <div class="col-md-6 col-md-offset-3">

        <?php
  
        echo form_open('Mainx/employee_info_id');
        
        echo validation_errors();
        
        $emp_id = '';
        foreach($single_employee as $emp):
          $emp_id = $emp->employee_id;
        endforeach;

        ?>
        <div class="control-group">
          <label class="control-label" for="Fathername">Fathername</label>
          <div class="controls">
            <input type="hidden" id="Employee Code" name = "employee_id" value="<?php echo $emp_id; ?>"/>
            <input type="text" id="Fathename" name = "employee_fname" placeholder="Fathername" />
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="Mothername">Mothername</label>
          <div class="controls">
            <input type="text" id="Motherame" name = "employee_mname" placeholder="Fathername" />
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="Contact Person">Contact Person</label>
          <div class="controls">
            <input type="text" id="Contat person" name = "contact_person" placeholder="Contact Person" />
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="Contact Number">Contact Number</label>
          <div class="controls">
            <input type="text" id="Contat number" name = "contact_person" placeholder="Contact Number" />
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="SSS Number">SSS Number</label>
          <div class="controls">
            <input type="text" id="sss number" name = "employee_sss" placeholder="SSS Number" />
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="Philhealth Number">Philhealth Number</label>
          <div class="controls">
            <input type="text" id="philhealth number" name = "employee_philhealth" placeholder="philhealth Number" />
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="TIN Number">TIN Number</label>
          <div class="controls">
            <input type="text" id="tin number" name = "employee_tin" placeholder="TIN Number" />
          </div>
        </div>

        <div class="control-group">
            <div class="controls">
              <input type="submit" name = "submit" value="Save" class="btn btn-primary btn-sm" />
              <input type="reset" name = "reset" value="Cancel" class="btn btn-danger btn-sm" data-dismiss="modal" />
            </div>
          </div>
        <?php echo form_close(); ?>
      </div>
    </div>
    
    
  </div>
   
  
</div>
</div>      <!-- /modal-body -->
<div class="modal-footer">
<button class="btn btn-info btn-sm" id = "Next">Next</button>
<button class="btn btn-info btn-sm" id = "Back">Back</button>
<button class="btn btn-info btn-sm" id = "Back2">Back</button>
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>      <!-- /modal-footer -->
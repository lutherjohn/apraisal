<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">New Branch</h4>
</div>      <!-- /modal-header -->

<script type="text/javascript">
  function validatebcode(x){

    var bcode = document.getElementById('bcode');


    if(bcode.value == ''){

        bcode.style.border = 'solid #e35152';
        return false;

    }
    else{
      bcode.style.border ='solid #ccffcc';

    }

  }

  function validatebname(x){
    var bname = document.getElementById('bname');
    var regexp = /^[a-zA-Z]+$/;

    if(bname.value == ''){

          bname.style.border = 'solid #e35152';
          return false;

    }else if(!bname.value.match(regexp)){

          bname.style.border = 'solid #e35152';
          return false;

    }
    else{
        bname.style.border = 'solid #ccffcc';
    }

  }

  function validatebaddrress(x){
    var baddress = document.getElementById('baddress');
    var regexp = /^[a-zA-Z]+$/;

    if(baddress.value == ''){

          baddress.style.border = 'solid #e35152';
          return false;

    }else if(!baddress.value.match(regexp)){

          baddress.style.border = 'solid #e35152';
          return false;

    }
    else{
          baddress.style.border = 'solid #ccffcc';
    }

  }

  function validatebarea(x){
    var barea = document.getElementById('barea');

    if(barea.value == ''){
        barea.style.border = 'solid #e35152';
        return false;
    }
    else{
        barea.style.border = 'solid #ccffcc';
    }

  }

  function validateSelect(x){
    var btype = document.getElementById('btype');
    var regexp = /^[a-zA-Z]+$/;

    if(btype.value == '#'){
        btype.style.border = 'solid #e35152';
        return false;
    }
    else{
        btype.style.border = 'solid #ccffcc';
    }

  }

  function validateemailAddress(x){

    var emailAddress = document.getElementById('emailAddress');
    var emailvalid = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;  

    if(emailAddress.value == ''){

        emailAddress.style.border = 'solid #e35152';
        return false;

    }else if(!emailAddress.value.match(emailvalid)){

        emailAddress.style.border = 'solid #e35152';
        return false;

    }
    else{
        emailAddress.style.border = 'solid #ccffcc';
        return true;
    }

  }


  function validatedescription(x){
    var description = document.getElementById('description');
    var regexp = /^[a-zA-Z]+$/;

    if(description.value == ''){

        description.style.border = 'solid #e35152';
        return false;

    }else if(!description.value.match(regexp)){

        description.style.border = 'solid #e35152';
        return false;

    }
    else{
        description.style.border = 'solid #ccffcc';
    }

  }


  function validateForm(event){

    var emailvalid = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/; 

    if(validatebcode(bcode) == ''){
        return false;
        event.preventDefault();
      }else if(validatebname(bname) == ''){
        return false;
        event.preventDefault();
      }else if(validatebaddrress(baddress) == ''){
        return false;
        event.preventDefault();
      }else if(validatebarea(barea) == ''){
        return false;
        event.preventDefault();
      }else if(validateSelect(btype) == '#'){
        return false;
        event.preventDefault();
      }else if(validateemailAddress(emailAddress) == ''){
        return false;
        event.preventDefault();
      }else if(validatedescription(description) == ''){
        return false;
        event.preventDefault();
      }
      else{
        return true;
      }

  }



</script>
<div class="modal-body">
    <center>
      <?php
          echo form_open('Mainx/branch_validation');
      ?>
          <div class="control-group">
            <label class="control-label" for="Branch Code">Branch Code:</label>
            <div class="controls">
              <input type="text" id = "bcode" name = "bcode" placeholder="Branch Code" onblur="validatebcode(bcode)"  />
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="Branch Name">Branch Name:</label>
            <div class="controls">
              <input type="text" id="bname" name = "bname" placeholder="Branch Name" onblur="validatebname(bname)" />
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="Branch Address">Branch Address:</label>
            <div class="controls">
              <input type="text" id="baddress" name = "baddress" placeholder="Branch Address" onblur="validatebaddrress(baddress)" />
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="Area">Area:</label>
            <div class="controls">
              <input type="text" id="barea" name = "barea" placeholder="Area" list='listid' onblur="validatebarea(barea)" />
              <datalist id='listid'>
              <?php
                $stmt = $this->db->query("SELECT DISTINCT area FROM tb_branch"); 

                foreach($stmt->result() as $row):

              ?>
              <option label='Area' value='<?php echo $row->area; ?>'>
              <?php endforeach; ?>
              </datalist>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="Branch Type">Branch type:</label>
            <div class="controls">
              <select name="btype" id ="btype" onblur="validateSelect(btype)">
                <option value="#"> &larr; Select</option>
                <option value="Desmark">Desmark</option>
                <option value="Premio">Premio</option>
              </select>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="emailAddress">Email Address:</label>
            <div class="controls">
              <input type="text" id="emailAddress" name = "bemail" placeholder="Email" onblur="validateemailAddress(emailAddress)" />
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="descriiption">Description:</label>
            <div class="controls">
              <input type="text" id="description" name = "bdescription" placeholder="Description" onblur="validatedescription(description)"/>
            </div>
          </div>
          

          <br />

          <div class="control-group">
            <div class="controls">
              <input type="submit" name = "submit" value="Save" class="btn btn-primary btn-sm" onclick ="return validateForm(event)" />
              <input type="reset" name = "reset" value="Cancel" class="btn btn-danger btn-sm" data-dismiss="modal" />
            </div>
          </div>

        <?php 
          
          echo form_close();       
        
        ?>
      
    </center>
       
</div>      <!-- /modal-body -->
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>     
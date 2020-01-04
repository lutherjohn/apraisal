<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">New Employee</h4>
</div>      <!-- /modal-header -->
<script type="text/javascript">
  function validateemp_code(x) {

    var emp_code = document.getElementById('emp_code');

    if(emp_code.value == ''){

        emp_code.style.border = 'solid #e35152';
        return false;
    }
    else{

        emp_code.style.border = 'solid #ccffcc';
        return true;
    }
  }

  function validateusername(x){

    var username = document.getElementById('username');

    if(username.value == ''){

      username.style.border = 'solid #e35152';
      return false;

    }
    else{
      username.style.border = 'solid #ccffcc';
    }

  }

  function validatepassword(x){

    var password = document.getElementById('password');

    if(password.value == ''){
      password.style.border = 'solid #e35152';
      return false;
    }
    else{
      password.style.border = 'solid #ccffcc';
      return true;
    }
  }

  function validatepassword2(x){
     var password2 = document.getElementById('password2');

     if(password2.value == ''){

        password2.style.border = 'solid #e35152';
        return false;

     }else if(password2.value !== password.value){

        password2.style.border = 'solid #e35152';
        return false;

     }else if(password2.value == password.value){

        password2.style.border = 'solid #ccffcc';
        return true;
     }
     else{

        password.style.border = 'solid #ccffcc';
        return true;

     }
  }

  function validatelastname(x){
    var lastname = document.getElementById('lastname');

    if(lastname.value == ''){

      lastname.style.border = 'solid #e35152';
      return false;
    }
    else{

      lastname.style.border = 'solid #ccffcc';
      return true;
    }
  }

  function validatefirstname(x){
    var firstname = document.getElementById('firstname');

    if(firstname.value == ''){

      firstname.style.border = 'solid #e35152';
      return false;
    }
    else{
      firstname.style.border = 'solid #ccffcc';
      return true;
    }
  }

  function validatemiddlename(x){
    var middlename = document.getElementById('middlename');

    if(middlename.value == ''){

      middlename.style.border = 'solid #e35152';
      return false;
    }
    else{
      middlename.style.border = 'solid #ccffcc';
      return true;
    }
  }

  function validateaddress1(x){
    var address1 = document.getElementById('address1');

    if(address1.value == ''){

      address1.style.border = 'solid #e35152';
      return false;
    }
    else{
      address1.style.border = 'solid #ccffcc';
      return true;
    }
  }

  function validateaddress2(x){
    var address2 = document.getElementById('address2');

    if(address2.value == ''){

      address2.style.border = 'solid #e35152';
      return false;
    }
    else{
      address2.style.border = 'solid #ccffcc';
      return true;
    }
  }

  function validategender(x){
    var gender = document.getElementById('gender');

    if(gender.value == '#'){

      gender.style.border = 'solid #e35152';
      return false;
    }
    else{
      gender.style.border = 'solid #ccffcc';
      return true;
    }

  }

  function validateyear(x){
    var year = document.getElementById('year');

    if(year.value == '#'){

      year.style.border = 'solid #e35152';
      return false;

    }
    else{

      year.style.border = 'solid #ccffcc';
      return true;

    }
  }

  function validatecivil_status(x){

    var civil_status = document.getElementById('civil_status');

    if(civil_status.value == '#'){

      civil_status.style.border = 'solid #e35152';
      return false;

    }
    else{

    civil_status.style.border = 'solid #ccffcc';
    return true;

    }

  }

  function validateemailaddress(x){

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

  function validatemonths(x){

    var months = document.getElementById('months');

    if(months.value == '#'){

      months.style.border = 'solid #e35152';
      return false;
    }
    else{
      months.style.border = 'solid #ccffcc';
      return true;
    }
  }

  function validatedays(x){

    var days = document.getElementById('days');

    if(days.value == '#'){

      days.style.border = 'solid #e35152';
      return false;
    }
    else{
      days.style.border = 'solid #ccffcc';
      return true;
    }
  }


  function validateForm(event){

    if(validateemp_code(emp_code) == ''){

        return false;
        event.preventDefault();

      }else if(validateusername(username) == ''){

        return false;
        event.preventDefault();

      }else if(validatepassword(password) == ''){

        return false;
        event.preventDefault();

      }else if(validatepassword2(password2) == ''){

        return false;
        event.preventDefault();

      }else if(validatelastname(lastname) == ''){

        return false;
        event.preventDefault();

      }else if(validatefirstname(firstname) == '#'){
        
        return false;
        event.preventDefault();

      }else if(validatemiddlename(middlename) == ''){

        return false;
        event.preventDefault();

      }else if(validateaddress1(address1) == ''){

        return false;
        event.preventDefault();
      }else if(validateaddress2(address2) == ''){

        return false;
        event.preventDefault();
      }else if(validategender(gender) == ''){

        return false;
        event.preventDefault();
      }
      else{
        return true;
      }

  }

  
</script>
<div class="modal-body">

    <?php
          echo form_open('Mainx/employee_validation');
      ?>

    <div class="row">
      <div class="col-md-6">

        <div class="control-group">
            <label class="control-label" for="Employee Code">Employee Code:</label>
            <div class="controls">
              <input type="text" id="emp_code" name = "employee_id" placeholder="Employee Code" onblur="validateemp_code(emp_code)" />
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="Username">Username:</label>
            <div class="controls">
              <input type="text" id="username" name = "username" placeholder="Username" onblur="validateusername(username)" />
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="Password">Password:</label>
            <div class="controls">
              <input type="password" id="password" name = "password" placeholder="Password" onblur="validatepassword(password)" />
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="Confirm Password">Confirm Password:</label>
            <div class="controls">
              <input type="password" id="password2" name = "cpassword" placeholder="Confirm Password" onblur="validatepassword2(password2)" />
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="lastname">Lastname:</label>
            <div class="controls">
              <input type="text" id="lastname" name = "lname" placeholder="Lastname" onblur="validatelastname(lastname)" />
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="firstname">Firstname:</label>
            <div class="controls">
              <input type="text" id="firstname" name = "fname" placeholder="Lastname" onblur="validatefirstname(firstname)" />
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="middlename">Middlename:</label>
            <div class="controls">
              <input type="text" id="middlename" name = "mname" placeholder="Middlename" onblur="validatemiddlename(middlename)" />
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="address1">Address1:</label>
            <div class="controls">
              <input type="text" id="address1" name = "address1" placeholder="Address1" onblur="validateaddress1(address1)" />
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="address2">Address2:</label>
            <div class="controls">
              <input type="text" id="address2" name = "address2" placeholder="Address2" onblur="validateaddress2(address2)" />
            </div>
          </div>
        
      </div>


      <div class="col-md-6">

        <div class="control-group">
            <label class="control-label" for="gender">Gender:</label>
            <div class="controls">
              <select name="gender" id = "gender" onblur="validategender(gender)">
                <option value="#"> &larr; Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
          </div>

          <?php 
            $months = array(
              "#"=>"Month",
              "Jan"=>"Jan",
              "Feb"=>"Feb",
              "Mar"=>"Mar",
              "Apr"=>"Apr",
              "May"=>"May",
              "Jun"=>"Jun",
              "Jul"=>"Jul",
              "Aug"=>"Aug",
              "Sep"=>"Sep",
              "Oct"=>"Oct",
              "Nov"=>"Nov",
              "Dec"=>"Dec"
              );

            $js = 'id="months" onblur ="validatemonths(months);"';
          ?>
          <?php

            $days = array(
              "#"=>"Day",
              "1"=>"1",
              "2"=>"2",
              "3"=>"3",
              "4"=>"4",
              "5"=>"5",
              "6"=>"6",
              "7"=>"7",
              "8"=>"8",
              "9"=>"9",
              "10"=>"10",
              "11"=>"11",
              "12"=>"12",
              "13"=>"13",
              "14"=>"14",
              "15"=>"15",
              "16"=>"16",
              "17"=>"17",
              "18"=>"18",
              "19"=>"19",
              "20"=>"20",
              "21"=>"21",
              "22"=>"22",
              "23"=>"23",
              "24"=>"24",
              "25"=>"25",
              "26"=>"26",
              "27"=>"27",
              "28"=>"28",
              "29"=>"29",
              "30"=>"30",
              "31"=>"31"
              );

            $days_js = 'id="days" onblur ="validatedays(days);"';
          ?>

          <div class="control-group">
            <label class="control-label" for="months">Months:</label>
            <div class="controls">
              <?php echo form_dropdown('months', $months, 'Options', $js);?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="days">Days:</label>
            <div class="controls">
              <?php echo form_dropdown('months', $days, 'Options',$days_js );?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="years">Years:</label>
            <div class="controls">
              <?php echo "<select name = 'year' id = 'year' onblur = 'validateyear(year)'>";
                    echo "<option value = '#'> &larr; Select </option>";

                  $date = '';
                  $date = date("Y");

                  for ($i=$date; $i > 1900;$i--) { 
                  echo "<option value = ".$i.">" .$i. "</option>";
                  }

                  echo "</select>";?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="civil status">Civil Status:</label>
            <div class="controls">
              <select name="civil_status" id="civil_status" onblur="validatecivil_status(civil_status)">
                <option value="#">&larr; Select</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
                <option value="Widow">Widow</option>
              </select>
            </div>
          </div> 


          <div class="control-group">
            <label class="control-label" for="emailAddress">Email Address:</label>
            <div class="controls">
              <input type="text" id="emailAddress" name = "bemail" placeholder="Email" onblur="validateemailaddress(emailAddress)" />
            </div>
          </div>

          <?php 
            $admin = '';
            $evaluator ='';
            $user = '';

            $sql = $this->db->select("*")->from("tbl_userlevel")->get();

            foreach($sql->result() as $r){

              $id = $r->userlevel_id;
              $userlevel1 = $r->userlevel;
            }

            $userlevel = array(
              '#' => '&larr; Select UserLevel &rarr;',
              '1' => 'Admin',
              '2' =>'Evaluator',
              '3' => 'User'
            );


          ?>

          <div class="control-group">
            <label class="control-label" for="civil status">Userlevel:</label>
            <div class="controls">
              <?php echo form_dropdown('userlevel', $userlevel);?>
            </div>
          </div>

          <br />

          <div class="control-group">
            <div class="controls">
              <input type="submit" name = "submit" value="Save" class="btn btn-primary btn-sm" onclick ="return validateForm(event)"/>
              <input type="reset" name = "reset" value="Cancel" class="btn btn-danger btn-sm" data-dismiss="modal" />
            </div>
          </div>
        


      </div>
    </div>
                     

          

        <?php 
          
          echo form_close();       
        
        ?>       
 </div>      <!-- /modal-body -->
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div> 
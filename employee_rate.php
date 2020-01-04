<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Rate Employee</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <style type="text/css">
            #my-table-id td {border-bottom: #f0f0f0 1px solid;background-color: #ffffff;padding: 5px;}
            #my-table-id ul{margin:0;padding:0;}
            #my-table-id li{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:20px;}
            #my-table-id .highlight {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}
            /****/
            #my-table-id .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}
            
        </style>
        <script type="text/javascript">
            function highlightStar(obj,id) {
                removeHighlight(id);        
                $('#my-table-id #tutorial-'+id+' li').each(function(index) {
                    $(this).addClass('highlight');
                    if(index == $('#my-table-id #tutorial-'+id+' li').index(obj)) {
                        return false;   
                    }
                });
            }
            function removeHighlight(id) {
                $('#my-table-id #tutorial-'+id+' li').removeClass('selected');
                $('#my-table-id #tutorial-'+id+' li').removeClass('highlight');
            }

            function addRowHandlers(sel,obj,id){
                var table = document.getElementById("my-table-id");
                var rows = table.getElementsByTagName("tr");
                for (i = 0; i < rows.length; i++){
                    var currentRow = table.rows[i];
                    var createClickHandler = 
                        function(row){
                            return function(){
                                    var employee = document.getElementById('employee').value;
                                    var designation = document.getElementById('designation').value;
                                    var branch = document.getElementById('branch').value; 
                                    var qd = row.getElementsByTagName("input")[0].value;
                                    var feedback = row.getElementsByTagName("div")[1];
                                    var title = document.getElementById('title').value;
                                    //var selected = document.getElementById('selected');

                                    $('#my-table-id #tutorial-'+id+'li').each(function(index){
                                        $('#my-table-id #tutorial-'+id+' li').addClass('selected');
                                        $('#tutorial-'+id+' #title').val((index+1));
                                        if(index == $('#my-table-id #tutorial-'+id+' li').index(obj)){
                                            return false;   
                                        }
                                    });

                                    
                                    /****/
                                    $.ajax({
                                        url: "<?php echo base_url('Mainx/employee_rating_save'); ?>",
                                        type: "post",
                                        data: {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',
                                                "employee":employee,"designation":designation,"branch":branch,"qd":qd,"title":sel.title},                
                                        success: function(){
                                            feedback.innerHTML= sel.title;
                                            //window.location.href ="<?php //echo base_url('Mainx/rate_me');?>" + "/" + designation;
                                            //selected.style.color = '#F4B30A';
                                        },
                                        error:function(){
                                            feedback.innerHTML= 'Error 403';
                                        }
                                    });
                                    
                             };
                        };

                    currentRow.onclick = createClickHandler(currentRow);
                }
            }

            function resetRating(id) {
                if($('#tutorial-'+id+' #rating').val() != 0) {
                    $('#my-table-id #tutorial-'+id+' li').each(function(index) {
                        $(this).addClass('selected');
                        if((index+1) == $('#tutorial-'+id+' #rating').val()) {
                            return false;   
                        }
                    });
                }
            } 
        </script>
        <form action="#" id="form" class="form-horizontal">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                <?php 
                $d_id = '';
                $emp_id = '';
                $br_id = '';

                foreach($rate_employee as $r): 
                        $d_id = $r->designation_id;
                        $emp_id = $r->employee_id;
                        $br_id = $r->branch_id;

                ?>
                    <td>Employee record id: 
                        <input type = "hidden" name = "rate" value=<?php echo $r->emp_record_id; ?> >
                        <?php echo $r->emp_record_id; ?>
                    </td>
                </tr>
                <tr>
                    <td>Name: 
                        <input type = "hidden" name = "employee" id = "employee" value=<?php echo $emp_id; ?> >
                        <?php echo $r->lastname. ' ' .$r->firstname ; ?>
                    </td>
                </tr>
                <tr>
                    <td>Designation: 
                        <input type = "hidden" name = "designation" id ="designation" value=<?php echo $d_id;?> >
                        <?php echo $r->designation_name; ?>
                    </td>
                </tr>
                <tr>
                    <td>Branch: 
                        <input type = "hidden" name = "branch" id ="branch" value=<?php echo $br_id; ?> >
                        <?php echo $r->branch_name; ?>
                    </td>
                </tr>
                <tr>
                    <td>Date Hired: <?php echo $r->date_start; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <br />
        

        <br />
        <?php

        $this->db->select('*');
        $this->db->from('tb_templates');
        $this->db->join('tb_designation', 'tb_templates.designation_id = tb_designation.designation_id', 'inner');
        $this->db->join('tb_question_description', 'tb_templates.q_id = tb_question_description.id', 'inner');
        $this->db->where('tb_templates.designation_id', $d_id);
        $designation_show = $this->db->get();


        ?>

        <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Rate
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">MIS Skills</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                                <table id="my-table-id" class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>&nbsp;</th>
                                                            <th>&nbsp;</th>
                                                            <th>Feedback</th>
                                                        </tr>
                                                    </thead>

                                                    <?php foreach($designation_show->result() as $r){ ?>
                                                    <tr>
                                                        <td>
                                                            <input type = "hidden" name = "qd" id ="qd" value=<?php echo $r->id;?> />
                                                            <?php echo $r->question_description;?>
                                                        </td>
                                                        <td>
                                                             <div id="tutorial-<?php echo $r->id; ?>">
                                                        
                                                              <ul>
                                                                      <?php
                                                                      for($i=1;$i<=5;$i++){                                                                 
                                                                        /****/
                                                                        $selected = "";
                                                                        switch($i){
                                                                            case 1:
                                                                            $title="Failed";
                                                                            $star=1;                                                                      
                                                                            break;
                                                                            case 2:
                                                                            $title="Improvement Needed";
                                                                            $star=2;
                                                                            break;
                                                                            case 3:
                                                                            $title="Meets Expectation";
                                                                            $star=3;
                                                                            break;
                                                                            case 4:
                                                                            $title="Exceeds Expectation";
                                                                            $star=4;
                                                                            break;
                                                                            case 5:
                                                                            $title="Outstanding";
                                                                            $star=5; 
                                                                            break; 
                                                                          }                                                          
                                                                      ?>
                                                                     <input type="hidden" name="title" id="title" value="<?php echo $title; ?>">
                                                                    <li class="<?php echo $selected;?>" onmouseover="highlightStar(this,<?php echo $r->id; ?>);" onmouseout="removeHighlight(<?php echo $r->id;?>);" onclick="addRowHandlers(this)" title='<?php echo $title; ?>'>&#9733;</li>  
                                                                      <?php } ?>
                                                                <ul>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div id='feedback'></div>
                                                        </td>             
                                                    </tr>

                                                   <?php } ?>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Interpersonal Skills</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php echo form_open(); ?>
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>&nbsp;</th>
                                                        <th>&nbsp;</th>
                                                        <th>Feedback</th>
                                                    </tr>
                                                </thead>
                                                <tr>
                                                    <td>Good relationship with <br /> co-workers</td>
                                                    <td>
                                                        <fieldset id='rate_inter1' class="rating">
                                                            <input class="stars" type="radio" id="star501" name="rating" value="5" />
                                                            <label class = "full" for="star501" title="Outstanding - 5 stars"></label>
                                                            <input class="stars" type="radio" id="star401" name="rating" value="4" />
                                                            <label class = "full" for="star401" title="Exceeds Expectation - 4 stars"></label>
                                                            <input class="stars" type="radio" id="star201" name="rating" value="3" />
                                                            <label class = "full" for="star201" title="Meets Expectation - 3 stars"></label>
                                                            <input class="stars" type="radio" id="star101" name="rating" value="2" />
                                                            <label class = "full" for="star101" title="Improvement Needed - 2 stars"></label>
                                                            <input class="stars" type="radio" id="star01" name="rating" value="1" />
                                                            <label class = "full" for="star01" title="Failed - 1 star"></label>                        
                                                        </fieldset>
                                                    </td>
                                                    <td>
                                                        <div id='feedback_inter1'></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Good relationship with <br /> supervisors</td>
                                                    <td>
                                                        <fieldset id='rate_inter2' class="rating">
                                                           <input class="stars" type="radio" id="star415" name="rating" value="5" />
                                                            <label class = "full" for="star415" title="Outstanding - 5 stars"></label>
                                                            <input class="stars" type="radio" id="star314" name="rating" value="4" />
                                                            <label class = "full" for="star314" title="Exceeds Expectation - 4 stars"></label>
                                                            <input class="stars" type="radio" id="star213" name="rating" value="3" />
                                                            <label class = "full" for="star213" title="Meets Expectation - 3 stars"></label>
                                                            <input class="stars" type="radio" id="star112" name="rating" value="2" />
                                                            <label class = "full" for="star112" title="Improvement Needed - 2 stars"></label>
                                                            <input class="stars" type="radio" id="star11" name="rating" value="1" />
                                                            <label class = "full" for="star11" title="Failed - 1 star"></label> 
                                                        </fieldset>
                                                    </td>
                                                    <td>
                                                        <div id='feedback_inter2'></div>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td>Does not whine or complain <br />Hardware Problems</td>
                                                    <td>
                                                        <fieldset id='rate_inter3' class="rating">
                                                            <input class="stars" type="radio" id="star426" name="rating" value="5" />
                                                            <label class = "full" for="star426" title="Outstanding - 5 stars"></label>
                                                            <input class="stars" type="radio" id="star325" name="rating" value="4" />
                                                            <label class = "full" for="star325" title="Exceeds Expectation - 4 stars"></label>
                                                            <input class="stars" type="radio" id="star224" name="rating" value="3" />
                                                            <label class = "full" for="star224" title="Meets Expectation - 3 stars"></label>
                                                            <input class="stars" type="radio" id="star123" name="rating" value="2" />
                                                            <label class = "full" for="star123" title="Improvement Needed - 2 stars"></label>
                                                            <input class="stars" type="radio" id="star22" name="rating" value="1" />
                                                            <label class = "full" for="star22" title="Failed - 1 star"></label> 
                                                        </fieldset>
                                                    </td>
                                                    <td>
                                                        <div id='feedback_inter3'></div>
                                                    </td>                
                                                </tr>

                                                <tr>
                                                    <td>Courteous & Friendly</td>
                                                    <td>
                                                        <fieldset id='rate_inter4' class="rating">
                                                            <input class="stars" type="radio" id="star537" name="rating" value="5" />
                                                            <label class = "full" for="star537" title="Outstanding - 5 stars"></label>
                                                            <input class="stars" type="radio" id="star436" name="rating" value="4" />
                                                            <label class = "full" for="star436" title="Exceeds Expectation - 4 stars"></label>
                                                            <input class="stars" type="radio" id="star335" name="rating" value="3" />
                                                            <label class = "full" for="star335" title="Meets Expectation - 3 stars"></label>
                                                            <input class="stars" type="radio" id="star234" name="rating" value="2" />
                                                            <label class = "full" for="star234" title="Improvement Needed - 2 stars"></label>
                                                            <input class="stars" type="radio" id="star133" name="rating" value="1" />
                                                            <label class = "full" for="star133" title="Failed - 1 star"></label> 
                                                        </fieldset>
                                                    </td>
                                                    <td>
                                                        <div id='feedback_inter4'></div>
                                                    </td>             
                                                </tr>                                              
                                            </table>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Relationship with Branches</a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php echo form_open(); ?>
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>&nbsp;</th>
                                                        <th>&nbsp;</th>
                                                        <th>Feedback</th>
                                                    </tr>
                                                </thead>
                                                <tr>
                                                    <td>Friendly with Branches</td>
                                                    <td>
                                                        <fieldset id='rate_rb1' class="rating">
                                                            <input class="stars" type="radio" id="star5015" name="rating" value="5" />
                                                            <label class = "full" for="star5015" title="Outstanding - 5 stars"></label>
                                                            <input class="stars" type="radio" id="star4013" name="rating" value="4" />
                                                            <label class = "full" for="star4013" title="Exceeds Expectation - 4 stars"></label>
                                                            <input class="stars" type="radio" id="star2012" name="rating" value="3" />
                                                            <label class = "full" for="star2012" title="Meets Expectation - 3 stars"></label>
                                                            <input class="stars" type="radio" id="star1011" name="rating" value="2" />
                                                            <label class = "full" for="star1011" title="Improvement Needed - 2 stars"></label>
                                                            <input class="stars" type="radio" id="star010" name="rating" value="1" />
                                                            <label class = "full" for="star010" title="Failed - 1 star"></label>                        
                                                        </fieldset>
                                                    </td>
                                                    <td>
                                                        <div id='feedback_rb1'></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>entertains request of branches</td>
                                                    <td>
                                                        <fieldset id='rate_rb2' class="rating">
                                                           <input class="stars" type="radio" id="star4156" name="rating" value="5" />
                                                            <label class = "full" for="star4156" title="Outstanding - 5 stars"></label>
                                                            <input class="stars" type="radio" id="star3147" name="rating" value="4" />
                                                            <label class = "full" for="star3147" title="Exceeds Expectation - 4 stars"></label>
                                                            <input class="stars" type="radio" id="star2137" name="rating" value="3" />
                                                            <label class = "full" for="star2137" title="Meets Expectation - 3 stars"></label>
                                                            <input class="stars" type="radio" id="star1128" name="rating" value="2" />
                                                            <label class = "full" for="star1128" title="Improvement Needed - 2 stars"></label>
                                                            <input class="stars" type="radio" id="star119" name="rating" value="1" />
                                                            <label class = "full" for="star119" title="Failed - 1 star"></label> 
                                                        </fieldset>
                                                    </td>
                                                    <td>
                                                        <div id='feedback_rb2'></div>
                                                    </td>
                                                </tr>                                           
                                            </table>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Approach to Work</a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php echo form_open(); ?>
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>&nbsp;</th>
                                                        <th>&nbsp;</th>
                                                        <th>Feedback</th>
                                                    </tr>
                                                </thead>
                                                <tr>
                                                    <td>Open Suggestions</td>
                                                    <td>
                                                        <fieldset id='rate_werk1' class="rating">
                                                            <input class="stars" type="radio" id="star00501" name="rating" value="5" />
                                                            <label class = "full" for="star00501" title="Outstanding - 5 stars"></label>
                                                            <input class="stars" type="radio" id="star00401" name="rating" value="4" />
                                                            <label class = "full" for="star00401" title="Exceeds Expectation - 4 stars"></label>
                                                            <input class="stars" type="radio" id="star00201" name="rating" value="3" />
                                                            <label class = "full" for="star00201" title="Meets Expectation - 3 stars"></label>
                                                            <input class="stars" type="radio" id="star00101" name="rating" value="2" />
                                                            <label class = "full" for="star00101" title="Improvement Needed - 2 stars"></label>
                                                            <input class="stars" type="radio" id="star0001" name="rating" value="1" />
                                                            <label class = "full" for="star0001" title="Failed - 1 star"></label>                        
                                                        </fieldset>
                                                    </td>
                                                    <td>
                                                        <div id='feedback_werk1'></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Has Initiative</td>
                                                    <td>
                                                        <fieldset id='rate_werk2' class="rating">
                                                           <input class="stars" type="radio" id="star00415" name="rating" value="5" />
                                                            <label class = "full" for="star00415" title="Outstanding - 5 stars"></label>
                                                            <input class="stars" type="radio" id="star00314" name="rating" value="4" />
                                                            <label class = "full" for="star00314" title="Exceeds Expectation - 4 stars"></label>
                                                            <input class="stars" type="radio" id="star00213" name="rating" value="3" />
                                                            <label class = "full" for="star00213" title="Meets Expectation - 3 stars"></label>
                                                            <input class="stars" type="radio" id="star00112" name="rating" value="2" />
                                                            <label class = "full" for="star00112" title="Improvement Needed - 2 stars"></label>
                                                            <input class="stars" type="radio" id="star0011" name="rating" value="1" />
                                                            <label class = "full" for="star0011" title="Failed - 1 star"></label> 
                                                        </fieldset>
                                                    </td>
                                                    <td>
                                                        <div id='feedback_werk2'></div>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td>Follow Instructions</td>
                                                    <td>
                                                        <fieldset id='rate_werk3' class="rating">
                                                            <input class="stars" type="radio" id="star00426" name="rating" value="5" />
                                                            <label class = "full" for="star00426" title="Outstanding - 5 stars"></label>
                                                            <input class="stars" type="radio" id="star00325" name="rating" value="4" />
                                                            <label class = "full" for="star00325" title="Exceeds Expectation - 4 stars"></label>
                                                            <input class="stars" type="radio" id="star00224" name="rating" value="3" />
                                                            <label class = "full" for="star00224" title="Meets Expectation - 3 stars"></label>
                                                            <input class="stars" type="radio" id="star00123" name="rating" value="2" />
                                                            <label class = "full" for="star00123" title="Improvement Needed - 2 stars"></label>
                                                            <input class="stars" type="radio" id="star0022" name="rating" value="1" />
                                                            <label class = "full" for="star0022" title="Failed - 1 star"></label> 
                                                        </fieldset>
                                                    </td>
                                                    <td>
                                                        <div id='feedback_werk3'></div>
                                                    </td>                
                                                </tr>

                                                <tr>
                                                    <td>Goes to work on time</td>
                                                    <td>
                                                        <fieldset id='rate_werk4' class="rating">
                                                            <input class="stars" type="radio" id="star00537" name="rating" value="5" />
                                                            <label class = "full" for="star00537" title="Outstanding - 5 stars"></label>
                                                            <input class="stars" type="radio" id="star00436" name="rating" value="4" />
                                                            <label class = "full" for="star00436" title="Exceeds Expectation - 4 stars"></label>
                                                            <input class="stars" type="radio" id="star00335" name="rating" value="3" />
                                                            <label class = "full" for="star00335" title="Meets Expectation - 3 stars"></label>
                                                            <input class="stars" type="radio" id="star00234" name="rating" value="2" />
                                                            <label class = "full" for="star00234" title="Improvement Needed - 2 stars"></label>
                                                            <input class="stars" type="radio" id="star00133" name="rating" value="1" />
                                                            <label class = "full" for="star00133" title="Failed - 1 star"></label> 
                                                        </fieldset>
                                                    </td>
                                                    <td>
                                                        <div id='feedback_werk4'></div>
                                                    </td>             
                                                </tr> 
                                                <tr>
                                                    <td>Attendance</td>
                                                    <td>
                                                        <fieldset id='rate_werk5' class="rating">
                                                            <input class="stars" type="radio" id="star11537" name="rating" value="5" />
                                                            <label class = "full" for="star11537" title="Outstanding - 5 stars"></label>
                                                            <input class="stars" type="radio" id="star11436" name="rating" value="4" />
                                                            <label class = "full" for="star11436" title="Exceeds Expectation - 4 stars"></label>
                                                            <input class="stars" type="radio" id="star11335" name="rating" value="3" />
                                                            <label class = "full" for="star11335" title="Meets Expectation - 3 stars"></label>
                                                            <input class="stars" type="radio" id="star11234" name="rating" value="2" />
                                                            <label class = "full" for="star11234" title="Improvement Needed - 2 stars"></label>
                                                            <input class="stars" type="radio" id="star11133" name="rating" value="1" />
                                                            <label class = "full" for="star11133" title="Failed - 1 star"></label> 
                                                        </fieldset>
                                                    </td>
                                                    <td>
                                                        <div id='feedback_werk5'></div>
                                                    </td>             
                                                </tr>                                              
                                            </table>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>        
    </div><!--page wrapper-->
</div>
<!-- /#wrapper -->
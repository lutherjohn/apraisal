<script type="text/javascript">
    function validatequestion_description(x){

        var question_description = document.getElementById('question_description');
        if(question_description.value == ''){

          question_description.style.border = 'solid #e35152';
        return false; 

        }else{
          question_description.style.border ='solid #ccffcc';
        }

    }

    function validatenamequestion_header(x){

        var question_header = document.getElementById('question_header');

        if(question_header.value == '#'){
            question_header.style.border = 'solid #e35152';
        }
        else{
            question_header.style.border = 'solid #ccffcc';
        }
    }

    function validateForm(event){

        if(validatenamequestion_header(question_header) == ''){

            return false;
            event.preventDefault();

        }else if(validatequestion_description(question_description) == '#'){
            
            return false;
            event.preventDefault();
        }
        else{

            return true;
        }

    }
</script>
<div id="wrapper">
   <?php $question_query = $this->db->select("*")->from("tb_question_header")->get();?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Question Form</h1>
            </div>
            
            <?php echo form_open('mainx/question_form_insert');?>
            <table class="table table-striped table-hover">            
                <tr>
                    <td>Question Header: <br />
                        <select name="question_header" id="question_header" onblur="validatenamequestion_header(question_header)">
                            <option value="#">Select &larr;</option>
                                <?php foreach($question_query->result() as $q):?>
                                    <option value=<?php echo $q->qh_id; ?> >
                                        <?php echo $q->question_header; ?>
                                    </option>
                                <?php endforeach; ?>
                        </select>
                    &nbsp; 
                        <button type="button" data-toggle="modal" href="<?php echo base_url() ."mainx/new_question"; ?>" data-target="#new_question_modal" class="btn btn-primary btn-xs">
                            Add Question
                        </button>
                    
                     </td>
                </tr>

                <tr>
                    <td>Question Description: <br />
                        <textarea name="question_description" cols="22" rows="3" id = "question_description" onblur="validatequestion_description(question_description)"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Question type: <br />
                    <input type="radio" name="q_type" value="rate"> Rate 
                    &nbsp; &nbsp; &nbsp; 
                    <input type="radio" name="q_type" value="narrative">Narrative
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" name="submit" value="save" class="btn btn-primary btn-sm" onclick ="return validateForm(event)" />
                    </td>
                </tr>
            
            </table> 
            <?php echo form_close(); ?>    

        </div>
        
        

        <div class="row">

            <table id="mainTable" class="table table-striped">
                <tr>
                    <th colspan="3">Question Description</th>
                </tr>
                <?php 
                //$k+1; -->increment number
                $faq = $this->db->select("*")->from("tb_question_description")->get();
                       
                      foreach ($faq->result() as $k => $v):
                //data-toggle="modal" data-target="#myModal2"
                ?>
                <tr class="table-row">
                <td><input type="hidden" name="q_id" value="<?php echo $v->id;?>"><?php echo $v->question_description; ?></td>
                <td>
                <button type="button" data-toggle="modal" href="<?php echo base_url() ."mainx/get_my_question_id/".$v->id; ?>" data-target="#question_modal" class="btn btn-primary btn-sm">Edit</button>
                <button type="button" class="btn btn-danger btn-sm" href="<?php echo base_url() ."mainx/delete_question_modal/".$v->id; ?>" data-toggle="modal" data-target="#delete_question_modal">Delete</button>

                </td>
              </tr>
                 <?php endforeach; ?>  
            </table>
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

            <!-- Modal -->
            <div class="modal fade" id="question_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    </div>
                </div>
            </div> 
            <!-- /.modal -->

            <!-- Modal -->
            <div class="modal fade" id="delete_question_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    </div>
                </div>
            </div> 
            <!-- /.modal -->

            <!-- Modal -->
            <div class="modal fade" id="new_question_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    </div>
                </div>
            </div> 
            <!-- /.modal -->


        </div>

    </div><!--page wrapper-->
<!-- /#wrapper -->
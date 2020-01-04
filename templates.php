<div id="wrapper">

    <?php $question_query = $this->db->select("*")->from("tb_designation")->get();?>
    <?php 
        $this->db->select("*");
        $this->db->from("tb_question");
        $this->db->join("tb_question_description", "tb_question.qd_id = tb_question_description.id", "inner");
        $templates = $this->db->get();

    ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Template Form</h1>
            </div>
            <?php echo form_open('mainx/insert_template');?>
            

            <table class="table table-striped table-hover">            
                <tr>
                    <td>Select Designation: &nbsp; 
                        <select name="designation" id = "designation" onblur="validatedesignation(designation)">
                            <option value="#">Select &larr;</option>
                                <?php foreach($question_query->result() as $q):?>
                                    <option value=<?php echo $q->designation_id; ?> >
                                        <?php echo $q->designation_name; ?>
                                    </option>
                                <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
            </table>

            <div class="form-group">
                <select name="multiple_question" size="15" multiple="multiple" tabindex="1" id="select1" style="width: 400px;">
                    <?php foreach($templates->result() as $tem): ?>
                        <option value=<?php echo $tem->qd_id; ?> > <?php echo $tem->question_description; ?></option>
                    <?php endforeach; ?>
                </select>

                <a href="#" id="add" class="glyphicon glyphicon-chevron-right"></a>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <a href="#" id="remove" class="glyphicon glyphicon-chevron-left" ></a> 
                

                <select name="multiple_question2[]" size="15" multiple="multiple" tabindex="1" id="select2" style="width: 400px;">
                </select>
                <br />
                <a href="#" id="clear" style="float: right;margin-right:512px;">Clear </a>
                
            </div>

            <div><input type="submit" name="submit" value="save" class="btn-primary btn-sm"></div>
            <?php echo form_close(); ?>

        </div>
        <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript">
            $().ready(function() {
                $('#designation').change(function(){
                    return !$('#select2 option:selected').remove().appendTo('#select1');
                });

                $('#clear').click(function(){
                    return !$('#select2 option:selected').remove().appendTo('#select1');
                });

                $('#add').click(function(){
                    return !$('#select1 option:selected').remove().appendTo('#select2');
                });
                $('#remove').click(function(){
                    return !$('#select2 option:selected').remove().appendTo('#select1');
                });
            });

            function validatedesignation(x){

                var designation = document.getElementById("designation");

                if(designation.value == '#'){

                    designation.style.border = 'solid #e35152';
                    return false;
                }
                else{

                    designation.style.border = 'solid #ccffcc';
                    return true;
                }

            }
        </script>
        
    </div><!--page wrapper-->
</div>
<!-- /#wrapper -->
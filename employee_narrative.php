<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Narrative Employee</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <script type="text/javascript">
            function narrative() {
                var table = document.getElementById("tableId");
                var rows = table.getElementsByTagName("tr");
                for (i = 0; i < rows.length; i++) {
                    var currentRow = table.rows[i];
                    var createClickHandler = 
                        function(row){
                            return function(){ 
                                    var cell = row.getElementsByTagName("td")[0];
                                    var id = cell.innerHTML;
                                    alert(id);
                             };
                        };

                    currentRow.onclick = createClickHandler(currentRow);
                }
            }
        </script>

        <form>
            <table class="table table-striped table-hover">
                <tbody>
                    <tr>
                    <?php foreach($rate_employee as $r): 
                            $d_id = $r->designation_id;

                    ?>
                        <td>Employee record id: <?php echo $r->emp_record_id; ?></td>
                    </tr>
                    <tr>
                        <td>Name: 
                            <input type = "hidden" name = "employee" value=<?php echo $r->employee_id; ?> >
                            <?php echo $r->lastname. ' ' .$r->firstname ; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Designation: 
                            <input type = "hidden" name = "designation" value=<?php echo $d_id;?> >
                            <?php echo $r->designation_name; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Branch: 
                            <input type = "hidden" name = "branch" value=<?php echo $r->branch_id; ?> >
                            <?php echo $r->branch_name; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Date Hired: <?php echo $r->date_start; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

             <?php

            $this->db->select('*');
            $this->db->from('tb_templates');
            $this->db->join('tb_designation', 'tb_templates.designation_id = tb_designation.designation_id', 'inner');
            $this->db->join('tb_question_description', 'tb_templates.q_id = tb_question_description.id', 'inner');
            $this->db->where('tb_templates.designation_id', $d_id);
            $designation_show = $this->db->get();


            $this->db->select('*');
            $this->db->from('tb_question');
            $this->db->from('tb_question_header', 'tb_question.tb_question_header_id', 'inner');
            $this->db->join('tb_question_description', 'tb_question.qd_id = tb_question_description.id', 'inner');
            $q_header_show = $this->db->get();


            ?>
            <br />

            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Narrative Form
                    </div>
                </div>
                
                    <table id="tableId">
                      <tbody>
                      <?php foreach($designation_show->result() as $q){?>
                        <tr>
                            <td>
                                <input type = "hidden" name = "qd" id ="qd" value=<?php echo $q->q_id;?> />
                                <?php echo $q->q_id; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><textarea id = "narrative_answer" class="form-control" rows="3" cols="90"></textarea></td>
                            <td><input type="button" name="submit" value="submit" onclick="narrative()" /></td>
                        </tr>
                        <?php } ?> 
                      </tbody>
                    </table>
            </div>
       </form> 
    </div>
</div>
<!-- /#wrapper -->

<!--
$("#search").on("keyup", function() {
    var value = $(this).val();

    $("table tr").each(function(index) {
        if (index != 0) {

            $row = $(this);

            var id = $row.find("td:first").text();

            if (id.indexOf(value) != 0) {
                $(this).hide();
            }
            else {
                $(this).show();
            }
        }
    });
});​


-->
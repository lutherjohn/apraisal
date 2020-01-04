<div id="wrapper">  
  
    <?php if( $this->session->flashdata("notification") ){
        echo "<script type='text/javascript'> alert(\"".$this->session->flashdata("notification")."\"); </script>";
        }
    ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Evaluation Form</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="panel-body">
            <?php
            if($this->session->flashdata('key') == true) {
            $messenger = $this->session->flashdata('key');
            ?>
                <div class="alert alert-warning" id=<?php echo $messenger['id']; ?> ><?php echo $messenger['messenger']; ?></div>
            <?php
            }
            ?> 

        </div>
     
        <?php echo form_open("Mainx/insert_evaluate");?>
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                <?php 
                $id = '';
                foreach($single_employee as $r): 
                        $id = $r->employee_id;
                ?>
                    <td>Name: 
                    <input type = "hidden" name="emp_id" value = "<?php echo $id; ?>">
                    <?php echo $r->lastname. ' ' .$r->firstname. ' '. $r->mi; ?></td>
                <?php endforeach; ?>
                </tr>
                <tr>
                    <td>Designation: 
                        <select name = 'd_id'>
                            <option value = "#">&larr; Select</option>
                            <?php $handler = $this->db->select("*")->from("tb_designation")->get();
                                foreach($handler->result() as $eval):
                             ?>
                            <option value = <?php echo $eval->designation_id; ?> > <?php echo $eval->designation_name; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Branch: 
                        <select name = 'b_id'>
                            <option value = "#">&larr; Select</option>
                            <?php $handler = $this->db->select("*")->from("tb_branch")->get();
                                foreach($handler->result() as $br):
                             ?>
                            <option value = <?php echo $br->branch_id; ?> > <?php echo $br->branch_name; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </select>
                    </td>
                </tr> 
                <tr>
                    <td>Date Hired: 
                    <input type="text" placeholder="Pickup Date" id="datepicker"  name="datepicker">
                       
                    </td>
                </tr>

                <tr>
                    <td>End: 
                    <input type="text" placeholder="Pickup Date" id="datepicker2"  name="datepicker2">
                       
                    </td>
                </tr>

                <tr>
                    <td><input type = "submit" name = "submit" value="Save" class="btn btn-primary btn-sm"></td>
                </tr>
            </tbody>
        </table>
        <?php echo form_close(); ?>

        <div class="panel-body">
            <?php
            if($this->session->flashdata('item') == true) {
            $message = $this->session->flashdata('item');
            ?>
                <div class="alert alert-info" id=<?php echo $message['id']; ?> ><?php echo $message['message']; ?></div>
            <?php
            }
            ?> 

        </div>

            


        <?php

        $this->db->select("*");
        $this->db->from("tb_emp_record2");
        $this->db->join("tb_designation", "tb_emp_record2.designation_id = tb_designation.designation_id", "inner");
        $this->db->join("tb_branch", "tb_emp_record2.branch_id = tb_branch.branch_id", "inner");
        $this->db->where("employee_id", $id );

        $sql_eval = $this->db->get();


        ?>

        <table class="table table-striped table-hover">
            <thead>
                <th>#</th>
                <th>Designation</th>
                <th>Branch</th>
                <th>Date Start</th>
                <th>Date End</th>
            </thead>

            <?php foreach($sql_eval->result() as $rate):?>
            <tr>
                <td><?php echo $rate->emp_record_id; ?></td>
                <td><?php echo $rate->designation_name; ?></td>
                <td><?php echo $rate->branch_name; ?></td>
                <td><?php echo $rate->date_start; ?></td>
                <td><?php echo $rate->date_end; ?></td>
                <td><a href = "<?php echo base_url() ."mainx/rate_me/". $rate->emp_record_id; ?>" >Rate</a></td>
                <td><a href = "<?php echo base_url() ."mainx/narrative/". $rate->emp_record_id; ?>" >Narrative</a></td>
            </tr>

            <?php endforeach; ?>
        </table>    
    </div><!--page wrapper-->
</div>
<!-- /#wrapper -->
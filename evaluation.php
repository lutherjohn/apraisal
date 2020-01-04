<div id="wrapper">
    <div id="page-wrapper">
    <br />
    <br />
        <div class="row">
            <div class="col-md-8 col-md-offset-2 well">
                <?php 
                $attr = array("class" => "form-horizontal", "role" => "form", "id" => "form1", "name" => "form1");
                echo form_open("Mainx/search_employee_eval", $attr);?>
                <div class="form-group">
                <div class="col-md-6">
                    <input class="form-control" id="ecode2" name="ecode2" placeholder="Search for Employee Code..." type="text" value="<?php echo set_value('ecode2'); ?>" />
                </div>
                <div class="col-md-6">
                    <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search" />
                    <a href="<?php echo base_url(). "/Mainx/employee_evaluate"; ?>" class="btn btn-primary">Show All</a>
                </div>
                </div>
                <?php echo form_close(); ?>

                <?php echo form_open(); ?>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Employee Code</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th colspan="2">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($ecode2); ++$i) { ?>
                        <tr>
                            <td><?php echo ($page+$i+1); ?></td>
                            <td>
                                <input type = "hidden" name = "emp_id" value = <?php echo $ecode2[$i]->employee_id; ?> >
                                <?php echo $ecode2[$i]->employee_id; ?>
                            </td>
                            <td><?php echo $ecode2[$i]->username; ?></td>
                            <td><?php echo $ecode2[$i]->lastname. ' ' . $ecode2[$i]->firstname . ' ' . $ecode2[$i]->mi; ?></td>
                            <td>
                                <a href = "<?php echo base_url() ."mainx/evaluation_form/". $ecode2[$i]->employee_id; ?>" >Evaluate</a>
                            </td>
                        </tr>
                        <?php } ?>                  
                    </tbody>
                </table>
                <?php echo form_close(); ?>
            </div>             
         
            
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?php echo $pagination; ?>
            </div>
        </div>
      
    </div>         
</div><!--page wrapper-->
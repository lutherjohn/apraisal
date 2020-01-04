<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">New Designation</h4>
</div>      <!-- /modal-header -->
<script type="text/javascript">
    function validatedcode(x){

        var dcode = document.getElementById("dcode");

        if(dcode.value == ''){

            dcode.style.border = 'solid #e35152';
            return false;
        }
        else{
            dcode.style.border = 'solid #ccffcc';
            return true;
        }
    }

    function validatedcname(x){

        var dcname = document.getElementById("dcname");
        var regexp = /^[a-zA-Z]+$/;

        if(dcname.value == ''){

            dcname.style.border = 'solid #e35152';
            return false;

        }else if(!dcname.value.match(regexp)){

            dcname.style.border = 'solid #e35152';
            return false;

        }
        else{
            dcname.style.border = 'solid #ccffcc';
            return true;
        }

    }

    function validatedescription(x){

        var description = document.getElementById("description");
        var regexp = /^[a-zA-Z]+$/;

        if(description.value == ''){

            description.style.border = 'solid #e35152';
            return false;

        }else if(!description.value.match(regexp)){

            dcname.style.border = 'solid #e35152';
            return false;

        }
        else{
            description.style.border = 'solid #ccffcc';
            return true;
        }

    }

    function validateForm(event){

        if(validatedcode(dcode) == ''){

            return false;
            event.preventDefault();

        }else if(validatedcname(dcname) == ''){

            return false;
            event.preventDefault();

        }else if(validatedescription(description)==''){

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

        echo form_open('Mainx/designation_validation');
        
        //echo validation_errors();
    ?>
    <div class="row">
        <div class="col-md-3 col-md-offset-3">
            <div class="control-group">
                <label class="control-label" for="Designation Code">Designation Code:</label>
                <div class="controls">
                    <input type="text" id="dcode" name = "dcode" placeholder="Designation Code" onblur="validatedcode(dcode)" />
                </div>
            </div>


            <div class="control-group">
                <label class="control-label" for="Designation Name">Designation Name:</label>
                <div class="controls">
                    <input type="text" id="dcname" name = "dcname" placeholder="Designation Name" onblur="validatedcname(dcname)" />
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="Description">Description:</label>
                <div class="controls">
                    <input type="text" id="description" name = "description" placeholder="Description" onblur="validatedescription(description)" />
                </div>
            </div>
            
            <br />

            <div class="control-group">
                <div class="controls">
                    <input type="submit" name = "submit" value="Save" class="btn btn-primary btn-sm" onclick ="return validateForm(event)" />
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
</div>      <!-- /modal-footer -->
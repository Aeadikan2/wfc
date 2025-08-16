<?php
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM education WHERE id = '{$_GET['id']}' ");
    foreach($qry->fetch_array() as $k => $v){
        if(!is_numeric($k)){
            $$k = $v;
        }
    }
}
?>
<div class="col-lg-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h5 class="card-title"><?php echo isset($id) ? "Edit Education" : "Add Education"; ?></h5>
        </div>
        <div class="card-body">
            <form id="education_form">
                <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>School</label>
                            <input type="text" name="school" class="form-control" value="<?php echo isset($school) ? $school : ''; ?>" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Degree</label>
                            <input type="text" name="degree" class="form-control" value="<?php echo isset($degree) ? $degree : ''; ?>" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Month</label>
                            <select name="month" class="custom-select" required>
                                <?php 
                                    for ($m=1; $m<=12; $m++) {
                                         $_month = date('F', mktime(0,0,0,$m, 1));
                                         echo "<option ".((isset($month) && $month == $_month) ? "selected" : "").">" .$_month.'</option>';
                                        }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Year</label>
                            <select name="year" class="custom-select" required>
                                <?php 
                                    for ($y =0; $y < 100; $y++) {
                                         $_year = date('Y') - $y;
                                         echo "<option ".((isset($year) && $year == $_year) ? "selected" : "").">" .$_year.'</option>';
                                        }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control summernote" rows="6"><?php echo isset($description) ? html_entity_decode($description) : ''; ?></textarea>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" id="saveBtn"><?php echo isset($id) ? "Update" : "Save"; ?></button>
            <a class="btn btn-secondary" href="./?page=education">Cancel</a>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('.summernote').summernote({ height: 200 });

    $('#saveBtn').click(function(e){
        e.preventDefault();
        var formData = $('#education_form').serialize();
        start_loader();
        $.ajax({
            url:_base_url_+"classes/Content.php?f=education",
            method:"POST",
            data:formData,
            dataType:'json',
            success:function(resp){
                if(resp.status === 'success'){
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: resp.message,
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => location.href = _base_url_+"admin/?page=education");
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: resp.message
                    });
                    end_loader();
                }
            },
            error:function(err){
                console.log(err);
                alert_toast("An error occurred",'error');
                end_loader();
            }
        });
    });
});
</script>

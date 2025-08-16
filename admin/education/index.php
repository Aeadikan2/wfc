<?php if($_settings->chk_flashdata('success')): ?>
<script>
    alert_toast("<?php echo $_settings->flashdata('success') ?>",'success');
</script>
<?php endif; ?>

<div class="col-lg-12">
    <div class="card card-outline card-primary">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Educational Attainment</h5>
            <div class="card-tools">
                <a class="btn btn-primary btn-sm new_education" href="javascript:void(0)">
                    <i class="fa fa-plus"></i> Add New
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered table-compact" id="list">
                <colgroup>
                    <col width="5%">
                    <col width="20%">
                    <col width="20%">
                    <col width="15%">
                    <col width="30%">
                    <col width="10%">
                </colgroup>
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>School</th>
                        <th>Degree</th>
                        <th>Year/Month</th>
                        <th>Description</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $qry = $conn->query("SELECT * FROM `education` ORDER BY `year` DESC, `month` DESC");
                    while($row = $qry->fetch_assoc()):
                        $desc = strip_tags(stripslashes(html_entity_decode($row['description'])));
                    ?>
                    <tr>
                        <th class="text-center"><?php echo $i++; ?></th>
                        <td><?php echo ucwords($row['school']); ?></td>
                        <td><?php echo ucwords($row['degree']); ?></td>
                        <td><?php echo $row['month'].' '.$row['year']; ?></td>
                        <td><small><?php echo mb_strimwidth($desc, 0, 50, '...'); ?></small></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="javascript:void(0)" data-id="<?php echo $row['id']; ?>" class="btn btn-primary btn-sm manage_education" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm delete_education" data-id="<?php echo $row['id']; ?>" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('.new_education').click(function(){
        location.href = _base_url_+"admin/?page=education/manage";
    });

    $('.manage_education').click(function(){
        location.href = _base_url_+"admin/?page=education/manage&id="+$(this).data('id');
    });

    $('.delete_education').click(function(){
        var id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "This record will be permanently deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if(result.isConfirmed){
                delete_education(id);
            }
        });
    });

    $('#list').dataTable();
});

function delete_education(id){
    start_loader();
    $.ajax({
        url:_base_url_+'classes/Content.php?f=education_delete',
        method:'POST',
        data:{id:id},
        dataType:'json',
        success:function(resp){
            if(resp.status === 'success'){
                Swal.fire({
                    icon: 'success',
                    title: 'Deleted!',
                    text: 'Education record has been deleted.',
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => location.reload());
            } else {
                alert_toast("An error occurred while deleting",'error');
                end_loader();
            }
        },
        error:function(err){
            console.log(err);
            alert_toast("Error deleting record",'error');
            end_loader();
        }
    });
}
</script>

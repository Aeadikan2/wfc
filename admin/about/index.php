<?php
require_once('../config.php'); // Adjust if necessary

// ✅ Handle AJAX Update Request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_about') {
    // Prevent any output before JSON
    if (ob_get_level()) ob_end_clean();
    header('Content-Type: application/json');

    $content = trim($_POST['content'] ?? '');
    $imagePath = '';

    // Fetch current record
    $about = $conn->query("SELECT * FROM about WHERE id = 1")->fetch_assoc();
    if ($about) {
        $imagePath = $about['image'];
    }

    // ✅ Handle Image Upload
    if (isset($_FILES['about_image']) && $_FILES['about_image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = base_app . "uploads/";
        if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);

        $file_info = pathinfo($_FILES['about_image']['name']);
        $ext = strtolower($file_info['extension']);
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($ext, $allowed)) {
            $filename = time() . '_' . preg_replace("/[^A-Za-z0-9_\-]/", "_", $file_info['filename']) . '.' . $ext;
            $target_file = $target_dir . $filename;

            if (move_uploaded_file($_FILES['about_image']['tmp_name'], $target_file)) {
                $imagePath = 'uploads/' . $filename;
            }
        }
    }

    // ✅ Insert or Update
    if ($about) {
        $stmt = $conn->prepare("UPDATE about SET content=?, image=? WHERE id=1");
        $stmt->bind_param("ss", $content, $imagePath);
        $stmt->execute();
    } else {
        $stmt = $conn->prepare("INSERT INTO about (id, content, image) VALUES (1, ?, ?)");
        $stmt->bind_param("ss", $content, $imagePath);
        $stmt->execute();
    }

    echo json_encode(['status' => 'success']);
    exit;
}

// ✅ Fetch Current Data for Display
$about = $conn->query("SELECT * FROM about WHERE id = 1")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage About</title>
    <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
        }
        .card {
            margin-top: 30px;
        }
        img.profile-preview {
            width: 120px;
            border-radius: 50%;
            margin-top: 10px;
            border: 2px solid #dee2e6;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card card-outline card-primary shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Manage About Section</h5>
        </div>
        <div class="card-body">
            <form id="about_c" enctype="multipart/form-data">
                <input type="hidden" name="action" value="update_about">

                <!-- About Content -->
                <div class="form-group">
                    <label class="font-weight-bold">About Content</label>
                    <textarea name="content" class="form-control summernote"><?php echo isset($about['content']) ? htmlspecialchars($about['content']) : ''; ?></textarea>
                </div>

                <!-- Page Image Upload -->
                <div class="form-group">
                    <label class="font-weight-bold">Page Image</label>
                    <input type="file" name="about_image" id="about_image" class="form-control" accept="image/*">
                    <small class="form-text text-muted">Upload a new image for the About page (optional)</small>
                </div>

                <!-- Show Current Image -->
                <?php if (!empty($about['image'])): ?>
                    <div>
                        <img src="<?php echo '../' . $about['image']; ?>" alt="Current Image" style="max-width: 300px; margin-top: 10px; border: 2px solid #dee2e6; border-radius: 8px;">
                    </div>
                <?php endif; ?>
            </form>
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary" form="about_c"><i class="fas fa-save"></i> Update</button>
        </div>
    </div>
</div>

<!-- JS Includes -->
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<script>
$(function() {
    $('.summernote').summernote({
        height: 200,
        toolbar: [
            ['style', ['bold','italic','underline','clear']],
            ['font', ['fontsize','color']],
            ['para', ['ul','ol','paragraph']],
            ['view', ['fullscreen','codeview']]
        ]
    });

    $('#about_c').on('submit', function(e){
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            url: '',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(resp){
                try {
                    resp = JSON.parse(resp);
                    if(resp.status === 'success'){
                        alert("✅ About section updated successfully!");
                        setTimeout(() => location.reload(), 1000);
                    } else {
                        alert("❌ Update failed.");
                    }
                } catch(e) {
                    console.error('Invalid response:', resp);
                    alert("Unexpected server response. Check console.");
                }
            },
            error: function(err){
                console.error(err);
                alert("Error while saving data.");
            }
        });
    });
    // Optional: Show feedback for invalid image upload
    $('#about_image').on('change', function(){
        const file = this.files[0];
        if(file){
            const allowed = ['image/jpeg','image/png','image/gif','image/jpg'];
            if(!allowed.includes(file.type)){
                alert('Invalid image type. Allowed: JPG, PNG, GIF.');
                $(this).val('');
            }
        }
    });
});
</script>
</body>
</html>

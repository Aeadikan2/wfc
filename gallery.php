<?php
include './freelance/config.php';
$result = $conn->query("SELECT * FROM gallery ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery</title>
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> 
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      background: #f8f9fa;  
      font-family: "Poppins", Arial, sans-serif;
    }

    .gallery-container {
      padding: 80px 0;
    }

    .gallery-title {
      text-align: center;
      font-size: 2.5rem;
      color: #800020;
      font-weight: 700;
      margin-bottom: 50px;
      position: relative;
      display: inline-block;
    }

    .gallery-title::after {
      content: "";
      display: block;
      width: 60px;
      height: 4px;
      background: #800020;
      margin: 10px auto 0;
      border-radius: 2px;
    }

    .gallery-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 5px;
    }

    .gallery-item {
      position: relative;
      overflow: hidden;
      border-radius: 12px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.15);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .gallery-item img {
      width: 250px;
      height: 250px;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .gallery-item:hover img {
      transform: scale(1.1);
    }

    .gallery-caption {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background: rgba(128,0,32,0.8);
      color: #fff;
      text-align: center;
      padding: 6px;
      font-size: 0.9rem;
      font-weight: 500;
    }

    @media (max-width: 992px) {
      .gallery-grid {
        grid-template-columns: repeat(3, 1fr);
      }
    }

    @media (max-width: 768px) {
      .gallery-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 576px) {
      .gallery-grid {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>
<?php include 'nav.php'?>

<div class="container gallery-container">
  <h2 class="gallery-title"><i class="fas fa-images"></i> Our Gallery</h2>
  <div class="gallery-grid">
    <?php while($row = $result->fetch_assoc()): ?>
      <div class="gallery-item">
        <img src="./freelance/uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
        <div class="gallery-caption"><?php echo $row['title']; ?></div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

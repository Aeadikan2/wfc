<?php 
include './freelance/config.php'; 

// Fetch all gallery images
$sql = "SELECT * FROM gallery ORDER BY created_at DESC";
$result = $conn->query($sql);
$images = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $images[] = [
            'src' => './freelance/uploads/'.$row['image'],
            'title' => $row['title']
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Word Faith Church</title>

   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">

   <!-- Normalize CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

   <!-- Styles -->
   <link rel="stylesheet" href="style.css">
</head>

<body>
  
   <!-- Navbar -->
   <header class="header">
      <nav class="navbar container">
         <div class="logo"><img src="./freelance/uploads/wfc_thick.jpg" alt="logo"> WFC Community</div>
         <input type="checkbox" id="menu-toggle">
         <label for="menu-toggle" class="menu-icon"><i class="fas fa-bars"></i></label>
         <ul class="nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">Purpose/Mandate</a></li>
            <li><a href="#mission">Mission & Vision</a></li>
            <li><a href="./freelance/index.php">Blog</a></li>
            <li><a href="./gallery.php">Gallery</a></li>
         </ul>
      </nav>
   </header>

   <!-- Hero -->
   <section class="hero" id="home">
      <div class="hero-container">
         <div class="hero-content animate fade-in">
            <h1>Welcome to The Word Faith Church</h1>
            <p>The church's core FOCUS is the younger generation, building and mentoring their future and God-ordained destiny.</p>
         </div>

<div class="monthly-declaration animate fade-in-right"> <div class="declaration-card"> <h2><i class="fas fa-cross"></i> Monthly Declaration</h2> <p> We, The Word-Faith Church declare that in this month of August, We walk in the triumph of Christ, for the Lord our God goes before us and fights our battles. We are not victims of circumstance, but victors through Christ Jesus who strengthens us. Every challenge before us shall bow to the power of God at work within us. Every wall of resistance falls, every limitation breaks, and every delay turns to divine acceleration. We overcome by the blood of the Lamb and by the word of our testimony! We declare victory in our homes, in our health, in our finances, in our careers, in our ministries, and in our spiritual walk. No weapon fashioned against us shall prosper, and every tongue that rises against us in judgment is condemned. The banner over our lives is Victory! This August, we rise, we conquer, and we possess the land. We are more than conquerors. We are unstoppable. We are victorious! In Jesus’ mighty name, Amen. Hallelujah!!! – Glory to God! </p> <span class="declaration-ref"><i class="fas fa-bible"></i> Prov 18:20-21 Job 22:28-29 1 Corinthians 15:57</span> </div> </div>

      </div>
   </section>

   <!-- About -->
   <section id="about" class="section container about-section">
      <div class="about-left animate slide-up">
         <h2 class="section-title"><i class="fas fa-info-circle"></i> PURPOSE / MANDATE</h2>
         <p>Our purpose is "Bringing all to the fullness of Christ" through the teaching and preaching of God's word, and the demonstration of the Spirit.</p>
      </div>

      <div class="about-right animate slide-up">
         <h2 class="section-title"><i class="fas fa-star"></i> Our Core Values</h2>
         <ul class="core-values-grid">
            <li><i class="fas fa-bible"></i> <strong> The Word</strong> </li>
            <li><i class="fas fa-hands-praying"></i> <strong> Faith</strong></li>
            <li><i class="fas fa-heart"></i> <strong> Love</strong></li>
            <li><i class="fas fa-award"></i> <strong> Excellence & Order</strong></li>
            <li><i class="fas fa-praying-hands"></i> <strong> Prayers</strong></li>
            <li><i class="fas fa-user-shield"></i> <strong> Discipline</strong></li>
            <li><i class="fas fa-hand-holding-heart"></i> <strong> Giving </strong></li>
         </ul>
      </div>
   </section>

   <!-- Mission & Vision -->
   <section id="mission" class="section alt-bg">
      <div class="container">
         <h2 class="section-title"><i class="fas fa-bullseye"></i> Mission & Vision</h2>
         <div class="cards">
            <div class="card animate slide-up">
               <i class="fas fa-cross"></i>
               <h3>Mission</h3>
               <p>To be an Encounter to the world through having a SENT mentality into every sphere of life---business Politics, Academics, Professional practices, etc.</p>
            </div>
            <div class="card animate slide-up">
               <i class="fas fa-lightbulb"></i>
               <h3>Vision</h3>
               <p>Raising a global community of human encounter.</p>
            </div>
         </div>
      </div>
   </section>

   <!-- Gallery Section -->
   <section class="gallery-section container">
      <h2 class="section-title animate fade-in"><i class="fas fa-images"></i> Gallery</h2>
      <div class="gallery-grid" id="mini-gallery">
         <?php 
         // Display first 3 images initially
         for($i = 0; $i < min(3, count($images)); $i++){
            echo '<div class="gallery-item animate float">
                    <img src="'.$images[$i]['src'].'" alt="'.$images[$i]['title'].'">
                    <div class="gallery-caption">'.$images[$i]['title'].'</div>
                  </div>';
         }
         ?>
      </div>

      <div class="see-more">
         <a href="./gallery.php" class="btn"><i class="fas fa-eye"></i> See More</a>
      </div>
   </section>

   <!-- Footer -->
   <footer>
      <div class="social-links">
         <a href="https://www.facebook.com/share/16xn7ojzMR/?mibextid=wwXIfr"><i class="fab fa-facebook"></i></a>
         <a href="https://t.me/thewordfaithchurch01"><i class="fab fa-telegram"></i></a>
         <a href="https://www.instagram.com/wfc_online?igsh=MWZzd2dlMHc1b2FwbA%3D%3D&utm_source=qr"><i class="fab fa-instagram"></i></a>
      </div>
      <p>&copy; 2025 Word Faith Church | All Rights Reserved</p>
   </footer>

   <!-- JS for Scroll Animations -->
   <script>
      const elements = document.querySelectorAll('.animate');
      const observer = new IntersectionObserver((entries) => {
         entries.forEach(entry => {
            if (entry.isIntersecting) {
               entry.target.classList.add('visible');
            }
         });
      }, { threshold: 0.1 });

      elements.forEach(el => observer.observe(el));
   </script>

   <!-- JS for Gallery Rotation -->
   <script>
      const galleryImages = <?php echo json_encode($images); ?>;
      const galleryContainer = document.getElementById('mini-gallery');
      let start = 0;

      function rotateGallery() {
          if(galleryImages.length <= 3) return;

          galleryContainer.style.opacity = 0;

          setTimeout(() => {
              galleryContainer.innerHTML = '';
              for(let i = 0; i < 3; i++){
                  let index = (start + i) % galleryImages.length;
                  let div = document.createElement('div');
                  div.className = 'gallery-item animate float';
                  div.innerHTML = `
                      <img src="${galleryImages[index].src}" alt="${galleryImages[index].title}">
                      <div class="gallery-caption">${galleryImages[index].title}</div>
                  `;
                  galleryContainer.appendChild(div);
              }
              galleryContainer.style.opacity = 1;
              start = (start + 3) % galleryImages.length;
          }, 500);
      }

      setInterval(rotateGallery, 5000);
   </script>

</body>
</html>


    <!-- <p>
                  We, The Word-Faith Church declare that in this month of August,
                  We walk in the triumph of Christ, for the Lord our God goes before us and fights our battles.
                  We are not victims of circumstance, but victors through Christ Jesus who strengthens us.
                  Every challenge before us shall bow to the power of God at work within us.
                  Every wall of resistance falls, every limitation breaks, and every delay turns to divine
                  acceleration.
                  We overcome by the blood of the Lamb and by the word of our testimony!
                  We declare victory in our homes, in our health, in our finances, in our careers, in our ministries,
                  and in our spiritual walk.
                  No weapon fashioned against us shall prosper, and every tongue that rises against us in judgment
                  is condemned.
                  The banner over our lives is Victory!
                  This August, we rise, we conquer, and we possess the land.
                  We are more than conquerors. We are unstoppable. We are victorious!
                  In Jesus’ mighty name, Amen.
                  Hallelujah!!! – Glory to God!
               </p>
               <span class="declaration-ref"><i class="fas fa-bible"></i> Prov 18:20-21 Job 22:28-29 1 Corinthians 15:57</span> -->
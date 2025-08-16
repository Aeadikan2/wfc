<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Word Faith Church</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Styles -->
  <link rel="stylesheet" href="style.css">
=======
<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en" style="height:auto;">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>WFC Blog</title>
   <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <style>
      body {
         font-family: 'Merriweather', serif;
         background: #f9f9f9;
         color: #333;
         line-height: 1.8;
         margin: 0;
         padding: 0;
      }

      /* HEADER */
      .blog-header {
         background: #800020;
         /* Oxblood */
         color: #fff;
         padding: 15px 20px;
         border-bottom: 3px solid #600015;
         display: flex;
         justify-content: space-between;
         align-items: center;
         position: sticky;
         top: 0;
         z-index: 10;
      }

      .blog-logo {
         font-size: 24px;
         font-weight: bold;
         color: #fff;
      }

      .blog-nav ul {
         display: flex;
         gap: 15px;
         list-style: none;
         margin: 0;
         padding: 0;
      }

      .blog-nav a {
         text-decoration: none;
         color: #fff;
         font-weight: 600;
         padding: 8px 12px;
         border-radius: 4px;
         transition: background 0.3s;
      }

      .blog-nav a:hover {
         background: rgba(255, 255, 255, 0.2);
      }

      /* MAIN LAYOUT */
      .blog-container {
         display: flex;
         max-width: 1200px;
         margin: 30px auto;
         gap: 20px;
         padding: 0 15px;
      }

      .blog-main {
         flex: 3;
      }

      .blog-sidebar {
         flex: 1;
         background: #fff;
         padding: 20px;
         border-radius: 8px;
         height: fit-content;
         border: 1px solid #ddd;
      }

      /* BLOG POSTS */
      .blog-post {
         background: #fff;
         padding: 20px;
         margin-bottom: 20px;
         border-radius: 8px;
         border-left: 6px solid #800020;
         box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      }

      .blog-post h2 {
         margin-top: 0;
         color: #800020;
      }

      .profile-pic {
         width: 120px;
         border-radius: 50%;
         margin-bottom: 15px;
         border: 3px solid #800020;
      }

      /* PROJECT GRID */
      .project-grid {
         display: grid;
         grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
         gap: 15px;
      }

      .project-card {
         background: #fff;
         border: 1px solid #ddd;
         border-radius: 8px;
         overflow: hidden;
         box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
         transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      .project-card img {
         width: 100%;
         height: 180px;
         object-fit: cover;
      }

      .project-card h3 {
         margin: 10px;
         font-size: 18px;
         color: #800020;
      }

      .project-card p {
         margin: 0 10px 15px;
         color: #666;
         font-size: 14px;
      }

      .project-card:hover {
         transform: translateY(-5px);
         box-shadow: 0 6px 15px rgba(128, 0, 32, 0.2);
      }

      /* SIDEBAR WIDGET */
      .widget h3 {
         margin-top: 0;
         color: #800020;
         border-bottom: 2px solid #800020;
         padding-bottom: 5px;
      }

      .social-links {
         list-style: none;
         padding: 0;
         display: flex;
         gap: 10px;
      }

      .social-links li a {
         text-decoration: none;
         color: #800020;
         font-size: 18px;
         transition: color 0.3s;
      }

      .social-links li a:hover {
         color: #600015;
      }

      /* WRITE UPS */
      .education-grid {
         display: grid;
         grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
         gap: 20px;
         margin-top: 20px;
      }

      .education-card {
         background: #fff;
         border: 1px solid #ddd;
         border-radius: 8px;
         padding: 20px;
         box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
         transition: transform 0.3s ease, box-shadow 0.3s ease;
         border-top: 5px solid #800020;
         /* Oxblood accent */
      }

      .education-card h3 {
         color: #800020;
         font-size: 18px;
         margin-bottom: 10px;
      }

      .education-card p {
         font-size: 14px;
         color: #555;
         margin-bottom: 8px;
      }

      .education-card:hover {
         transform: translateY(-6px);
         box-shadow: 0 8px 20px rgba(128, 0, 32, 0.2);
      }


      /* FOOTER */
      footer {
         background: #800020;
         padding: 20px;
         text-align: center;
         color: #fff;
         font-size: 14px;
         margin-top: 30px;
      }

      /* RESPONSIVE */
      @media(max-width: 768px) {
         .blog-container {
            flex-direction: column;
         }

         .blog-sidebar {
            margin-top: 20px;
         }
      }
   </style>

>>>>>>> a883887324095edab022de86b88fb53f38749713
</head>

<body>

<<<<<<< HEAD
  <!-- Navbar -->
  <header class="header">
    <nav class="navbar container">
      <div class="logo"><i class="fas fa-church"></i> WFC Community</div>
      <input type="checkbox" id="menu-toggle">
      <label for="menu-toggle" class="menu-icon"><i class="fas fa-bars"></i></label>
      <ul class="nav-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">Purpose/Mandate</a></li>
        <li><a href="#mission">Mission & Vision</a></li>
        <li><a href="./freelance/index.php">Blog</a></li>
      </ul>
    </nav>
  </header>

  <!-- Hero -->
  <section class="hero" id="home">
    <div class="hero-container">
      <!-- Left Side: Welcome Note -->
      <div class="hero-content animate fade-in">
        <h1>Welcome to The Word Faith Church</h1>
        <p>The church's core FOCUS is the younger generation, building and mentoring their future and God-ordained destiny.</p>
      </div>

      <!-- Right Side: Monthly Declaration -->
      <div class="monthly-declaration animate fade-in-right">
        <div class="declaration-card">
          <h2><i class="fas fa-cross"></i> Monthly Declaration</h2>
          <p>
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
            Hallelujah!!! – Glory to God!</p>
          <span class="declaration-ref"><i class="fas fa-bible"></i> Prov 18:20-21 Job 22:28-29 1 Corinthians 15:57</span>
        </div>
      </div>
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
   <ul>
  <li><i class="fas fa-bible"></i> <strong> The Word:</strong> We are a people of the Word.</li>
  <li><i class="fas fa-hands-praying"></i> <strong> Faith:</strong> We are a people of Faith.</li>
  <li><i class="fas fa-heart"></i> <strong> Love:</strong> We are a people of Love – We love the Lord and ourselves.</li>
  <li><i class="fas fa-award"></i> <strong> Excellence & Order:</strong> We are a people of Excellence, and we have<br> Order in our lives.</li>
  <li><i class="fas fa-praying-hands"></i> <strong> Prayers:</strong> We are a people of Prayers. We love praying and praying we must pray.</li>
  <li><i class="fas fa-user-shield"></i> <strong> Discipline:</strong> We are a people of Discipline, we believe in discipline, and we embrace discipline.</li>
  <li><i class="fas fa-hand-holding-heart"></i> <strong> Giving :</strong> We believe in giving, and we give lavishly and joyfully.</li>
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


  <!-- Footer -->
  <footer>
    <div class="social-links">
      <a href="https://www.facebook.com/share/16xn7ojzMR/?mibextid=wwXIfr"><i class="fab fa-facebook"></i></a>
      <a href="https://t.me/thewordfaithchurch01"><i class="fab fa-telegram"></i></a>
      <!-- <a href="#"><i class="fab fa-twitter"></i></a> -->
      <a href="https://www.instagram.com/wfc_online?igsh=MWZzd2dlMHc1b2FwbA%3D%3D&utm_source=qr"><i class="fab fa-instagram"></i></a>
    </div>
    <p>&copy; 2025 Word Faith Church | All Rights Reserved</p>
  </footer>

  <!-- Script for Scroll Animations -->
  <script>
    const elements = document.querySelectorAll('.animate');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    }, {
      threshold: 0.1
    });

    elements.forEach(el => observer.observe(el));
  </script>
=======
   <header class="blog-header">
      <div class="blog-logo">Blog</div>
      <nav class="blog-nav">
         <!-- <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#resume">Resume</a></li>
            <li><a href="#portfolio">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul> -->
      </nav>
   </header>

   <div class="blog-container">
      <main class="blog-main">
         <?php
         // Fetch user info
         $u_qry = $conn->query("SELECT * FROM users where id = 1");
         foreach ($u_qry->fetch_array() as $k => $v) {
            if (!is_numeric($k)) {
               $user[$k] = $v;
            }
         }

         // Contact info
         $contact = [];
         $c_qry = $conn->query("SELECT * FROM contacts");
         while ($row = $c_qry->fetch_assoc()) {
            $contact[$row['meta_field']] = $row['meta_value'];
         }
         ?>
         <!-- <?php
               // Safely get the 'f' parameter
               $f = isset($_GET['f']) ? $_GET['f'] : null;

               if ($f === 'update_about') {
                  // Validate content
                  $content = isset($_POST['content']) ? $_POST['content'] : '';

                  // Save About HTML
                  if (!empty($content)) {
                     file_put_contents(base_app . 'about.html', $content);
                  }

                  // Handle Image Upload
                  if (isset($_FILES['about_image']) && $_FILES['about_image']['error'] === UPLOAD_ERR_OK) {
                     $target_dir = base_app . "uploads/";
                     if (!is_dir($target_dir)) {
                        mkdir($target_dir, 0777, true);
                     }

                     // Generate safe filename
                     $file_info = pathinfo($_FILES['about_image']['name']);
                     $extension = strtolower($file_info['extension']);
                     $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];

                     if (in_array($extension, $allowed_ext)) {
                        $filename = time() . '_' . preg_replace("/[^A-Za-z0-9_\-]/", "_", $file_info['filename']) . '.' . $extension;
                        $target_file = $target_dir . $filename;

                        // Move file to uploads directory
                        if (move_uploaded_file($_FILES['about_image']['tmp_name'], $target_file)) {
                           // Save relative path in settings
                           $_settings->set_info('about_image', 'uploads/' . $filename);
                        } else {
                           echo json_encode(['status' => 'error', 'message' => 'Failed to move uploaded file']);
                           exit;
                        }
                     } else {
                        echo json_encode(['status' => 'error', 'message' => 'Invalid file type']);
                        exit;
                     }
                  }

                  echo json_encode(['status' => 'success']);
                  exit;
               }
               ?> -->
         <!-- About Me -->
         <?php
         $about = $conn->query("SELECT * FROM about WHERE id = 1")->fetch_assoc();
         ?>
         <article class="blog-post" id="about">
            <h2>This Month?</h2>
            <?php if (!empty($about['image'])): ?>
               <img src="<?php echo $about['image']; ?>" alt="About Image" style="max-width: 400px; margin-bottom: 20px; border-radius: 8px; border: 2px solid #dee2e6;">
            <?php endif; ?>
            <div class="about-content mt-3">
               <?php echo !empty($about['content']) ? $about['content'] : '<em>No about content available.</em>'; ?>
            </div>
         </article>


         <!-- Projects -->
         <article class="blog-post" id="portfolio">
            <h2>Programmes</h2>
            <div class="project-grid">
               <?php
               $p_qry = $conn->query("SELECT * FROM project");
               while ($row = $p_qry->fetch_assoc()): ?>
                  <div class="project-card">
                     <img src="<?php echo validate_image($row['banner']); ?>" alt="Project Image">
                     <h3><?php echo $row['name']; ?></h3>
                     <p><?php echo substr(strip_tags($row['description']), 0, 100); ?>...</p>
                  </div>
               <?php endwhile; ?>
            </div>
         </article>


         <!-- Write ups -->
         <article class="blog-post" id="resume">
            <h2>Spiritual Help and Guidiance</h2>
            <div class="education-grid">
               <?php
               $e_qry = $conn->query("SELECT * FROM education ORDER BY year DESC, month DESC");
               while ($row = $e_qry->fetch_assoc()): ?>
                  <div class="education-card">
                     <h3><?php echo htmlspecialchars($row['school']); ?></h3>
                     <p><strong><?php echo htmlspecialchars($row['degree']); ?></strong> - <?php echo htmlspecialchars($row['month'] . ' ' . $row['year']); ?></p>
                     <p><?php echo stripslashes(html_entity_decode($row['description'])); ?></p>
                  </div>
               <?php endwhile; ?>
            </div>
         </article>


         <!-- Work -->
         <!-- <article class="blog-post">
            <h2>Work Experience</h2>
            <?php
            $w_qry = $conn->query("SELECT * FROM work");
            while ($row = $w_qry->fetch_assoc()): ?>
               <div class="blog-card">
                  <h3><?php echo $row['company']; ?></h3>
                  <p><strong><?php echo $row['position']; ?></strong> (<?php echo str_replace("_", " ", $row['started']); ?> - <?php echo str_replace("_", " ", $row['ended']); ?>)</p>
                  <p><?php echo stripslashes(html_entity_decode($row['description'])); ?></p>
               </div>
            <?php endwhile; ?>
         </article> -->


      </main>

      <!-- Sidebar -->
      <aside class="blog-sidebar" id="contact">
         <div class="widget">
            <h3>Contact Info</h3>
            <p>
               For more sermons, please visit our social media handles
            </p>
            <p>
               <span><?php echo $contact['address'] ?? ''; ?></span><br>
               <span><?php echo $contact['mobile'] ?? ''; ?></span><br>
               <span><?php echo $contact['email'] ?? ''; ?></span>
            </p>
         </div>
         <div class="widget">
            <h3>Follow Me</h3>
            <ul class="social-links">
               <li><a href="<?php echo $contact['facebook'] ?? '#'; ?>"><i class="fa fa-facebook"></i></a></li>
               <li><a href="<?php echo $contact['twitter'] ?? '#'; ?>"><i class="fa fa-twitter"></i></a></li>
               <li><a href="mailto:<?php echo $contact['email'] ?? '#'; ?>"><i class="fa fa-google-plus"></i></a></li>
               <li><a href="<?php echo $contact['linkin'] ?? '#'; ?>"><i class="fa fa-linkedin"></i></a></li>
            </ul>
         </div>
      </aside>
   </div>

   <footer>
      <p>&copy; <?php echo date("Y"); ?> WFC Blog. All rights reserved.</p>
   </footer>
>>>>>>> a883887324095edab022de86b88fb53f38749713

</body>

</html>
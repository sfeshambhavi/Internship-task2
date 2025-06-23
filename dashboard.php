<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Palette Portal - Explore</title>
  <link rel="stylesheet" href="dashboard.css" />
</head>
    
<body>
  
  <!-- Header -->
  <header>
    <nav>
      <div class="logo">🎨 Palette Portal</div>
      <ul class="nav-links">
        <li><a href="index.html">Home</a></li>
        <li>
          <a href="next.html">Content</a>
          <ul class="dropdown">
            <li><a href="techniques.html">Techniques</a></li>
            <li><a href="subjects.html">Subjects</a></li>
            <li><a href="mediums.html">Mediums</a></li>
          </ul>
        </li>
        
      
        <li><a href="contact.html">Contact</a></li>
      </ul>
    </nav>
  </header>

  <section class="explore-intro">
    <h2>Master the Art of Painting</h2>
    <p>Through these carefully organized topics, you can learn everything from brush techniques to artistic styles and expressive subjects — all in one place.</p>
  </section>

  <!-- Main Topic Blocks -->
  <section class="main-topics">
    <div class="topic-blocks">
      
      <a href="techniques.html" class="topic-link">
        <div class="topic-block">
          <h3>Techniques</h3>
          <p>Learn step-by-step how to use methods like Wet-on-Wet, Dry Brush, Glazing, and Palette Knife for creating texture and depth.</p>
        </div>
      </a>

      <a href="subjects.html" class="topic-link">
        <div class="topic-block">
          <h3>Subjects</h3>
          <p>Explore subjects like Mandala, Abstract, Still Life, and Portraits to tell stories through your compositions.</p>
        </div>
      </a>

      <a href="mediums.html" class="topic-link">
        <div class="topic-block">
          <h3>Mediums</h3>
          <p>Dive into Watercolor, Acrylic, Oil Painting, and Gouache to find the perfect medium that suits your artistic expression.</p>
        </div>
      </a>

    </div>
    <section class="mini-gallery">
        <h2>Inspiration Gallery</h2>
        <p>See how different techniques, styles, and subjects come to life on canvas.</p>
      
        <div class="slideshow-container">
          <div class="slide fade">
            <img src="images/img1.jpg" alt="Realism">
      
          </div>
          <div class="slide fade">
            <img src="images/img2.jpg" alt="Abstract">
      
          </div>
          <div class="slide fade">
            <img src="images/img3.jpg" alt="Landscape">
    
          </div>
          <div class="slide fade">
            <img src="images/img4.jpg" alt="Landscape">
          
          </div>
        </div>
      
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
      
        
      </section>
      


  <script src="slideshow.js"></script>

</body>
</html>



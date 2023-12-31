<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Visualizer</title>
    <link rel="stylesheet" href="boot/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="boot/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="boot/css/baguetteBox.min.css">
    <link rel="stylesheet" href="boot/css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="boot/css/Swiper-Slider-Card-For-Blog-Or-Product-swiper.min.css">
    <link rel="stylesheet" href="boot/css/Swiper-Slider-Card-For-Blog-Or-Product-untitled.css">
    <link rel="stylesheet" href="boot/css/untitled-1.css">
    <link rel="stylesheet" href="boot/css/untitled.css">
    <link rel="stylesheet" href="boot/css/vanilla-zoom.min.css">
</head>
<style>
    model-viewer{
         width: 100%;
         height:90%;
         margin: auto;
         background-color: #000000;
    }
</style>
<body style="background: linear-gradient(#212529 0%, #ff6000 99%);">
<?php require 'partials/_nav.php' ?>
<model-viewer src="./models/ducati_panigale.glb" poster="./boot/img/r.jpg" shadow-intensity="1" environment-image="./assets/3d/autoshop_01_4k.hdr" skybox-image="./assets/3d/autoshop_01_4k.hdr" ar camera-controls touch-action="pan-y" alt="A 3D model carousel">
  
  <button slot="ar-button" id="ar-button">
    View in AR
  </button>

  <div id="ar-prompt">
    <img src="../../assets/hand.png">
  </div>

  <button id="ar-failure">
    AR is not tracking!
  </button>

  <div class="slider">
    <div class="slides">
      <button class="slide selected" onclick="switchBike(this, 'ducati_panigale')" style="background-image: url('Bikes/panigale.png');">

      </button><button class="slide" onclick="switchBike(this, 'ducati_panigale_v4')" style="background-image: url('Bikes/panigale_v4.png');">  

      </button><button class="slide" onclick="switchBike(this, 'kawasaki_er-6n')" style="background-image: url('Bikes/Er-6n.jpg');">

      </button><button class="slide" onclick="switchBike(this, 'kawasaki_z1000')" style="background-image: url('Bikes/Z1000.jpg');">

      </button><button class="slide" onclick="switchBike(this, 'yamaha_yzf-r3')" style="background-image: url('Bikes/r3.png');">  
      
      </button><button class="slide" onclick="switchBike(this, 'yamaha_r1m')" style="background-image: url('Bikes/r1m.jpg');">  
      
      </button><button class="slide" onclick="switchBike(this, 'suzuki_gsx_r600')" style="background-image: url('Bikes/gsx_r600.jpg');">  
      
      </button><button class="slide" onclick="switchBike(this, 'suzuki_hayabusa')" style="background-image: url('Bikes/hayabusa.jpg');">  

      </button><button class="slide" onclick="switchBike(this, 'harley_davidson_iron_883')" style="background-image: url('Bikes/iron883.jpeg');">  

      </button><button class="slide" onclick="switchBike(this, 'harley_davidson_xr1200x')" style="background-image: url('Bikes/xr1200x.jpg');">  

      </button><button class="slide" onclick="switchBike(this, 'royal_enfield_bullet')" style="background-image: url('Bikes/bullet.jpg');">  

    </button></div>
  </div>
</model-viewer>

<script type="module">
  const modelViewer = document.querySelector("model-viewer");

  window.switchBike = (element, name) => {
    const base = "./models/" + name;
    modelViewer.src = base + '.glb';
    modelViewer.poster = base + '.webp';
    const slides = document.querySelectorAll(".slide");
    slides.forEach((element) => {element.classList.remove("selected");});
    element.classList.add("selected");
  };

  document.querySelector(".slider").addEventListener('beforexrselect', (ev) => {
    // Keep slider interactions from affecting the XR scene.
    ev.preventDefault();
  });
</script>

<style>
  /* This keeps child nodes hidden while the element loads */
  :not(:defined) > * {
    display: none;
  }

  #ar-button {
    background-image: url(../../assets/ic_view_in_ar_new_googblue_48dp.png);
    background-repeat: no-repeat;
    background-size: 20px 20px;
    background-position: 12px 50%;
    background-color: #fff;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    white-space: nowrap;
    bottom: 132px;
    padding: 0px 16px 0px 40px;
    font-family: Roboto Regular, Helvetica Neue, sans-serif;
    font-size: 14px;
    color:#4285f4;
    height: 36px;
    line-height: 36px;
    border-radius: 18px;
    border: 1px solid #DADCE0;
  }

  #ar-button:active {
    background-color: #E8EAED;
  }

  #ar-button:focus {
    outline: none;
  }

  #ar-button:focus-visible {
    outline: 1px solid #4285f4;
  }

  @keyframes circle {
    from { transform: translateX(-50%) rotate(0deg) translateX(50px) rotate(0deg); }
    to   { transform: translateX(-50%) rotate(360deg) translateX(50px) rotate(-360deg); }
  }

  @keyframes elongate {
    from { transform: translateX(100px); }
    to   { transform: translateX(-100px); }
  }

  model-viewer > #ar-prompt {
    position: absolute;
    left: 50%;
    bottom: 175px;
    animation: elongate 2s infinite ease-in-out alternate;
    display: none;
  }

  model-viewer[ar-status="session-started"] > #ar-prompt {
    display: block;
  }

  model-viewer > #ar-prompt > img {
    animation: circle 4s linear infinite;
  }

  model-viewer > #ar-failure {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    bottom: 175px;
    display: none;
  }

  model-viewer[ar-tracking="not-tracking"] > #ar-failure {
    display: block;
  }

  .slider {
    width: 100%;
    text-align: center;
    overflow: hidden;
    position: absolute;
    bottom: 16px;
  }

  .slides {
    display: flex;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    scroll-behavior: smooth;
    -webkit-overflow-scrolling: touch;
  }

  .slide {
    scroll-snap-align: start;
    flex-shrink: 0;
    width: 100px;
    height: 100px;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    background-color: #fff;
    margin-right: 10px;
    border-radius: 10px;
    border: none;
    display: flex;
    margin:auto
  }

  .slide.selected {
    border: 2px solid #4285f4;
  }

  .slide:focus {
    outline: none;
  }

  .slide:focus-visible {
    outline: 1px solid #4285f4;
  }

</style>
<!-- <script src="script.js"></script> -->
    <!-- Loads <model-viewer> for browsers: -->
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.0.1/model-viewer.min.js"></script>
  

</body>

</html>
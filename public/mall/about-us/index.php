<?php require_once('../../../../private/initialize.php'); ?>

<?php

$page_title = 'About Us';
$style_sheets = [
    "/css/common.css",
    "/css/mall-about-us.css",
];
$scripts = [
    "/js/common.js",
    "/js/about-us.js",
];

include(SHARED_PATH . '/top.php');

?>

<main>
  <ul class="breadcrumb">
    <li><a href="../">Home</a>/</li>
    <li><a href="./">About Us</a></li>
  </ul>

  <h1 class="content-title">ABOUT US</h1>

  <div class="content-body text-align-justify">
    <div id="about-us-body" class="flex-container flex-align-items-center">
      <div id="about-us-content">
        <h1 class="text-align-left">栗 KURI TEAM 栗
          <br>
          <span><a href="https://kuri-team.github.io/">Website</a></span>
          <span>|</span>
          <span><a href="https://github.com/kuri-team">Github</a></span>
        </h1>
        <p>Kuri Team was founded during semester 2020C at RMIT University Vietnam, Saigon South Campus. As a young organization, our goal is to support each other in our projects, academic success, and personal development. Our last study project is a game prototype, proposed by us in our assignment paper for COSC2083 - Introduction to IT, to be implemented into RMIT wi-fi network. More detail on that project and proposal to RMIT can be found <a href="https://miketvo.com/blog/project-idea-nov-2020.html">here</a>. The playable prototype can be accessed <a href="https://miketvo.com/project/rmit-sgs-network-game/game.html">here</a>.</p>
        <p><strong>The Yabe online mall e-commerce website is our latest study project. It involves the following Kuri members:</strong></p>
      </div>
    </div>

    <div id="about-us-members" class="flex-container flex-direction-column flex-wrap flex-justify-content-center flex-align-items-center">
      <div class="flex-container flex-wrap">
        <div class="flip-card about-us-member">
          <div class="flip-card-inner" onclick="toggleModalBox('nhi-modal-box')">
            <div class="flip-card-front">
              <img alt="Portrait of Nhi" src="../../media/image/nhi.jpg">
            </div>
            <div class="flip-card-back">
              <h2>Doan Yen Nhi</h2>
            </div>
          </div>
        </div>

        <div class="flip-card about-us-member">
          <div class="flip-card-inner" onclick="toggleModalBox('mike-modal-box')">
            <div class="flip-card-front">
              <img alt="Portrait of Mike" src="../../media/image/mike.png">
            </div>
            <div class="flip-card-back">
              <h2>Tuong-Minh "Mike" Vo</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="flex-container flex-wrap">
        <div class="flip-card about-us-member">
          <div class="flip-card-inner" onclick="toggleModalBox('manh-modal-box')">
            <div class="flip-card-front">
              <img alt="Portrait of Manh" src="../../media/image/manh.jpg">
            </div>
            <div class="flip-card-back">
              <h2>Du Duc Manh</h2>
            </div>
          </div>
        </div>

        <div class="flip-card about-us-member">
          <div class="flip-card-inner" onclick="toggleModalBox('thu-modal-box')">
            <div class="flip-card-front">
              <img alt="Portrait of Thu" src="../../media/image/thu.jpg">
            </div>
            <div class="flip-card-back">
              <h2>Tran Ngoc Anh Thu</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php include(SHARED_PATH . '/bottom.php'); ?>
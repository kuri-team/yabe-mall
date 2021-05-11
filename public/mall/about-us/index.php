<?php require_once('../../../../private/initialize.php'); ?>

<?php

$page_title = 'About Us';
$style_sheets = [
    "/css/common.css",
    "/css/mall-about-us.css"
];
$scripts = [
    "/js/common.js",
    "/js/about-us.js"
];

include(SHARED_PATH . '/top.php');

?>

<!-- dim rest of page when modal box is opened -->
<div id="dimmed-page"></div>

<div id="overlay-cart-window">
    <div id="disabled-cart-msg" class="text-align-center">
      <button id="cart-closing-bttn" class="float-right"><i class="fas fa-times"></i></button>
      <p class="clear-both">This feature is only available for registered user. Please
        <a href="../account/login">login</a> or <a href="../account/register">register</a>.</p>
    </div>
</div>

<!-- Modal box container -->
<div id="overlay-modal-window">
  <div id="nhi-modal-box" class="modal-box text-align-center">
    <button class="float-right" onclick="toggleModalBox('nhi-modal-box')">
      <i class="fas fa-times"></i>
    </button>
    <h2 class="clear-both">Doan Yen Nhi</h2>
    <h3>S-3880599</h3>
    <p>Developer<br>Chief Secretary</p>
    <p>Visit my GitHub page <a href="https://github.com/doanyennhi" target="_blank">here</a></p>
  </div>

  <div id="mike-modal-box" class="modal-box text-align-center">
    <button class="float-right" onclick="toggleModalBox('mike-modal-box')">
      <i class="fas fa-times"></i>
    </button>
    <h2 class="clear-both">Tuong-Minh "Mike" Vo</h2>
    <h3>S-3877562</h3>
    <p>Designer<br>Project Coordinator<br>Technical Officer</p>
    <p>Visit my GitHub page <a href="https://github.com/miketvo" target="_blank">here</a></p>
  </div>

  <div id="manh-modal-box" class="modal-box text-align-center">
    <button class="float-right" onclick="toggleModalBox('manh-modal-box')">
      <i class="fas fa-times"></i>
    </button>
    <h2 class="clear-both">Du Duc Manh</h2>
    <h3 >S-3878480</h3>
    <p>Developer<br>Operation Officer</p>
    <p>Visit my GitHub page <a href="https://github.com/rider3458" target="_blank">here</a></p>
  </div>

  <div id="thu-modal-box" class="modal-box text-align-center">
    <button class="float-right" onclick="toggleModalBox('thu-modal-box')">
      <i class="fas fa-times"></i>
    </button>
    <h2 class="clear-both">Tran Ngoc Anh Thu</h2>
    <h3>S-3879312</h3>
    <p>Developer<br>Designer<br>Content Officer</p>
    <p>Visit my GitHub page <a href="https://github.com/tnathu-ai" target="_blank">here</a></p>
  </div>
</div>

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
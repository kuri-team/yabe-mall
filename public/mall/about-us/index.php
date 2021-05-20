<?php
    
    require_once("../../../private/initialize.php");
    require_once("../../../private/csv.php");
    
?>

<?php
    
    $page_title = "Yabe | About Us";
    $style_sheets = [
        "/css/common.css",
        "/css/flip-card.css",
        "/css/mall-about-us.css"
    ];
    $scripts = [
        "/js/common.js",
        "/js/about-us.js"
    ];
    
    
    // Load team data
    $members = read_csv("../../../private/database/team.csv", true);
    
    
    include(SHARED_PATH . "/top.php");

?>

<!-- Modal box container -->
<div id="overlay-modal-window">
  <?php
  
      foreach ($members as $member) {
          echo "<div id='" . $member["id"] . "-modal-box' class='modal-box text-align-center'>
                  <button class='float-right' onclick='toggleModalBox(\"" . $member["id"] . "-modal-box\")'>
                    <i class='fas fa-times'></i>
                  </button>
                  <h2 class='clear-both'>" . $member["name"] . "</h2><h3>" . $member["id"] ."</h3>";
          echo $member["desc"];
          echo "</div>";
      }
  
  ?>
</div>

<main>
  <ul class="breadcrumb">
    <li><a href="<?=url_for("/mall");?>">Home</a>/</li>
    <li><a href="<?=url_for("/mall/about-us");?>">About Us</a></li>
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
        <section id="about-us-content-bio">
          <?php include(SHARED_PATH . "/about-us-bio.php"); ?>
        </section>
        <p><strong>The Yabe online mall e-commerce website is our latest study project. It involves the following Kuri members:</strong></p>
      </div>
    </div>

    <div id="about-us-members" class="flex-container flex-direction-column flex-wrap flex-justify-content-center flex-align-items-center">
      <div class="flex-container flex-wrap">
        <?php
        
            foreach ($members as $member) {
                echo "<div class='flip-card about-us-member'>
                        <div class='flip-card-inner' onclick='toggleModalBox(\"" . $member["id"] . "-modal-box\")'>
                          <div class='flip-card-front'>
                            <img alt='Portrait of a person' src='" . url_for($member["img"]) . "'>
                          </div>
                          <div class='flip-card-back'>
                            <h2>" . $member["name"] . "</h2>
                          </div>
                        </div>
                      </div>";
            }
        
        ?>
      </div>
    </div>
  </div>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>
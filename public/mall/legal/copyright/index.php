<?php require_once("../../../../private/initialize.php"); ?>

<?php

$page_title = "Yabe | Copyright";
$style_sheets = [
    "/css/common.css",
    "/css/legal/legal.css",
];
$scripts = [
    "/js/common.js",
];

include(SHARED_PATH . "/top.php");

?>

  <main id="content">
    <ul class="breadcrumb">
      <li><a href="../../">Home</a>/</li>
      <li><a href="../">Legal</a>/</li>
      <li><a href="./">Copyright</a></li>
    </ul>

    <h1 class="content-title">COPYRIGHT</h1>
    <div class="content-body">
      <div class="content-text text-align-justify">
        <p><strong>MIT License</strong></p>
        <br>
        <p>Copyright (c) 2021 栗 KURI 栗</p>
        <p>Permission is hereby granted, free of charge, to any person obtaining a copy
          of this software and associated documentation files (the "Software"), to deal
          in the Software without restriction, including without limitation the rights
          to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
          copies of the Software, and to permit persons to whom the Software is
          furnished to do so, subject to the following conditions:</p>
        <p>The above copyright notice and this permission notice shall be included in all
          copies or substantial portions of the Software.</p>
        <p>THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
          IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
          FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
          AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
          LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
          OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
          SOFTWARE.</p>

        <br><br>
        <button class="content-nav-bttn float-right" onclick="previousPage()">BACK</button>
        <br><br>
      </div>
    </div>
  </main>

<?php include(SHARED_PATH . "/bottom.php"); ?>
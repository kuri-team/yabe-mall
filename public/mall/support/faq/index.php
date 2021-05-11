<?php require_once('../../../../private/initialize.php'); ?>

<?php

    $page_title = 'Yabe | FAQs';
    $style_sheets = [
        "/css/common.css",
        "/css/support/support.css",
    ];
    $scripts = [
        "/js/common.js",
    ];

    include(SHARED_PATH . "/top.php");

?>

<main id="content">
  <ul class="breadcrumb">
    <li><a href="../../">Home</a>/</li>
    <li><a href="./">Support</a>/</li>
    <li><a href="#">FAQs</a></li>
  </ul>

  <h1 class="content-title">FREQUENTLY ASKED QUESTIONS</h1>
  <div class="content-body">
    <div class="content-text text-align-justify">
      <article class="faq-item">
        <p class="faq-question">WHAT IS YABE ONLINE MALL?</p>
        <p class="faq-answer">A leading eCommerce platform from Vietnam – we connect this vast and diverse region through our technology, logistics and payments capabilities.</p>
      </article>
      <article class="faq-item">
        <p class="faq-question">HOW DO WE SECURE YOUR PAYMENT?</p>
        <p class="faq-answer">We do not store your credit card information after each transaction, which is submitted directly to your bank</p>
      </article>
      <article class="faq-item">
        <p class="faq-question">RETURN POLICY?</p>
        <p class="faq-answer">At Yabe, we value the trust of customers when ordering products. The after-sales policy at Yabe is built on a commitment to protect the interests of consumers so that you can feel secure shopping and experience the service.</p>
        <p>Yabe guarantees products sold at Yabe are new and 100% genuine. In the rare case that the product you receive is defective, damaged, or not as described, Yabe undertakes to protect customers with the return and warranty policy.</p>
      </article>
      <article class="faq-item">
        <p class="faq-question">HOW LONG WILL I RECIEVE MY REFUND?</p>
        <p class="faq-answer">Yabe will process the refund to you right after the inspection and assessment of the quality of the return/exchange product is completed. This may take approximately three business days.</p>
        <p>We will update information about the specific time of refund for each exchange/payment to you by email or SMS.</p>
      </article>
      <article class="faq-item">
        <p class="faq-question">CAN I GET A FREE PRODUCT WARRANTY?</p>
        <p class="faq-answer">More extended warranty period (based on stamp/warranty card or the time of activating electronic warranty).</p>
        <p>The stamp/warranty card is intact.</p>
        <p class="faq-answer">WARRANTY CHARGES MAY ARISE IN CASES: THE PRODUCT HAS A TECHNICAL FAULT.</p>
        <p>The product warranty period expired.</p>
        <p>The product is broken, deformed, burned, exploded, damp in the engine, or damaged during use.</p>
      </article>
      <article class="faq-item">
        <p class="faq-question">HOW DOES YABE CHARGE FOR THE SHIPPING</p>
        <p class="faq-answer">TTo provide the most suitable choice for customers, orders at Yabe will be charged a single shipping fee according to:</p>
        <p>The weight and packaging dimensions of the products in order:
          Yabe's receiving address and Yabe's warehouse or the supplier/vendor's warehouse are the geographical distance.</p>
        <p>Shipping fee support policy: Depending on the individual support policy at each supplier/vendor, orders will show different final shipping charges.</p>
      </article>

      <br><br>
      <button class="content-nav-bttn float-left" onclick="scrollToTop()">TO TOP</button>
      <button class="content-nav-bttn float-right" onclick="previousPage()">BACK</button>
      <br><br>
    </div>
  </div>
</main>

<?php include(SHARED_PATH . "/bottom.php"); ?>
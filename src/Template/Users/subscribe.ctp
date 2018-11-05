<?php 

$this->start('title');
echo 'Subscribe';
$this->end();

 ?>

<h2 class="homepage-title uk-text-bold txt-black uk-margin-small-bottom uk-margin-large-top uk-text-center uk-text-left@s">JOIN THE <b class="txt-green">2% OF INTERNATIONAL STUDENTS </b>WHO FIND <b class="txt-green">A JOB IN THE UK</b></h2>
<div class="uk-grid-collapse uk-child-width-1-2@s uk-grid-match" uk-grid uk-height-match>
  <div class="uk-position-relative"> 
      <ul class="subscribe-list txt-black uk-position-center-left">
        <li><h4 class="txt-black">Apply to immediate sponsored jobs</h4></li>
        <li><h4 class="txt-black">Send your CV to thousands of tier 2 sponsors</h4></li> 
        <li><h4 class="txt-black">Get invaluable advice on talent routes</h4></li>
      </ul>
  </div>
  <div class="uk-text-center uk-text-left@s">
    <div class="uk-width-1-2 uk-width-4-5@s uk-margin-auto">
      <img src="/img/apps-sponsorsgoodat.png" alt="sponsors goodat apps">
    </div>
  </div>
</div>
<h4 class="homepage-subtitle uk-text-center txt-green uk-margin-top">Early bird discount: <span class="cross uk-position-relative uk-display-inline-block">£30</span> £4.99 for a 180 day access (83% OFF)</h4>

<form id="payform" class="uk-text-center" action="<?= $pageCharge ?>" method="POST">
      <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="pk_live_bKiYwvTS1Odhzyk7E4ldz28Z"
        data-amount="499"
        data-name="Sponsors GoodAt"
        data-email="<?= $userEmail ?>"
        data-description="Subscribe to get access to content"
        data-image="/img/goodathand.jpg"
        data-locale="auto"
        data-zip-code="false"
        data-currency="gbp"
        data-label="Subscribe" >
      </script>
</form>
      
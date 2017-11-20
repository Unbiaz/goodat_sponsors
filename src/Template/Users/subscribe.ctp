<form action="<?= $pageCharge ?>" method="POST">
    </br></br></br></br></br></br><strong><h2 class="text-center" style="font-size: 20px font-family: Arial">Find thousands of employers that want you by industry</h2></strong></br></br></br></br></br>
  <div class="row">
    <div class="col-md-5">

    </div>

    <div class="col-md-2">

      <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="pk_test_aR9Jna6TQ1dNDXWGTvtSESUT"
        data-amount="499"
        data-name="GoodAt"
        data-email="<?= $userEmail ?>"
        data-description="Subscribe to get access to content"
        data-image="/6bernetics/webroot/img/goodathand.jpg"
        data-locale="auto"
        data-zip-code="false"
        data-currency="gbp">
      </script>
    </div>
  </div></br></br></br>
   <p style="font-family: Arial" class="text-center">Pay £4.99 for a 6 month-access instead of 1 month for the first 500 students</p>
</form>
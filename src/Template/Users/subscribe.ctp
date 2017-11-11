<form action="<?= $pageCharge ?>" method="POST">
<script
  src="https://checkout.stripe.com/checkout.js" class="stripe-button"
  data-key="pk_test_aR9Jna6TQ1dNDXWGTvtSESUT"
  data-amount="2000"
  data-name="GoodAt"
  data-email="<?= $userEmail ?>"
  data-description="Subscribe before grant access for content"
  data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
  data-locale="auto"
  data-zip-code="false"
  data-currency="usd">
</script>
</form>
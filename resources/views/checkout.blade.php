<form action="/purchase" method="POST">
	@csrf
  <script
    src="https://checkout.stripe.com/checkout.js"
    class="stripe-button"
    data-key="pk_test_51Od9aGAp1cH9DYZxiNPBTkz5LpE2g06Zd0yY8EcHRRVlX3lCdREAUyyTTYtBRQ8t3fCXXpiMCtLaXh20AMsxp4Ct00SMv7Sp8q"
    data-name="Custom t-shirt"
    data-label="Payment"
    data-description="Your custom designed t-shirt"
    data-image="https://www.webappfix.com/storage/site-setting/rLJXeVV3w6PUzdTvoZKNweUUkhYEncebwE9uqJbr.png"
    data-amount="100"
    data-currency="usd">
  </script>
</form>




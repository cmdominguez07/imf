
</div></div></div>
<footer id="footer" class="bg-light text-center text-white m-0 container-fluid">
  <!-- Grid container -->
  <div class="container-fluid pt-4 mb-0 pb-0">
    <!-- Section: Social media -->
    <section class="m-4 p-0">
      <!-- RRSS -->

      <ul class="socialIcons">
        <li class="facebook"><a href="#"><i class="fa fa-fw fa-facebook"></i>Facebook</a></li>
        <li class="twitter"><a href=""><i class="fa fa-fw fa-twitter"></i>Twitter</a></li>
        <li class="instagram"><a href=""><i class="fa fa-fw fa-instagram"></i>Instagram</a></li>
        <li class="pinterest"><a href=""><i class="fa fa-fw fa-pinterest-p"></i>Pinterest</a></li>
        <li class="steam"><a href=""><i class="fa fa-fw fa-steam"></i>Steam</a></li>
      </ul>

    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3 m-0 bg-primary ">
    © 2023 Copyright:
    <a class="text-white" href="https://mdbootstrap.com/">Cristina Martín Domínguez</a>
  </div>
  <!-- Copyright -->
</footer>
<script src="./template/jquery-validation-1.19.5/dist/jquery.validate.js"></script>
<script src="./template/jquery-validation-1.19.5/dist/additional-methods.js"></script>
<script src="./template/formValidationAct.js"></script>
<script>

  /*paypal.Buttons({
    // Order is created on the server and the order id is returned
    createOrder() {
      return fetch("/my-server/create-paypal-order", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        // use the "body" param to optionally pass additional order information
        // like product skus and quantities
        body: JSON.stringify({
          cart: [
            {
              sku: "YOUR_PRODUCT_STOCK_KEEPING_UNIT",
              quantity: "YOUR_PRODUCT_QUANTITY",
            },
          ],
        }),
      })
        .then((response) => response.json())
        .then((order) => order.id);
    },
    // Finalize the transaction on the server after payer approval
    onApprove(data) {
      return fetch("/my-server/capture-paypal-order", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          orderID: data.orderID
        })
      })
        .then((response) => response.json())
        .then((orderData) => {
          // Successful capture! For dev/demo purposes:
          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
          const transaction = orderData.purchase_units[0].payments.captures[0];
          alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
          // When ready to go live, remove the alert and show a success message within this page. For example:
          // const element = document.getElementById('paypal-button-container');
          // element.innerHTML = '<h3>Thank you for your payment!</h3>';
          // Or go to another URL:  window.location.href = 'thank_you.html';
        });
    }
  }).render('#paypal-button-container');*/

</script>
</body>

</html>
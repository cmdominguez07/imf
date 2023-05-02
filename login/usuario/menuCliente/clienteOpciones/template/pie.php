</tbody>
</table>
</div>
</div>
</div>
</div>

<footer id="footer">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#">Iconos
              <span class="visually-hidden">(current)</span>
            </a>
          </li>
      </div>
      </li>
      </ul>
      <form class="d-flex">
        <a class="navbar-brand" href="#">GreenWorld | Política de privacidad</a>
      </form>
    </div>
    </div>
  </nav>
</footer>
<script src="./template/jquery-validation-1.19.5/dist/jquery.validate.js"></script>
<script src="./template/jquery-validation-1.19.5/dist/additional-methods.js"></script>
<script src="./template/formValidationAct.js"></script>
<script>

  paypal.Buttons({
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
  }).render('#paypal-button-container');

</script>
</body>

</html>
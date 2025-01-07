    <!---------------------------------fotter-->
    <div class = "footer-top">
        <li><a href = ""><img src = ""></li>
        <li><a href = "">About</a></li>
        <li><a href = "">Contact</a></li>
        <li>
            <a href = "https://www.facebook.com/minhkhang2509/" class="fab fa-facebook-square"></a>
            <a href = "" class="fab fa-youtube"></a>
        </li>
    </div>
    <p class = "infor">
       2024 &copy; khangminhnguyengl@gmail.com
    </p>

    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=AYgr3xda60yAsF1OPJU6c35MUUd4YzyiLWCCh6cL3ZCFZ_K8spnjRbBgW2WJUgJYcPvXzjtvsvtYfM7N&currency=USD"></script>

    <script>
        paypal.Buttons({
            createOrder:function(data,actions) {
                var payprice =document.getElementById('payprice').value;
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: payprice
                        }
                    }]
                });
            },
        onApprove: function(data,actions) {
            return actions.order.capture().then(function(orderData) {
                console.log('Capture result', orderData, JSON.stringify(orderData, null,2));
                var transaction =orderData.purchase_units[0].payments.captures[0];
                alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
                window.location.replace('http://localhost/AkatsukiWebsite/frontend/payment.php');
            });
        },
        onCancle: function(data) {
            window.location.replace('http://localhost/AkatsukiWebsite/frontend/checkout.php');
        }
    }).render('#paypal-button');        

                    


    </script>

</body>


</html>
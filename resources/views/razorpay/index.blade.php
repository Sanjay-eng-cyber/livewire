<!DOCTYPE html>
<html>

<head>
    <title>Razorpay Payment</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>


    <form id='razorpayform' action="{{ route('razorpay.payment.store') }}" method="POST" class="mt-2">
        @csrf
        <div class="container">
            <h1>Payment</h1>
            <div class="d-flex flex-row mb-3">
                <div class="p-2">
                    <input type="text" name="name" id="name" placeholder="Name">
                </div>
                <div class="p-2">
                    <input type="text" name="email" id="email" placeholder="Email">
                </div>
                <div class="p-2">
                    <input type="text" name="amount" id="amount" placeholder="Amount">
                </div>
                <div class="p-2">
                    <input type="text" name="contact" id="contact" placeholder="Contact">
                </div>
                <div class="p-2">
                    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                </div>
            </div>
            <button type="submit" id="pay-button" class="btn btn-primary mt-2">Pay with Razorpay</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
    <script>
        document.getElementById('pay-button').onclick = function(e) {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var contact = document.getElementById('contact').value;
            var amount = document.getElementById('amount').value;

            var options = {
                "key": "{{ config('services.razorpay.key') }}",
                "amount": parseInt(amount) * 100,
                "currency": "INR",
                "name": "Test Payment",
                "description": "Test Transaction",
                "handler": function(response) {
                    // ✅ Set payment ID then submit the form
                    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                    document.getElementById('razorpayform').submit();
                },
                "prefill": {
                    "name": name,
                    "email": email,
                    "contact": contact
                },
                "theme": {
                    "color": "#3399cc"
                }
            };

            var rzp = new Razorpay(options);
            rzp.open();
            e.preventDefault();
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
</body>

</html>

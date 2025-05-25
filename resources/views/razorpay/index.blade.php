<!DOCTYPE html>
<html>

<head>
    <title>Razorpay Payment</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <button id="pay-button" class="btn btn-primary">Pay with Razorpay</button>
    </div>


    <form name='razorpayform' action="{{ route('razorpay.payment.store') }}" method="POST">
        @csrf
        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
    <script>
        var options = {
            "key": "{{ config('services.razorpay.key') }}",
            "amount": "100", // 100 = 1 INR
            "currency": "INR",
            "name": "Test Payment",
            "description": "Test Transaction",
            "handler": function(response) {
                document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                document.razorpayform.submit();
            },
            "prefill": {
                "name": "Test User",
                "email": "test@example.com",
                "contact": "9999999999"
            },
            "theme": {
                "color": "#3399cc"
            }
        };

        var rzp = new Razorpay(options);

        document.getElementById('pay-button').onclick = function(e) {
            rzp.open();
            e.preventDefault();
        }
    </script>
</body>

</html>

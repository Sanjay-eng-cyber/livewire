<!DOCTYPE html>
<html>

<head>
    <title>Stripe Payment</title>
    <script src="https://js.stripe.com/v3/"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <style>
        input.form-control {
            color: rgb(35, 16, 210) !important;
        }

        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            width: 300vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #fff;
        }

        form {
            border: 1px solid blue;
            padding: 100px;
            border-radius: 20px;
            background-color: lightblue;
            max-width: 700px;
            min-height: 300px !important;
        }

        h1 {
            color: rgb(10, 25, 30);
            border-radius: 20px;
            border: 1px solid blue;
            max-width: 700px;
            background-color: lightblue;
            padding: 20px;
            text-align: center;

        }
    </style>
</head>

<body>

    <div class="container">
        <div class="">
            <h1 class="mt-2">Payment</h1>

        </div>
        @if (session('success'))
            <div class="col-6 alert alert-primary" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('stripe.store') }}" method="POST" id="payment-form">
            @csrf
            <div class="row">
                <div class="col-6">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="col-6">
                    <input type="number" name="amount" class="form-control" placeholder="Amount (USD)" required>
                </div>
                <div id="card-element" class="mt-3"></div>


                <button type="submit" class="btn btn-primary mt-2">Pay</button>
            </div>  
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
    <script>
        const stripe = Stripe("{{ config('services.stripe.key') }}");
        const elements = stripe.elements();
        const card = elements.create('card');
        card.mount('#card-element');

        const form = document.getElementById('payment-form');
        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const {
                token,
                error
            } = await stripe.createToken(card);
            if (error) {
                alert(error.message);
                return;
            }

            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            form.submit();
        });
    </script>
</body>

</html>

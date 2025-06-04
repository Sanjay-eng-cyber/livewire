<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Product</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <link href="{{ asset('style.css') }}" type="text/css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container col-12 mt-3">
        <form id="editProductForm">
            <input type="hidden" name="product_Id" id="productId" value="{{ $product->id }}">
            <div class="row">
                <div class="col-6">
                    <label class="form-label">Name</label>
                    <input name="name" class="form-control" id="name" placeholder="Enter Name"
                        value="{{ $product->name }}">
                    <div id="nameError" style="color: red"></div>
                </div>
                <div class="col-6">
                    <label class="form-label">Price</label>
                    <input name="price" class="form-control" id="price" placeholder="Enter Price"
                        value="{{ $product->price }}" required>
                    <div id="priceError" style="color: red"></div>
                </div>
                <div class="col-6">
                    <label class="form-label mt-2">Category</label>
                    <input name="category" class="form-control" id="category" placeholder="Enter Category"
                        value="{{ $product->category }}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
        <button type="button" id="deleteBtn" data-id="{{ $product->id }}">Delete Product</button>
    </div>


    <!-- Load jQuery FIRST, without integrity -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Then toster.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Then Bootstrap (optional, depends on your UI) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <button onclick="Snackbar.show({ text: 'Hello from Snackbar!' })">Test Snackbar</button> --}}
    <script>
        // Delete Ajax
        document.getElementById('deleteBtn').addEventListener('click', function(e) {
            e.preventDefault();
            const productId = this.getAttribute('data-id');

            fetch(`/product/delete/${productId}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                })
                .then(res => res.json())
                .then(response => {
                    if (response.success) {
                        toastr.success(response.message, 'Success', {
                            timeOut: 3000,
                            positionClass: 'toast-top-right',
                        });
                    } else {
                        alert('Something went else!');
                    }
                }).catch(err =>
                    console.error('Error:', err))
        });

        document.getElementById('editProductForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const data = {
                name: document.getElementById('name').value,
                price: document.getElementById('price').value,
                category: document.getElementById('category').value,
            };
            const productId = document.getElementById('productId').value;
            const csrfToken = document.querySelector("meta[name='csrf-token']").getAttribute('content');
            fetch(`/product/update/${productId}`, {
                    method: "post",
                    headers: {
                        'content-type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify(data)
                })
                .then(res => res.json())
                .then(response => {
                    if (response.success) {
                        toastr.success(response.message, 'Success', {
                            timeOut: 3000,
                            positionClass: 'toast-top-right',
                        });
                    } else {
                        if (response.errors.price) {
                            document.getElementById('priceError').innerText = response.errors.price[0];
                        }
                        if (response.errors.name) {
                            document.getElementById('nameError').innerText = response.errors.name[0];
                        }
                        if (response.errors.category) {
                            document.getElementById('nameCategory').innerText = response.errors.category[0];
                        }
                    }
                }).catch(err => console.error('Error:', err));
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product Create</title>
    <link href="{{ asset('style.css') }}" type="text/css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container col-12 mt-3">
        <form id="productForm">
            <div class="row">
                <div class="col-6">
                    <label class="form-label">Name</label>
                    <input name="name" class="form-control" id="name" placeholder="Enter Name">
                    @if ($errors->has('name'))
                        <div class="text-danger" role="alert">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="col-6">
                    <label class="form-label">Price</label>
                    <input name="price" class="form-control" id="price" placeholder="Enter Price" required>
                </div>
                <div class="col-6">
                    <label class="form-label mt-2">Category</label>
                    <input name="category" class="form-control" id="category" placeholder="Enter Category" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
        <div class="col-12 mt-5">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        // Ajax For Create
        document.getElementById('productForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const data = {
                name: document.getElementById('name').value,
                price: document.getElementById('price').value,
                category: document.getElementById('category').value
            };
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch('/products/store', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify(data)
                })
                .then(res => res.json())
                .then(respone => {
                    if (respone.success) {
                        alert("product Saved.");
                        document.getElementById('productForm').reset();
                    } else {
                        alert("Something Went Wrong!");
                    }
                })
                .catch(err => console.error('Error:', err));
        });

        // Ajax For Fetch data
        fetch('/products-index', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                },
            })
            .then(res => res.json())
            .then(response => {
                if (response.success) {
                    if (response.data.length > 0) {
                        response.data.forEach(function(pro) {
                            document.querySelector('tbody').appendChild(Object.assign(document.createElement(
                                'tr'), {
                                innerHTML: `<td>${pro.id}</td><td>${pro.name}</td><td>${pro.price}</td><td><button class="btn btn-primary" data-id="${pro.id}">Delete</button></td>`
                            }));
                        });
                    } else {
                        document.querySelector('tbody').appendChild(Object.assign(document.createElement('tr'), {
                            innerHTML: `<td>No Products Found</td>`
                        }));
                    }
                }
            }).catch(err => console.log('Error:', err));
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>

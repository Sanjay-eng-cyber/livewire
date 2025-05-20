<!DOCTYPE html>
<html lang="en">

<head>
    <title>Products</title>
    @livewireStyles
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>\
    <style>
        .product-list h1 {
            color: blue;
            font-family: "Times New Roman", Times, serif;
            font-size: 50px;
            margin-top: 20px;
            border-radius: 20px;
            border: 5px solid blue;
            padding: 20px;
            max-width: 1300px;
            background-color: rgb(80, 156, 80);

        }

        .table {
            border: 2px solid rgb(23, 23, 215);
        }

        .form-search {
            border: 5px solid blue;
            border-radius: 25px;
            padding: 30px;
            background-color: rgb(80, 156, 80);
        }

        .form-label {
            font-family: "Times New Roman", Times, serif;
            color: rgb(27, 27, 197);
            font-size: 20px;
            font-weight: bold;
        }

        .form-search h1 {
            font-family: "Times New Roman", Times, serif;
            color: rgb(27, 27, 197);
            font-size: 50px;
        }


        /* .product-list th {
            background-color: rgb(109, 12, 236);
        } */
    </style>
</head>

<body>
    <livewire:search-products />
    @livewireScripts
</body>

</html>

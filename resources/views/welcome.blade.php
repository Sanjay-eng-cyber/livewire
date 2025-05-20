<!DOCTYPE html>
<html lang="en">

<head>
    <title>Livewire new project</title>
    @livewireStyles
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <Div class="container">

        {{-- <livewire:header /> --}}
        {{-- <h1>Welcome user</h1> --}}
        {{-- <livewire:contact /> --}}
        {{-- <livewire:search /> --}}
        {{-- <livewire:footer /> --}}
        <livewire:form />
        {{-- <livewire:students></livewire:students> --}}
        <livewire:student-list />
        @livewireScripts
    </Div>
</body>

</html>

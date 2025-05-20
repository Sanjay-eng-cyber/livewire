<div>
    <div class="container form-search">
        <h1>Product Search</h1>
        <form wire:submit.prevent="search">
            <div class="row">
                <div class="col-3 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name"
                        wire:model.lazy="name">
                </div>
                <div class="mb-3 col-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control" id="category" placeholder="Enter Category"
                        wire:model.lazy="category">
                </div>
                <div class="mb-3 col-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" placeholder="Enter Price"
                        wire:model.lazy="price">
                </div>
                <div class="mb-3 col-3">
                    <label for="from" class="form-label">From</label>
                    <input type="date" class="form-control" id="from" placeholder="Enter From"
                        wire:model.lazy="from">
                </div>
                <div class="mb-3 col-3">
                    <label for="to" class="form-label">To</label>
                    <input type="date" class="form-control" id="to" placeholder="Enter To"
                        wire:model.lazy="to">
                </div>
            </div>
            {{-- <div class="mb-5 col-3">
                <button type="submit" class="btn btn-primary">Search</button>
            </div> --}}
        </form>
    </div>

    <div class="container product-list">
        <h1>Products</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @if (count($products) > 0)
                    @foreach ($products as $index => $pr)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $pr->name }}</td>
                            <td>{{ $pr->price }}</td>
                            <td>{{ $pr->category }}</td>
                            <td>{{ $pr->created_at }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>
                            No Products Found
                        </td>
                    </tr>

                @endif
            </tbody>
        </table>
    </div>
</div>

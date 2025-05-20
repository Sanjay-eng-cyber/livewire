<div class="container">
    <h1 class="mt-2">Search</h1>
    <div class="col-3 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Search By Name</label>
        <input type="search" wire:model.lazy="search" class="form-control" id="exampleFormControlInput1"
            placeholder="Enter name">
    </div>
    <div class="col-6">
        <h1>Result</h1>
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </div>
</div>

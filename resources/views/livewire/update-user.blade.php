<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    @if ($check == true)
        <form wire:submit.prevent="updateUser">
            <div class="container">
                <div class="row">
                    <h1 style="text-align: center; color:blue" class="mt-4">User Update Form</h1>
                    <div class="col-4 mb-3">
                        <label for="exampleInputemail" class="form-label mt-2">Name</label>
                        <input type="text" class="form-control" id="exampleInputemail" aria-describedby="emailHelp"
                            placeholder="Enter name" wire:model.lazy="name">
                        @error('name')
                            <span style="color: red;">{{ $message }}</span><br>
                        @enderror
                    </div>
                    <div class="col-4 mb-3">
                        <label for="exampleInputEmail1" class="form-label mt-2">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter Email" wire:model.lazy="email">
                        @error('email')
                            <span style="color: red;">{{ $message }}</span><br>
                        @enderror
                    </div>
                    <div class="col-4 mb-3">
                        <label for="exampleInputPassword1" class="form-label mt-2">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Enter Password" wire:model.lazy="password">
                        @error('password')
                            <span style="color: red;">{{ $message }}</span><br>
                        @enderror
                    </div>
                    <div class="col-6 mb-3" style="margin-left: 1200px">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    @else
        <livewire:student-list />
    @endif

</div>

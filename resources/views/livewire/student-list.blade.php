<div class="containers mt-3">
    @if ($check == true)
        <h1>user List</h1>
        @if (session()->has('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif
        <table border="1px">
            <tr>
                <th>S.no</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>
                        {{ $user->id }}
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        <button wire:click="delete({{ $user->id }})">Delete</button>
                        <button wire:click="edit({{ $user->id }})">Edit</button>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        {{-- {{ $name }} --}}
        <livewire:update-user :u_id='$u_id' :name='$name' :email='$email' />
    @endif
</div>

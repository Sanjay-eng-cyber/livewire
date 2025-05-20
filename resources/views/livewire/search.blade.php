<div>
    <h3>Name :</h3> <input type="text" placeholder="Enter Name" wire:model.live.debounce.2s="message.name" /><br><br>
    @foreach ($message as $it)
        {{ $it }}
    @endforeach
</div>

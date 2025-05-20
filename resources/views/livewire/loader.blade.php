<div>
    <button type="button" wire:click="payment" class="btn btn-primary mt-2">pay</button>
    <button type="button" wire:click="cancel" class="btn btn-primary mt-2">cancel</button>
    {{-- <div wire:loading>
        Payment.....
    </div> --}}
    {{-- <div wire:loading.remove>
        Payment.....
    </div> --}}
    {{-- <div wire:loading.delay>
        Payment.....
    </div> --}}
    <div wire:loading wire:target="payment">
        <span class="spinner-border spinner-border-sm"></span> Processing Payment...
    </div>
     <div wire:loading wire:target="cancel">
        <span class="spinner-border spinner-border-sm"></span> Processing Payment cancel...
    </div>
</div>

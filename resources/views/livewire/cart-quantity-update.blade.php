<div>
    <form wire:submit.prevent="updateQuantity">
        <input  wire:model="quantity"  type="number" style="width:50px;" min="1">
        <button type="submit" class="btn btn-secondary btn-sm">Update</button>
    </form>
</div>
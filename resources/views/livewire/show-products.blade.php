
<div>
    <form wire:submit.prevent="save">
        <h2>Product Edit</h2>
        Product Name:
        <input wire:model.defer="product.name" type="text">
        @error('product.name') <span class="error">{{ $message }}</span> @enderror
        <br/>

        Manufacturer Id:
        <input wire:model.defer="product.manufacturer_id" type="text">
        @error('product.manufacturer_id') <span class="error">{{ $message }}</span> @enderror

        <br/>
        Accounts:
        <br/>
        @foreach ($available_accounts as $index => $account)
            <input wire:model.defer="accounts.{{ $index }}" type="checkbox" value="{{ $account }}" >{{ $account }}<br/>
        @endforeach
        <br/>
        <button wire:click="saveAccounts" class="btn btn-primary">Save</button>
        <br/><br/>

        <h1>Product</h1>
        Product Name: {{ $product->name }}
        <br/>
        Product Manufacturer Id: {{ $product->manufacturer_id }}
        <br/>
        Product Accounts:
        <h1>{{ $product->accounts()->orderby('id')->pluck('id') }}</h1>
    </form>
</div>



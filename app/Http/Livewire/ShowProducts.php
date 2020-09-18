<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Account;
use App\Models\Product;

class ShowProducts extends Component
{
    public $product;
    public $available_accounts = [];
    public $accounts = [];

    protected $rules = [
        'product.name' => 'required|min:6|max:30',
        'product.manufacturer_id' => 'required|integer'
    ];

    public function mount(Product $product)
    {
        $this->product = $product;

        //for real app move this to a higher level function
        //we need an array like [0 => 1, 1 => false, 2 => 3, 3 => false] so we can iterative over all possibilities
        //and not have it blow up in view - for tags would not need this
        $product_accounts = $product->accounts()->orderby('id')->pluck('id')->toArray();
        $this->available_accounts = Account::all()->pluck('id');
        $accounts_array = [];
        foreach ($this->available_accounts as $account) {
            if (in_array($account, $product_accounts)) {
                $accounts_array[] = $account;
            } else {
                $accounts_array[] = false;
            }
        }
        $this->accounts = $accounts_array;
    }

    public function save()
    {
        $this->validate();
        $this->product->save();
    }

    public function saveAccounts()
    {
        //for some reason it's either a collection or an array - sync needs an array so convert it if collection
        $accounts_array = (is_array($this->accounts)) ? $this->accounts : $this->accounts->toArray();
        $account_save_list = array_filter($accounts_array);
        $this->product->accounts()->sync($account_save_list);
    }

    public function render()
    {
        return view('livewire.show-products', [
            'products' => Product::all(),
        ]);
    }
}

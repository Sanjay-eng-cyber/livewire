<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Carbon;

class SearchProducts extends Component
{
    public $products;
    public $name;
    public $price;
    public $category;
    public $from;
    public $to;

    public function mount()
    {
        $this->products = Product::all();
    }

    public function updated()
    {
        $product = Product::query();
        if (!empty($this->name)) {
            $product = $product->where('name', 'like', '%' . $this->name . '%');
        }
        if (!empty($this->price)) {
            $product->where('price', '>=', $this->price);
        }

        if (!empty($this->category)) {
            $product->where('category', 'like', '%' . $this->category . '%');
        }

        if (!empty($this->from)) {
            $product->whereDate('created_at', '>=', $this->from);
        }

        if (!empty($this->to)) {
            $product->whereDate('created_at', '<=', $this->to);
        }
        if (!empty($this->from) && !empty($this->to)) {
            $fromDate = Carbon::parse($this->from)->startOfDay();
            $toDate = Carbon::parse($this->to)->endOfDay();
            $product->whereBetween('created_at', [$fromDate, $toDate]);
        }
        $this->products = $product->get();
    }

    public function render()
    {
        return view('livewire.search-products');
    }
}

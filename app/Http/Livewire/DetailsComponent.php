<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class DetailsComponent extends Component
{

public $slug;
    public function mount($slug){

        $this->slug = $slug;
    }
    public function render()
    {

        $product = Product::where('slug',$this->slug)->first();
        $popular_product = Product::inRandomOrder()->limit(4)->get();
        $related_product = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(5)->get();


        return view('livewire.details-component',['product' => $product ,'populars' => $popular_product,'relatives' => $related_product])->layout('layouts.base');
    }
}

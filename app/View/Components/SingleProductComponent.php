<?php

namespace App\View\Components;

use App\Models\Categories;
use App\Models\Product;
use App\Traits\PackagingTrait;
use Illuminate\View\Component;

class SingleProductComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    use PackagingTrait;

    public $category;
    public function __construct($category)
    {
        $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $category = Categories::where("name", $this->category)->first();
        $product = Product::where("categories_id", $category->id)->first();
 
        return view('components.single-product-component',compact('category', 'product'));
    }
}

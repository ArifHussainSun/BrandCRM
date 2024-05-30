<?php

namespace App\View\Components;

use App\Models\Categories;
use App\Traits\PackagingTrait;
use Illuminate\View\Component;

class ProductBundleCategoryComponent extends Component
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
        $bundle = $this->get_product_bundle();
        $categories = Categories::where("name", $this->category)->get();
 
 
        $products = $bundle["products"];
        return view('components.product-bundle-category-component',compact('categories', 'products'));
    }
}

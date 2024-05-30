<?php

namespace App\View\Components;

use App\Models\SubCategories;
use App\Traits\PackagingTrait;
use Illuminate\View\Component;

class ProductBundleSubCategoryComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    use PackagingTrait;

    public $subcategory;
    public function __construct($subcategory)
    {
        $this->subcategory = $subcategory;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $bundle = $this->get_product_bundle();
        $subcategories = SubCategories::where("name", $this->subcategory)->get();
 
 
        $products = $bundle["products"];
        return view('components.product-bundle-sub-category-component',compact('subcategories', 'products'));
    }
}

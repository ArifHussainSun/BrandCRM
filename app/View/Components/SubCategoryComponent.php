<?php

namespace App\View\Components;

use App\Models\SubCategories;
use Illuminate\View\Component;

class SubCategoryComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
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
        if(!empty($this->subcategory)) {
            $subcategories  = SubCategories::where("name", $this->subcategory)->get();
        }
        return view('components.sub-category-component',compact('subcategories'));
    }
}

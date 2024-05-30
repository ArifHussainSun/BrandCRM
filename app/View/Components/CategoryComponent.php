<?php

namespace App\View\Components;

use App\Models\Categories;
use Illuminate\View\Component;

class CategoryComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
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
        if(!empty($this->category)) {
            $categories  = Categories::where("name", $this->category)->get();
        }
       
        return view('components.category-component',compact('categories'));
    }
}

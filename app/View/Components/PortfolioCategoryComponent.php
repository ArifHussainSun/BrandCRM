<?php

namespace App\View\Components;

use App\Models\Categories;
use App\Models\Portfolio;
use Illuminate\View\Component;

class PortfolioCategoryComponent extends Component
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
        if($this->category[0]=="ALL") {

            $portfolies = Portfolio::where("status", 1)->with('category')->take(25)->get();
            
        } else {
            $category_data = Categories::where("name", $this->category)->first();
            $portfolies  = Portfolio::where("category_id", $category_data['id'])->with('category')->get();
            
        }

        return view('components.portfolio-category-component',compact('portfolies'));
    }
}

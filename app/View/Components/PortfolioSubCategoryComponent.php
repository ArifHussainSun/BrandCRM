<?php

namespace App\View\Components;

use App\Models\Categories;
use App\Models\Portfolio;
use App\Models\SubCategories;
use Illuminate\View\Component;

class PortfolioSubCategoryComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $category='';
    public $subcategory;
    public function __construct($category,$subcategory)
    {
     
        $this->category = $category;
        $this->subcategory = $subcategory;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if($this->subcategory[0]=="ALL") {

            $category_data = Categories::where("name", $this->category)->first();
            $portfolies = Portfolio::where("category_id", $category_data['id'])->where("status", 1)->with('Subcategory','category')->take(25)->get();
           
        } else {
            $category_data = Categories::where("name", $this->category)->first();
            $subcategory_data = SubCategories::where("name", $this->subcategory)->first();
            $portfolies  = Portfolio::where("sub_categories_id", $subcategory_data['id'])->with('Subcategory','category')->get();

        }

        return view('components.portfolio-sub-category-component',compact('portfolies'));
    }
}

<?php

namespace App\View\Components;

use App\Models\Categories;
use App\Models\Portfolio;
use Illuminate\View\Component;

class HomePortfolioComponent extends Component
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
            $portfolietops  = Portfolio::where("category_id", $category_data['id'])->where("sub_categories_id",null)->with('category')->take(5)->get();
            $portfoliebottoms  = Portfolio::where("category_id", $category_data['id'])->where("sub_categories_id",null)->with('category')->skip(5)->take(5)->get();
            
        }

        return view('components.home-portfolio-component',compact('portfolietops','portfoliebottoms'));
    }
}

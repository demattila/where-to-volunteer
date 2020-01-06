<?php

namespace App\Http\ViewComposers;

use App\Category;
use App\Region;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FilterComposer
{
    protected $regions;
    protected $categories;

    public function __construct()
    {
        $this->regions = Region::all();
        $this->categories = Category::all();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('regions', $this->regions);
        $view->with('categories', $this->categories);
    }
}
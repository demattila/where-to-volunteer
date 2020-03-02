<?php
/**
 * Created by PhpStorm.
 * User: demeterattila
 * Date: 2020. 01. 29.
 * Time: 17:03
 */

namespace App\Http\ViewComposers;

use App\Category;
use Illuminate\View\View;

class EventCategoryComposer
{
    protected $categories;
    public function __construct()
    {
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
        $view->with('categories', $this->categories);
    }

}
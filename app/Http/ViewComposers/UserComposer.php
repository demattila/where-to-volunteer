<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserComposer
{
    protected $user;

    public function __construct()
    {
        if(auth()->guard('web')->check()){
            $this->user = auth()->guard('web')->user();
        }
        if(auth()->guard('web_organization')->check()){
            $this->user = auth()->guard('web_organization')->user();
        }
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('user', $this->user);
    }
}
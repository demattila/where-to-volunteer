<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserComposer
{
    protected $user;
    protected $volunteerSignedIn = false;
    protected $organizationSignedIn = false;
    protected $user_type;

    public function __construct()
    {
        if(auth()->guard('web')->check()){
            $this->volunteerSignedIn = true;
            $this->user = auth()->guard('web')->user();
            $this->user_type = "App\Volunteer";
        }
        if(auth()->guard('web_organization')->check()){
            $this->organizationSignedIn = true;
            $this->user = auth()->guard('web_organization')->user();
            $this->user_type = "App\Organization";

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
        $view->with('volunteerSignedIn', $this->volunteerSignedIn);
        $view->with('organizationSignedIn', $this->organizationSignedIn);
        $view->with('user_type', $this->user_type);
    }
}
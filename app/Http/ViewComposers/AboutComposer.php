<?php

namespace App\Http\ViewComposers;

use App\Apply;
use App\Event;
use App\Organization;
use App\Volunteer;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AboutComposer
{
    private $volunteers_count;
    private $organizations_count;
    private $events_count;
    private $applies_count;

    public function __construct()
    {
       $this->volunteers_count = Volunteer::all()->count();
       $this->organizations_count = Organization::all()->count();
       $this->events_count = Event::all()->count();
       $this->applies_count = Apply::all()->count();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('volunteers_count', $this->volunteers_count);
        $view->with('organizations_count', $this->organizations_count);
        $view->with('events_count', $this->events_count);
        $view->with('applies_count', $this->applies_count);
    }
}
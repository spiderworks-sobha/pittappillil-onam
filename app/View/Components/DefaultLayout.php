<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DefaultLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
   public function render()
    {
        return view('layouts.default');
    }
}

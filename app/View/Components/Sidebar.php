<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Sidebar extends Component
{
    public $showTeacherLinks;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // 講師のみ表示
        $this->showTeacherLinks = auth()->check() && in_array(auth()->user()->role, [1,2]);
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.sidebar');
    }
}

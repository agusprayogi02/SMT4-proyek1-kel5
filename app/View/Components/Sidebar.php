<?php

namespace App\View\Components;

use App\Models\MenuGroup;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $title;
    public $shortTitle;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $shortTitle)
    {
        //
        $this->title = $title;
        $this->shortTitle = $shortTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $menuGroups = MenuGroup::with('menuItems')->get();
        return view('components.sidebar', compact('menuGroups'));
    }
}

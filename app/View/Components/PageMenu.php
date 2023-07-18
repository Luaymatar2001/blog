<?php

namespace App\View\Components;

use App\Models\about;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PageMenu extends Component
{

    public $about;
    public $breadcrumbs1;
    /**
     * Create a new component instance.
     */
    public function __construct($breadcrumbs1)
    {
        $this->about = about::firstOrFail();
        $this->breadcrumbs1 = $breadcrumbs1;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.page-menu');
    }
}

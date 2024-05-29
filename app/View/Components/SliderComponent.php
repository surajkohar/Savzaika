<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SliderComponent extends Component
{
    public $title;
    public $description1;
    public $description2;
    public $image;
    public $button;
    /**
     * Create a new component instance.
     */
    public function __construct($title,$description1,$description2,$image,$button)
    {
        $this->title = $title;
        $this->description1 = $description1;
        $this->description2 = $description2;
        $this->image = $image;
        $this->button = $button;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.slider-component');
    }
}

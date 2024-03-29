<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component{
    public $type, $icon, $content;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $icon, $content){
        $this->type = $type;
        $this->icon = $icon;
        $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}

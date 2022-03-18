<?php

namespace App\View\Components\clients;

use Illuminate\View\Component;

class Banner extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $photo, $mobile;

    public function __construct($photo, $mobile)
    {
        $this->photo = $photo;
        $this->mobile = $mobile;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.clients.banner');
    }
}

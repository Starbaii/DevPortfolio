<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProjectCard extends Component
{
    public $title;
    public $tech;

    public function __construct($title, $tech)
    {
        $this->title = $title;
        $this->tech = $tech;
    }

    public function render()
    {
        return view('components.project-card');
    }
}
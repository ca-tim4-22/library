<?php

namespace App\View\Components\books;

use Illuminate\View\Component;

class book_specification extends Component
{
    public $models;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($models)
    {
        $this->models = $models;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.books.book_specification');
    }
}

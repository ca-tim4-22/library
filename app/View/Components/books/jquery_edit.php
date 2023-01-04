<?php

namespace App\View\Components\books;

use Illuminate\View\Component;

class jquery_edit extends Component
{
    public $models;
    public $book;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($models, $book)
    {
        $this->models = $models;
        $this->book = $book;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.books.jquery_edit');
    }
}

<?php

namespace App\View\Components\books;

use Illuminate\View\Component;

class book_side extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.books.book_side');
    }
}

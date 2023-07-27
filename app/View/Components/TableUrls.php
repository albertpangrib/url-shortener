<?php

namespace App\View\Components;

use App\Models\Url;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableUrls extends Component
{
    /**
     * Create a new component instance.
     */

    public $url;

    public function __construct()
    {
        $this->url = new Url();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table-urls', [
            'urls' => Url::where('user_id', auth()?->user()->id)->latest()->get()
        ]);
    }
}

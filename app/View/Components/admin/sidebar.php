<?php

namespace App\View\Components\admin;

use App\Models\Message;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class sidebar extends Component
{
    /**
     * Create a new component instance.
     */

    public $notification;

    public function __construct()
    {
        $this->notification = Message::where("already_read", false)->count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.sidebar');
    }
}

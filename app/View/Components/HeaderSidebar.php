<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Modules\MenuLinks\Repositories\MenuLinkRepository;

class HeaderSidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public MenuLinkRepository $menuLinkRepository)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $links = $this->menuLinkRepository->all();
        return view('components.header-sidebar', compact('links'));
    }
}

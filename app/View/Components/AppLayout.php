<?php

namespace App\View\Components;

use App\Models\Client;
use Illuminate\View\View;
use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        // for total clients
        $allClients = Client::count();

        return view('layouts.app', [
            'allClients' => $allClients,            
        ]);
    }
}

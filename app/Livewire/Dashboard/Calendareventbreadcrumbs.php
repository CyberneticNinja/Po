<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class Calendareventbreadcrumbs extends Component
{
    public $activeTab = 'today';
    
    public function render()
    {
        // dump($this->activeTab); // Debugging statement
        return view('livewire.dashboard.calendareventbreadcrumbs');
    }
}

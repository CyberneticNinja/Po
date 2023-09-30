<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class Form extends Component
{
    public $event_name = '';
    public $event_name_value = '';
    public $event_location = '';
    public $selectedTime = '';
    public $selectedDate = '';
    public $value = '';

    public function mount()
    {
        $this->event_name = 'Event Name';
        $this->event_name_value = 'some random value';
    }


    public function render()
    {
        return view('livewire.dashboard.form');
    }

    public function updated($property)
    {
        if($property === 'value')
        {
            $this->event_name_value = $property;
        }
    }
}

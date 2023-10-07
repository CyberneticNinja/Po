<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Event;
use Carbon\Carbon;

class ThisMonthsCalendarEvents extends Component
{
    public $events;
    public $startOfMonth;
    public $endOfMonth;

    public function render()
    {
        $today = Carbon::today();
        $this->startOfMonth = $today->startOfMonth()->toDateString();
        $this->endOfMonth = $today->endOfMonth()->toDateString();

        $this->events = Event::whereBetween('event_datetime', [$this->startOfMonth, $this->endOfMonth])
            ->orderBy('event_datetime', 'asc')
            ->get();
        return view('livewire.dashboard.this-months-calendar-events',['events'=>$this->events]);
    }
}

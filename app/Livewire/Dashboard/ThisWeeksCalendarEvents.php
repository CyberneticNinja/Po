<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Event;
use Carbon\Carbon;

class ThisWeeksCalendarEvents extends Component
{
    public $events;
    public $startOfWeek;
    public $endOfWeek;

    public function render()
    {
        $today = Carbon::today();
        $this->startOfWeek = $today->startOfWeek()->toDateString();
        $this->endOfWeek = $today->endOfWeek()->toDateString();

        $this->events = Event::whereBetween('event_datetime', [$this->startOfWeek, $this->endOfWeek])
            ->orderBy('event_datetime', 'asc')
            ->get();
        return view('livewire.dashboard.this-weeks-calendar-events',['events' =>$this->events]);
    }
}

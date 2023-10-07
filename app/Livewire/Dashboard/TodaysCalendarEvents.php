<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Event;
use Carbon\Carbon;

class TodaysCalendarEvents extends Component
{
    public $events;

    public function render()
    {
        $today = Carbon::today()->toDateString();
        $this->events = Event::whereDate('event_datetime', $today)
        ->orderBy('event_datetime', 'asc') // Sort events by ascending order (earlier times first)
        ->get();
        return view('livewire.dashboard.todays-calendar-events',['events'=>$this->events]);
    }
}

<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Event; // Import the Event model

class Form extends Component
{
    public $event_name = '';
    public $event_location = '';
    public $selectedTime = '';
    public $selectedDate = '';
    public $notes;
    public $eventTimeZone; // Default value is UTC
    public $timeZoneSelect;

    public function submit()
    {
        $this->validate([
            'event_name' => 'required',
            'event_location' => 'required',
            'selectedDate' => 'required|date',
            'selectedTime' => [
                'required',
                'regex:/^\d{2}:\d{2}$/',
            ],
        ]);

        // Get the currently authenticated user's ID
        $userId = auth()->user()->id;

        // Combine the selected date and time into a single DateTime instance
        $eventDateTime = Carbon::parse($this->selectedDate . ' ' . $this->selectedTime, $this->eventTimeZone);

        // // Save the event with the user_id
        Event::create([
            'event_name' => $this->event_name,
            'event_location' => $this->event_location,
            'event_datetime' => $eventDateTime,
            'notes' => $this->notes,
            'user_id' => $userId,
        ]);

        // Emit a success message
        session()->flash('success', 'Event saved successfully.');
    }


    public function updateSelectedTimeZone()
    {
        // Do something with the selected time zone, if needed
        // For example, you can use $this->eventTimeZone to access the selected time zone value
        // This method will be triggered when the time zone select field value changes
    }

    private function resetFormFields()
    {
        $this->event_name = '';
        $this->event_location = '';
        $this->selectedTime = '';
        $this->selectedDate = '';
        $this->notes = '';
        $this->eventTimeZone = 'UTC'; // Reset to default time zone or your desired default value
    }

    public function updatedSelectedDate($value)
    {
        // Date validation logic here
    }

    public function validateEventName()
    {
        $this->validate(['event_name' => 'required']);
    }

    public function validateEventLocation()
    {
        $this->validate(['event_location' => 'required']);
    }


    public function render()
    {
        return view('livewire.dashboard.form');
    }
}

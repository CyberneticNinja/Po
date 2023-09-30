@extends('dashboard.index')
@section('dashboard-body')

<livewire:dashboard.form />

@endsection

{{-- @extends('dashboard.index')
@section('dashboard-body')

<div class="flex justify-center items-center h-screen">
    <div class="bg-white p-6 rounded-lg shadow-md w-2/5">
        <!-- Your form content here -->
        <form>
            <!-- Other form fields -->
            <livewire:dashboard.generic-text-input label="Event Name" name="event_name" wire:model="event_name" />

            <livewire:dashboard.generic-text-input label="Event Location" name="event_location"
                wire:model="event_location" />
            <livewire:dashboard.time-picker wire:model="selectedTime" name="event-time" />

            <livewire:dashboard.date-picker wire:model="selectedDate" name="event-date" />

            <!-- Other form fields -->
            <br />
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Submit</button>
        </form>
    </div>
</div>

@endsection --}}
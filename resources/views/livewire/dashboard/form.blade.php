<!-- resources/views/livewire/dashboard/form.blade.php -->

<div class="flex justify-center items-center h-screen">
    <div class="bg-white p-6 rounded-lg shadow-md w-2/5">
        {{ $event_name }}
        {{ $selectedTime }}
        {{ $selectedDate }}
        <form wire:submit.prevent="submit">
            {{-- Event Name --}}
            <label class="block text-black font-medium mb-2" for="Event Name">Event Name</label>
            <input type="text" wire:model.lazy="event_name" id="event_name" name="event_name"
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" />
            {{-- Event Location --}}
            <label class="block text-black font-medium mb-2" for="Event Location">Event Location</label>
            <input type="text" wire:model.lazy="event_location" id="event_location" name="event_location"
                class="w-full px-4 py-2 selecborder rounded-md focus:outline-none focus:border-blue-500" />
            {{-- Time Picker --}}
            <label class="block text-black font-medium mb-2" for="email">Time picker</label>
            <input type="time" wire:model.lazy="selectedTime"
                class="w-1/2 px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" />
            {{-- Date Picker --}}
            <label class="block text-black font-medium mb-2" for="email">Date picker</label>
            <input type="date" wire:model.lazy="selectedDate"
                class="w-1/2 px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" step="60"/>
            <br />

        <br/>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Submit</button>
        </form>
    </div>
</div>
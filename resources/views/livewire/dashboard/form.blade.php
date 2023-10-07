<!-- resources/views/livewire/dashboard/form.blade.php -->

<div class="flex justify-center items-center h-screen">
    <div class="bg-white p-6 rounded-lg shadow-md w-2/5">
        @if (session()->has('success'))
        <div class="text-green-500">{{ session('success') }}</div>
        @endif
        <form wire:submit.prevent="submit">

            <!-- Event Name -->
            <label class="block text-black font-medium mb-2" for="event_name">Event Name</label>
            <input type="text" wire:model="event_name" id="event_name"
                name="event_name" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" />
                
                @error('event_name') <span class="text-red-500">{{ $message }}</span> @enderror

            <!-- Event Location -->
            <label class="block text-black font-medium mb-2" for="event_location">Event Location</label>
            <input type="text" wire:model="event_location" id="event_location"
                name="event_location"
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" />
            @error('event_location') <span class="text-red-500">{{ $message }}</span> @enderror

            {{-- Time Picker --}}
            <label class="block text-black font-medium mb-2" for="email">Time picker</label>
            <input type="time" wire:model.lazy="selectedTime"
                class="w-1/2 px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" />

            {{-- Date Picker --}}
            <label class="block text-black font-medium mb-2" for="email">Date picker</label>
            <input type="date" wire:model.lazy="selectedDate"
                class="w-1/2 px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" />
            @error('eventDate') <span class="text-red-500">{{ $message }}</span> @enderror


            {{-- TimeZone --}}
            <label class="block text-black font-medium mb-2" for="email">Time Zone</label>
            <select id="timeZoneSelect" wire:model="eventTimeZone" wire:change="updateSelectedTimeZone"
                class="w-1/2 px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                <option value="UTC" selected>UTC (Coordinated Universal Time)</option>
                <option value="America/New_York">Eastern Standard Time (EST)</option>
                <option value="America/Chicago">Central Standard Time (CST)</option>
                <option value="America/Phoenix">Mountain Standard Time (MST)</option>
                <option value="America/Los_Angeles">Pacific Standard Time (PST)</option>
                <option value="America/Anchorage">Alaska Standard Time (AKST)</option>
                <option value="America/Adak">Hawaii-Aleutian Standard Time (HST)</option>
            </select>
            <p>
                @error('selectedDate') <span class="text-red-500">{{ $message }}</span> @enderror
            </p>

            {{-- Notes Text Box --}}
            <label class="block text-black font-medium mt-4" for="notes">Notes</label>
            <textarea wire:model.lazy="notes" id="notes" name="notes"
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" rows="4"></textarea>
            <br />
            <br />

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Submit</button>
        </form>
    </div>
</div>
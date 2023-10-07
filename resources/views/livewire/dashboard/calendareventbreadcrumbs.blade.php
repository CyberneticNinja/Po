<div class="p-4">
    <ul class="flex space-x-4">
        <li>
            <a href="{{ route('dashboard-events-today') }}" wire:click="$set('activeTab', 'today')" class="{{ $activeTab === 'today' ? 'font-bold' : '' }}">Today's Events</a>
        </li>
        <li>
            <a href="{{ route('dashboard-events-week') }}" wire:click="$set('activeTab', 'week')" class="{{ $activeTab === 'week' ? 'font-bold' : '' }}">This Week's Events</a>
        </li>
        <li>
            <a href="{{ route('dashboard-events-month') }}" wire:click="$set('activeTab', 'month')" class="{{ $activeTab === 'month' ? 'font-bold' : '' }}">This Month's Events</a>
        </li>
    </ul>
</div>

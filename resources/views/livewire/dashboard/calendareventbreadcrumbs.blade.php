<div class="p-4">
    <ul class="flex space-x-4">
        <li>
            @if ( Route::currentRouteName() == 'dashboard-events-today')
            <a href="route('dashboard-events-today')" class="font-bold">Today's Events</a>
            @else
            <a href="{{ route('dashboard-events-today') }}">Today's Events</a>
            @endif
        </li>
        <li>
            @if ( Route::currentRouteName() == 'dashboard-events-week')
            <a href="{{ route('dashboard-events-week') }}" class="font-bold">Week's Events</a>
            @else
            <a href="{{ route('dashboard-events-week') }}">Weeks's Events</a>
            @endif
        </li>
        <li>
            @if ( Route::currentRouteName() == 'dashboard-events-month')
            <a href="{{ route('dashboard-events-month') }}" class="font-bold">Month's Events</a>
            @else
            <a href="{{ route('dashboard-events-month') }}">Month's Events</a>
            @endif
        </li>
    </ul>
</div>
<div class="p-4">
    <h2 class="font-bold text-xl mb-4">This Month's Calendar Events</h2>

    <p class="mb-2">Month: {{ $startOfMonth }} - {{ $endOfMonth }}</p>

    <ul class="list-disc ml-6">
        @foreach ($events as $event)
            <li class="mb-2">
                {{ $event->event_name }} - {{ $event->event_location }} - {{ \Carbon\Carbon::parse($event->event_datetime)->format('Y-m-d h:i A') }}
            </li>
        @endforeach
    </ul>
</div>

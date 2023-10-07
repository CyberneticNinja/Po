@extends('layouts.master.index')
@section('body')
<div class="bg-gray-900 text-white py-4">
    <div class="container mx-auto flex justify-between items-center">
        <ul class="flex space-x-6">
            <li>
                <a href="#" class="hover:text-gray-300">Home</a>
            </li>
            <li>
                <a href="#" class="hover:text-gray-300">About</a>
            </li>
            <li>
                <a href="#" class="hover:text-gray-300">Services</a>
            </li>
            <li>
                <a href="#" class="hover:text-gray-300">Contact</a>
            </li>
        </ul>
        <div>
            <a href="{{ route('dashboard-events-today') }}" class="hover:text-gray-300">Calendar</a>|
            <a href="{{ route('dashboard-create-event') }}" class="hover:text-gray-300">Create Calendar Event</a>|
            <a href="#" class="hover:text-gray-300">Edit Calendar Event</a>|
            <a href="#" class="ml-4 hover:text-gray-300">Logout</a>
        </div>
    </div>
</div>
<div class="pt-6">
        <livewire:dashboard.calendareventbreadcrumbs />

     @yield('dashboard-body')
</div>
@endsection
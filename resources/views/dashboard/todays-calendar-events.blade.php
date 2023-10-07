@extends('dashboard.index')
@section('dashboard-body')

    {{-- <livewire:dashboard.all-calendar-events /> --}}
    {{-- @php
        dump($activeTab);
    @endphp --}}
    <livewire:dashboard.todays-calendar-events />
@endsection
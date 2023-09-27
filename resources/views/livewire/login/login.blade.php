<!-- resources/views/livewire/login.blade.php -->
@extends('layouts.master.index')
@section('body')

<div class="max-w-sm mx-auto mt-10 p-4 bg-white rounded shadow-md">
    <form wire:submit.prevent="login">
        <div class="mb-4">
            <label for="email" class="block text-gray-600 font-semibold">Email</label>
            <input type="email" wire:model="email" id="email" class="form-input mt-1 block w-full" >
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-600 font-semibold">Password</label>
            <input type="password" wire:model="password" id="password" class="form-input mt-1 block w-full" >
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Login</button>
    </form>
    @if (session()->has('error'))
        <div class="text-red-500 mt-4">{{ session('error') }}</div>
    @endif
</div>
@endsection
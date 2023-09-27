<?php

// use App\Http\Livewire\Login\Login;
use App\Livewire\Login\Login;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Illuminate\Support\Facades\Session; 
use function Pest\Livewire\livewire;

it('cannot login with autheticated user', function () {
    $user = User::create([
        'name' => fake()->name(),
        'email' => fake()->unique()->safeEmail(),
        'email_verified_at' => now(),
        'password' => bcrypt('password'),
        'remember_token' => Str::random(10),
    ]);

    // Retrieve the CSRF token
    Session::start();
    $token = Session::token();

    // dump($token);
    // Initialize the Livewire component
    $response = Livewire::actingAs($user)
        ->test(Login::class)
        ->set('email', $user->email)
        ->set('password', $user->password)
        ->withHeaders(['X-CSRF-TOKEN' => $token]) // Include the CSRF token in the headers
        ->call('login');

    $response->assertHasErrors(['email']);
})->skip();

it('can go to login page',function(){
    $this->get(route('home'))->assertSuccessful();
});

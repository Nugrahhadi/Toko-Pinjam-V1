<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Livewire\Components\Navbar;
use Livewire\Livewire;
use Illuminate\Support\Facades\Session;

use Illuminate\Foundation\Testing\RefreshDatabase;

class LanguageToggleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test that the default locale is set to 'id'.
     */
    public function test_default_locale_is_id(): void
    {
        $this->get('/')
            ->assertStatus(200);
            
        $this->assertEquals('id', app()->getLocale());
    }

    /**
     * Test that the middleware changes the app locale based on the session value.
     */
    public function test_middleware_applies_locale_from_session(): void
    {
        // Simulate session having 'en' locale
        Session::put('locale', 'en');

        $this->withSession(['locale' => 'en'])
            ->get('/')
            ->assertStatus(200);

        $this->assertEquals('en', app()->getLocale());
    }

    /**
     * Test that the Navbar component has the setLocale method and updates session correctly.
     */
    public function test_navbar_can_toggle_locale(): void
    {
        Livewire::test(Navbar::class)
            ->call('setLocale', 'en')
            ->assertRedirect();

        $this->assertEquals('en', session()->get('locale'));
    }
}

<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends DuskTestCase
{
    // use RefreshDatabase;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Laravel');
        });
    }

    public function test_user_can_login()
    {
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'johndoe@email.com',
            'password' => bcrypt('secret'),
        ]);


        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'johndoe@email.com')
                ->type('password', 'secret')
                ->press('LOG IN')
                ->assertPathIs('/dashboard');
        });
    }
}

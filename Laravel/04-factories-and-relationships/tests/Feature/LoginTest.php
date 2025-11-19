<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_login_form(): void
    {
        $response = $this->get('/');
        $response->assertSeeText('Login');
        $response->assertStatus(200);
    }

    public function test_login_user(): void
    {
        $user = new User();
        $user->name = 'Amin';
        $user->email = "amin@el-rifai.com";
        $user->password = Hash::make('123');
        $user->save();

        $response = $this
            ->followingRedirects()
            ->post('login', [
                'email' => 'amin@el-rifai.com',
                'password' => '123',
            ]);

        $response->assertSeeText('Hello Amin!');
    }

    public function test_login_user_without_password(): void
    {
        $response = $this->followingRedirects()->post('login', [
            'email' => 'amin@el.se',
            'password' => '123'
        ]);
        $response->assertSeeText('Whoops!');
    }
}

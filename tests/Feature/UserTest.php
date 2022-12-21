<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserTest()
    {
        $response = $this->get('/users');

        $response->assertStatus(302);
    }
    public function testUserCreateTest()
    {
        $response = $this->get('/users/create');

        $response->assertStatus(302);
    }
    public function testUserChangePasswordTest()
    {
        $response = $this->get('/users/changepassword/1');

        $response->assertStatus(302);
    }
}

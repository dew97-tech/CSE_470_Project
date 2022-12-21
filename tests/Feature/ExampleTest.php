<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLoginTest()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
    
    // public function testSubjectsTest()
    // {
    //     $response = $this->get('/subjects');

    //     $response->assertStatus(200);
    // }
    // public function testTeachersTest()
    // {
    //     $response = $this->get('/teachers');

    //     $response->assertStatus(200);
    // }
    // public function testPotentialStudentTest()
    // {
    //     $response = $this->get('/potentials');

    //     $response->assertStatus(200);
    // }
}

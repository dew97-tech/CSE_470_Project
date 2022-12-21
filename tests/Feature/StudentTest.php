<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testStudentTest()
    {
        $response = $this->get('/students');

        $response->assertStatus(302);
    }
    public function testStudentCreateTest()
    {
        $response = $this->get('/students/create');

        $response->assertStatus(302);
    }
    
    public function testStudentShowTest()
    {
        $response = $this->get('/students/show/1');

        $response->assertStatus(302);
    }
}

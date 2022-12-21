<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TeacherTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testTeacherTest()
    {
        $response = $this->get('/teachers');

        $response->assertStatus(302);
    }
    public function testTeacherCreateTest()
    {
        $response = $this->get('/teachers/create');

        $response->assertStatus(302);
    }
    
    public function testTeacherEditTest()
    {
        $response = $this->get('/teachers/edit/1');

        $response->assertStatus(302);
    }
}

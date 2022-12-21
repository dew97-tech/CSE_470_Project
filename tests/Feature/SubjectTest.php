<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubjectTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSubjectTest()
    {
        $response = $this->get('/subjects');

        $response->assertStatus(302);
    }
    public function testSubjectCreateTest()
    {
        $response = $this->get('/subjects/create');

        $response->assertStatus(302);
    }
}

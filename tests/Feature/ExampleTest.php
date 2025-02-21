<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
<<<<<<< HEAD
     */
    public function test_the_application_returns_a_successful_response(): void
=======
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
>>>>>>> b5b341913682f0aafe2fe49ecdf59e60dd94dbe2
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}

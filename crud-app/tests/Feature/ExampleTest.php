<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_example()
    {
        $this->visit('/')
             ->see('Laravel')
             ->dontSee('Rails');
    }
}

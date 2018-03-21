<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function pin_does_not_display_in_same_row()
    {

    }
}

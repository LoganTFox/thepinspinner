<?php

namespace Tests\Feature;

use App\Pin;
use App\User;
use App\Board;
use App\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PinTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    use WithoutMiddleware;

    /** @test */
    public function user_can_see_their_pins()
    {
        $userOne = factory(User::class)->create();
        $userTwo = factory(User::class)->create();

        $pinOne = factory(Pin::class)->create([
            'user_id' => $userOne->id
        ]);
        $pinTwo = factory(Pin::class)->create([
            'user_id' => $userTwo->id
        ]);

        $response = $this->actingAs($userOne)->get('/pins');

        $response->assertSee($pinOne->title);
        $response->assertDontSee($pinTwo->title);
    }

    /** @test */
    public function user_can_see_create_pins_form()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->get('/pins/create');

        $response->assertSee('form');
    }

    /** @test */
    public function user_can_create_a_pin()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create([
            'user_id' => $user->id
        ]);
        $pin = factory(Pin::class)->make();

        $response = $this->actingAs($user)->post('/pins/create', [
            'user_id' => $user->id,
            'category_id' => $category->id,
            'title' => $pin->title,
            'link' => $pin->link
        ]);

        $response->assertRedirect('/pins');

        $this->assertDatabaseHas('pins', [
            'user_id' => $user->id,
            'category_id' => $category->id,
            'title' => $pin->title,
            'link' => $pin->link
        ]);
    }

    /** @test */
    public function user_can_see_pin_edit_form()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create([
            'user_id' => $user->id
        ]);
        $existingPin = factory(Pin::class)->create([
            'user_id' => $user->id,
            'category_id' => $category->id
        ]);

        $response = $this->actingAs($user)->get('/pins/update/'.$existingPin->id);

        $response->assertSee('form')
            ->assertSee($existingPin->title)
            ->assertSee($existingPin->link)
            ->assertSee($existingPin->category->title);
    }

    /** @test */
    public function user_can_edit_pin()
    {
        $category = factory(Category::class)->create();
        $pin = factory(Pin::class)->create();

        $response = $this->patch('/pins/update/'.$pin->id, [
            'title' => 'updated',
            'link' => 'updated',
            'category_id' => $category->id
        ]);

        $response->assertRedirect('/pins');

        $this->assertDatabaseHas('pins', [
            'title' => 'updated',
            'link' => 'updated'
        ]);
    }
}
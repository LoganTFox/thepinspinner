<?php

namespace Tests\Feature;

use App\User;
use App\Board;
use App\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BoardTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    use WithoutMiddleware;

    /** @test */
    public function user_can_see_their_boards()
    {
        $userOne = factory(User::class)->create();
        $userTwo = factory(User::class)->create();

        $boardOne = factory(Board::class)->create([
            'user_id' => $userOne->id
        ]);
        $boardTwo = factory(Board::class)->create([
            'user_id' => $userTwo->id
        ]);

        $response = $this->actingAs($userOne)->get('/boards');

        $response->assertSee($boardOne->title);
        $response->assertDontSee($boardTwo->title);
    }

    /** @test */
    public function user_can_see_create_boards_form()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->get('/boards/create');

        $response->assertSee('form');
    }

    /** @test */
    public function user_can_create_a_board()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create([
            'user_id' => $user->id
        ]);
        $board = factory(Board::class)->make();

        $response = $this->actingAs($user)->post('/boards/create', [
            'user_id' => $user->id,
            'category_id' => $category->id,
            'title' => $board->title,
            'link' => $board->link
        ]);

        $response->assertRedirect('/boards');

        $this->assertDatabaseHas('boards', [
            'user_id' => $user->id,
            'category_id' => $category->id,
            'title' => $board->title,
            'link' => $board->link
        ]);
    }

    /** @test */
    public function user_can_see_board_edit_form()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create([
            'user_id' => $user->id
        ]);
        $existingBoard = factory(Board::class)->create([
            'user_id' => $user->id,
            'category_id' => $category->id
        ]);

        $response = $this->actingAs($user)->get('/boards/update/'.$existingBoard->id);

        $response->assertSee('form')
                 ->assertSee($existingBoard->title)
                 ->assertSee($existingBoard->link)
                 ->assertSee($existingBoard->category->title);
    }

    /** @test */
    public function user_can_edit_board()
    {
        $category = factory(Category::class)->create();
        $board = factory(Board::class)->create();

        $response = $this->patch('/boards/update/'.$board->id, [
            'title' => 'updated',
            'link' => 'updated',
            'category_id' => $category->id
        ]);

        $response->assertRedirect('/boards');

        $this->assertDatabaseHas('boards', [
            'title' => 'updated',
            'link' => 'updated'
        ]);
    }
}
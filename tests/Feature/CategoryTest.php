<?php

namespace Tests\Feature;

use App\User;
use App\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    use WithoutMiddleware;

    /** @test */
    public function user_can_see_their_categories()
    {
        $userOne = factory(User::class)->create();
        $userTwo = factory(User::class)->create();

        $categoryOne = factory(Category::class)->create([
            'user_id' => $userOne->id
        ]);
        $categoryTwo = factory(Category::class)->create([
            'user_id' => $userTwo->id
        ]);

        $response = $this->actingAs($userOne)->get('/categories');

        $response->assertSee($categoryOne->title);
        $response->assertDontSee($categoryTwo->title);
    }

    /** @test */
    public function user_can_see_create_categories_form()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/categories/create');

        $response->assertSee('form')
                 ->assertSee('Add New Category');
    }

    /** @test */
    public function user_can_create_category()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->make();

        $response = $this->actingAs($user)->post('/categories/create', [
            'user_id' => $user->id,
            'title' => $category->title
        ]);

        $response->assertRedirect('/categories');

        $this->assertDatabaseHas('categories', [
            'user_id' => $user->id,
            'title' => $category->title
        ]);
    }

    /** @test */
    public function user_can_see_category_edit_form()
    {
        $existingCategory = factory(Category::class)->create();

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/categories/update/'.$existingCategory->id);

        $response->assertSee('form');
        $response->assertSee($existingCategory->title);
    }

    /** @test */
    public function user_can_edit_category()
    {
        $category = factory(Category::class)->create();

        $response = $this->patch('/categories/update/'.$category->id, [
            'title' => 'updated'
        ]);

        $response->assertRedirect('/categories');

        $this->assertDatabaseHas('categories', [
            'title' => 'updated'
        ]);
    }

//    /** @test */
//    public function user_can_delete_category()
//    {
//        $category = factory(Category::class)->create();
//
//        $response = $this->delete('/categories/delete/'.$category->id);
//
//        $response->assertRedirect('/categories');
//
//        $this->assertDatabaseMissing('categories', [
//            'id' => $category->id
//        ]);
//    }
}
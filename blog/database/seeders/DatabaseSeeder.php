<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create([
            'name' => 'John Doe'
        ]);
        Post::factory(10)->create([
            'user_id'=>$user->id
        ]);
       


        // -- Alternative method without factory -- // 

        // $user = User::factory()->create();

        // $personal = Category::create([
        //     'name'=>'Personal',
        //     'slug'=>'personal'
        // ]);

        // $family = Category::create([
        //     'name'=>'Family',
        //     'slug'=>'family'
        // ]);

        // $work = Category::create([
        //     'name'=>'Work',
        //     'slug'=>'work'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $family->id,
        //     'title' => 'My family Post',
        //     'slug' => 'my-first-post',
        //     'excerpt' => '<p>Lorem ipsum dolar sit amet.</p>',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti voluptatem voluptate autem alias, sequi sit eligendi, unde sed eos ab aperiam nisi eveniet? Eos beatae commodi, quas quos minus sequi?</p>' 
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $work->id,
        //     'title' => 'My work Post',
        //     'slug' => 'my-second-post',
        //     'excerpt' => '<p>Lorem ipsum dolar sit amet.</p>',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti voluptatem voluptate autem alias, sequi sit eligendi, unde sed eos ab aperiam nisi eveniet? Eos beatae commodi, quas quos minus sequi?</p>' 
        // ]);

    }
}

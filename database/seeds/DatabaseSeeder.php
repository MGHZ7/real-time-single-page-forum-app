<?php

use App\Model\Category;
use App\User;
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
        factory(User::class, 10)->create();
        factory(Category::class, 5)->create();
        factory(\App\Model\Question::class, 10)->create();
        factory(\App\Model\Reply::class, 50)->create()->each(
            function ($reply)
            {
                factory(\App\Model\Like::class, 1)->create(['reply_id' => $reply->id]);
            }
        );
    }
}

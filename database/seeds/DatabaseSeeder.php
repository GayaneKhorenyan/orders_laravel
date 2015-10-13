<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
         $this->call(PostsSeeder::class);

        Model::reguard();
    }
}

class PostsSeeder extends Seeder
{
    public function run()
    {
        DB::table('Posts')->delete();
        Post::create([
            'title'=>'First Post',
            'slug'=>'first-post',
            'excerpt'=>'<b> First Post Body</b>',
            'content'=>'<b> First Post Body</b>',
            'published'=>true,
            'published_at'=>DB::raw('CURRENT_TIMESTAMP')
        ]);

        Post::create([
            'title'=>'Second Post',
            'slug'=>'second-post',
            'excerpt'=>'<b> First Post Body</b>',
            'content'=>'<b> First Post Body</b>',
            'published'=>false,
            'published_at'=>DB::raw('CURRENT_TIMESTAMP')
        ]);

        Post::create([
            'title'=>'Third Post',
            'slug'=>'third-post',
            'excerpt'=>'<b> First Post Body</b>',
            'content'=>'<b> First Post Body</b>',
            'published'=>true,
            'published_at'=>DB::raw('CURRENT_TIMESTAMP')
        ]);
    }
}

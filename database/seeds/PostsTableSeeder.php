<?php

use App\Post;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post;
        $post->title = "Mi primer post";
        $post->url = Str::slug("Mi primer post", '_') . '_' . rand(1, 100);
        $post->excerpt = "Extracto de mi primer post";
        $post->body = "<p>Contenido de mi primer post</p>";
        $post->published_at = Carbon::now();
        $post->user_id = null;
        $post->save();

        sleep(1);

        $post = new Post;
        $post->title = "Mi segundo post";
        $post->url = Str::slug("Mi segundo post", '_') . '_' . rand(1, 100);
        $post->excerpt = "Extracto de mi segundo post sin fecha de publicacion";
        $post->body = "<p>Contenido de mi segundo post</p>";
        $post->published_at = null;
        $post->user_id = null;
        $post->save();

        sleep(1);

        $post = new Post;
        $post->title = "Mi tercer post";
        $post->url = Str::slug("Mi tercer post", '_') . '_' . rand(1, 100);
        $post->excerpt = "Extracto de mi tercer post";
        $post->body = "<p>Contenido de mi tercer post</p>";
        $post->published_at = Carbon::now();
        $post->user_id = null;
        $post->save();
        sleep(1);

        $post = new Post;
        $post->title = "Mi cuarto post";
        $post->url = Str::slug("Mi cuarto post", '_') . '_' . rand(1, 100);
        $post->excerpt = "Extracto de mi cuarto post";
        $post->body = "<p>Contenido de mi cuarto post</p>";
        $post->published_at = Carbon::now();
        $post->user_id = null;
        $post->save();

        sleep(1);

        $post = new Post;
        $post->title = "Mi quinto post";
        $post->url = Str::slug("Mi quinto post", '_') . '_' . rand(1, 100);
        $post->excerpt = "Extracto de mi quinto post";
        $post->body = "<p>Contenido de mi quinto post</p>";
        $post->published_at = Carbon::now();
        $post->user_id = null;
        $post->save();

        sleep(1);

        $post = new Post;
        $post->title = "Mi sexto post";
        $post->url = Str::slug("Mi sexto post", '_') . '_' . rand(1, 100);
        $post->excerpt = "Extracto de mi sexto post";
        $post->body = "<p>Contenido de mi sexto post</p>";
        $post->published_at = Carbon::yesterday();
        $post->user_id = null;
        $post->save();

        sleep(1);

        $post = new Post;
        $post->title = "Mi septimo post";
        $post->url = Str::slug("Mi septimo post", '_') . '_' . rand(1, 100);
        $post->excerpt = "Extracto de mi septimo post";
        $post->body = "<p>Contenido de mi septimo post</p>";
        $post->published_at = Carbon::now();
        $post->user_id = null;
        $post->save();

        sleep(1);

        $post = new Post;
        $post->title = "Mi octavo post";
        $post->url = Str::slug("Mi octavo post", '_') . '_' . rand(1, 100);
        $post->excerpt = "Extracto de mi octavo post";
        $post->body = "<p>Contenido de mi octavo post</p>";
        $post->published_at = Carbon::yesterday();
        $post->user_id = null;
        $post->save();

        sleep(1);

        $post = new Post;
        $post->title = "Mi noveno post";
        $post->url = Str::slug("Mi noveno post", '_') . '_' . rand(1, 100);
        $post->excerpt = "Extracto de mi noveno post";
        $post->body = "<p>Contenido de mi noveno post</p>";
        $post->published_at = Carbon::tomorrow();
        $post->user_id = null;        $post->save();

        sleep(1);

        $post = new Post;
        $post->title = "Mi decimo post";
        $post->url = Str::slug("Mi decimo post", '_') . '_' . rand(1, 100);
        $post->excerpt = "Extracto de mi decimo post";
        $post->body = "<p>Contenido de mi decimo post</p>";
        $post->published_at = Carbon::today();
        $post->user_id = null;
        $post->save();
    }
}

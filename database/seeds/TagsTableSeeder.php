<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = new Tag;
        $tag->name = "Impuestos";
        $tag->url = Str::slug('Impuestos');
        $tag->save();

        sleep(1);

        $tag = new Tag;
        $tag->name = "Dinero";
        $tag->url = Str::slug('Dinero');
        $tag->save();

        sleep(1);

        $tag = new Tag;
        $tag->name = "Noticias";
        $tag->url = Str::slug('Noticias');
        $tag->save();
    }
}

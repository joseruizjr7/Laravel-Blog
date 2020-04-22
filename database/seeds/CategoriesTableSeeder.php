<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category;
        $category->name = 'Economía';
        $category->url = Str::slug('Economía');
        $category->save();

        sleep(1);

        $category = new Category;
        $category->name = 'Contabilidad';
        $category->url = Str::slug('Contabilidad');
        $category->save();

        sleep(1);

        $category = new Category;
        $category->name = 'Tecnología';
        $category->url = Str::slug('Tecnología');
        $category->save();
    }
}

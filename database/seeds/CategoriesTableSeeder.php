<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Taskapp\Models\Category::class)->create(['user_id' => 1,'name' => 'Libros por leer']);
        factory(Taskapp\Models\Category::class)->create(['user_id' => 1, 'name' => 'Trabajo']);
        factory(Taskapp\Models\Category::class)->create(['user_id' => 1, 'name' => 'Estudios']);
    }
}

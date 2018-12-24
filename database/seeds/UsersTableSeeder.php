<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Taskapp\Models\User::class)->create([
            'name' => 'tavo',
            'email' => 'adolfz10@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        factory(Taskapp\Models\User::class, 7)->create();
    }
}

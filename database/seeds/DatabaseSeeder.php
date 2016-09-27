<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Pizza::class, 50)->create()->each(function($u) {
            $u->ingredients()->saveMany(factory(App\Ingredient::class, rand(2, 5))->make());
        });
    }
}

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
        factory(App\Models\User::class, 4)->create();

        // Create myself
        $user = App\Models\User::create([
            'name'                  => 'Brad Madigan',
            'email'                 => 'bradmadigan@gmail.com',
            'password'              => bcrypt('password')
        ]);
    }
}

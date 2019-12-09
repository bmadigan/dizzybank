<?php

use App\Domain\Users\Models\User;
use App\Domain\Accounts\Models\Account;
use Illuminate\Database\Seeder;

class AccountUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create some random accounts with users
        factory(Account::class, 5)->create()->each(function ($account) {
            $users = factory(User::class, rand(1, 2))->create();
            $users->map(function ($user) use ($account) {
                $account->users()->save($user);
            });
        });

        // My Account
        $account = Account::create([
            'account_name' => 'Savings Account',
        ]);
        $account->users();

        $me = $account->users()->save(factory(User::class)->create([
            'name'                  => 'Brad Madigan',
            'email'                 => 'bradmadigan@gmail.com',
            'password'              => bcrypt('password')
        ]));
    }
}

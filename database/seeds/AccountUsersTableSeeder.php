<?php

use App\Domain\Users\Models\User;
use Illuminate\Database\Seeder;
use App\Domain\Accounts\Models\Account;
use App\Domain\Accounts\Models\AccountType;

class AccountUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Initialize Account Types
        $this->addAccountTypes();

        // Create some random accounts with users
        $this->createSomeRandomAccounts();

        // My Account
        $this->createMyAccount();
    }

    protected function addAccountTypes()
    {
        AccountType::insert([
            ['type_name' => 'Unlimited Checking Account', 'short_name' => 'checking'],
            ['type_name' => 'Everyday Savings Account', 'short_name' => 'savings'],
            ['type_name' => 'Minimum Checking Account', 'short_name' => 'checking'],
            ['type_name' => 'High Interest Savings Account', 'short_name' => 'savings'],
            ['type_name' => 'Borderless Savings Plan Account', 'short_name' => 'savings'],
        ]);
    }

    protected function createSomeRandomAccounts()
    {
        factory(Account::class, 5)->create()->each(function ($account) {
            $users = factory(User::class, rand(1, 2))->create();
            $users->map(function ($user) use ($account) {
                $account->users()->save($user);
            });
        });
    }

    protected function createMyAccount()
    {
        $account = Account::create([
            'account_name' => 'Daily Checking Account',
            'account_type_id' => 1,
        ]);
        $account->users();

        $me = $account->users()->save(factory(User::class)->create([
            'name'                  => 'Brad Madigan',
            'email'                 => 'bradmadigan@gmail.com',
            'password'              => bcrypt('password')
        ]));
    }
}

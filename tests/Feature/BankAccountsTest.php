<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\Support\CreatesBankAccount;
use App\Domain\Accounts\Events\MoneyAdded;
use App\Domain\Accounts\Events\MoneySubtracted;
use Spatie\EventProjector\Facades\Projectionist;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Domain\Accounts\Projectors\AccountProjector;
use App\Domain\Accounts\Aggregates\AccountAggregate;

class BankAccountsTest extends TestCase
{
    use RefreshDatabase, CreatesBankAccount;

    protected function setUp(): void
    {
        parent::setUp();

        $this->signIn();
    }

    /** @test */
    public function money_can_be_added_to_account()
    {
        $activeAccount = $this->createsActiveAccount(auth()->user());

        AccountAggregate::fake()
            ->addMoney(5000)
            ->assertRecorded(new MoneyAdded(5000, $activeAccount->id));
    }

    /** @test */
    public function money_can_be_subtracted_to_account()
    {
        $activeAccount = $this->createsActiveAccount(auth()->user());

        AccountAggregate::fake()
            ->subtractMoney(4999)
            ->assertRecorded(new MoneySubtracted(4999, $activeAccount->id));
    }

    /** @test */
    // public function account_balance_is_properly_calculated()
    // {
    //     $activeAccount = $this->createsActiveAccount(auth()->user());

    //     $p = Projectionist::addProjector(AccountProjector::class);

    //     // Create some transactions
    //     $aggregateRoot = AccountAggregate::retrieve($activeAccount->uuid);
    //     $aggregateRoot->addMoney(5000);
    //     $aggregateRoot->addMoney(5000);
    //     $aggregateRoot->subtractMoney(4000);
    //     $aggregateRoot->persist();

    //     $activeAccount->fresh();

    //     $this->assertEquals(6000, $activeAccount->balance);
    // }
}

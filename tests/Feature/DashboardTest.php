<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\Support\CreatesBankAccount;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    use RefreshDatabase, CreatesBankAccount;

    protected function setUp(): void
    {
        parent::setUp();

        $this->signIn();
    }

    /** @test */
    public function dashboard_only_displays_active_accounts()
    {
        $activeAccount = $this->createsActiveAccount(auth()->user());
        $expiredAccount = $this->createsExpiredAccount(auth()->user());

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee($activeAccount->account_name);
        $response->assertDontSee($expiredAccount->account_name);
    }

}
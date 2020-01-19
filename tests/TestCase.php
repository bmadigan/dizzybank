<?php

namespace Tests;

use App\Domain\Users\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signIn($user = null, $attributes = [])
    {
        $user = $user ?: factory(User::class)->create($attributes);
        $this->actingAs($user);

        return $this;
    }
}

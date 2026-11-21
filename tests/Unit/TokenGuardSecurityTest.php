<?php

namespace Tests\Unit;

use Illuminate\Auth\TokenGuard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;

class TokenGuardSecurityTest extends TestCase
{
    public function test_non_string_request_token_is_rejected_without_querying_the_provider(): void
    {
        $provider = $this->createMock(UserProvider::class);
        $provider->expects($this->never())->method('retrieveByCredentials');

        $request = Request::create('/api/user', 'POST', [
            'api_token' => [0],
        ]);

        $guard = new TokenGuard($provider, $request);

        $this->assertNull($guard->user());
    }

    public function test_non_string_validation_credential_is_rejected_without_querying_the_provider(): void
    {
        $provider = $this->createMock(UserProvider::class);
        $provider->expects($this->never())->method('retrieveByCredentials');

        $guard = new TokenGuard($provider, Request::create('/'));

        $this->assertFalse($guard->validate([
            'api_token' => [0],
        ]));
    }
}

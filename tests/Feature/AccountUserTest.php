<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthManager;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Mockery;

class AccountUserTest extends TestCase
{
    public function testIndex()
    {
        $this->withoutExceptionHandling();


        $mockCategory = Mockery::mock('alias:App\Models\Category');
        $mockCategory->shouldReceive('all')->andReturn(collect());

        $mockPosition = Mockery::mock('alias:App\Models\Position');
        $mockPosition->shouldReceive('all')->andReturn(collect());

        $mockCart = Mockery::spy();
        $mockCart->shouldReceive('positions->count')->andReturn(0);

        $user = User::factory()->make();
        $user->cart = $mockCart;

        $this->be($user);

        $response = $this->get('/account');

        $response->assertStatus(200);

        $response->assertViewHas('categories');
        $response->assertViewHas('positions');
        $response->assertViewHas('user');
        $response->assertViewHas('positionCount');

        $response->assertViewIs('account.index');
    }
}
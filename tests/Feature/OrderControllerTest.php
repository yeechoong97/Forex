<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Tests\TestCase;
use App\Forum;
use App\Comment;
use App\User;
use App\Account;
use App\Order;
use App\Trades;
use Illuminate\Support\Facades\Hash;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function setUp():void {
        parent::setUp(); // performs set up
        $user = factory(User::class)->create();
        $this->be($user);
    }
    /**
     * @runInSeparateProcess
    */
    public function testOrderIndex()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('order/summary');
        $response->assertStatus(200);
        $response->assertViewHas('monthlySummary');
    }

        /**
     * @runInSeparateProcess
    */
    public function testOrderViewHistory()
    {
        $this->withoutExceptionHandling();
        $order = factory(Order::class)->create();
        $trades = factory(Trades::class)->create(['ticketID'=>$order->ticketID]);
        $response = $this->get('order/history');
        $response->assertStatus(200);
        $response->assertViewHas('trades');
    }

}

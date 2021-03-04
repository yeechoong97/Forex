<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use App\Forum;
use App\Comment;
use App\User;
use App\Account;
use App\Order;
use App\Trades;

class OrderModelTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /**
     * @runInSeparateProcess
    */
    public function OrderHasExpectedColumn()
    {
        $this->assertTrue( 
            Schema::hasColumns('order', [
                'user_id',
                'ticketID',
                'type',
                'pair',
                'margin',
                'total_units',
                'available_units',
                'entry_price',
                'status',
          ]), 1);
    }
    /**
     * @runInSeparateProcess
    */
    public function testOrderBelongsToAccount()
    {
        parent::setUp();
        $order = factory(Order::class)->create();
        $account = factory(Account::class)->create(['user_id'=> $order->user_id]);
        $this->assertInstanceOf(Account::class,$order->account);
    }

        /**
     * @runInSeparateProcess
    */
    public function testOrderHasManyTrades()
    {
        parent::setUp();
        $order = factory(Order::class)->create();
        $trades = factory(Trades::class)->create(['ticketID'=> $order->ticketID]);
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection',$order->trades);
    }
}

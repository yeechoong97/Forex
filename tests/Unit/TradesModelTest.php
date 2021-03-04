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

class TradesModelTest extends TestCase
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
    public function TradesHasExpectedColumn()
    {
        $this->assertTrue( 
            Schema::hasColumns('trades', [
                'ticketID',
                'units',
                'exit_price',
                'cost',
                'profit',
          ]), 1);
    }
    /**
     * @runInSeparateProcess
    */
    public function testTradesBelongsToOrder()
    {
        parent::setUp();
        $trades = factory(Trades::class)->create();
        $order = factory(Order::class)->create(['ticketID'=> $trades->ticketID]);
        $this->assertInstanceOf(Order::class,$trades->order);
    }
}

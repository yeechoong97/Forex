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

class AccountModelTest extends TestCase
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
    public function AccountsHasExpectedColumn()
    {
        $this->assertTrue( 
            Schema::hasColumns('accounts', [
                'user_id',
                'balance',
                'margin',
                'margin_used',
                'leverage',
          ]), 1);
    }
    /**
     * @runInSeparateProcess
    */
    public function testAccountBelongsToUser()
    {
        parent::setUp();
        $account = factory(Account::class)->create();
        $user = factory(User::class)->create(['user_id'=> $account->user_id]);
        $this->assertInstanceOf(User::class,$account->user);
    }
    

    /**
     * @runInSeparateProcess
    */
    public function testAccountHasManyOrder()
    {
        parent::setUp();
        $account = factory(Account::class)->create();
        $order = factory(Order::class)->create(['user_id'=> $account->user_id]);
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection',$account->order);
    }
}

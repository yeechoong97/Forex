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

class FundControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    protected $user;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function setUp():void {
        parent::setUp(); // performs set up
        $this->user = factory(User::class)->create();
        $this->be($this->user);
    }
    /**
     * @runInSeparateProcess
    */
    public function testFundIndex()
    {
        $this->withoutExceptionHandling();
        $account = factory(Account::class)->create(['user_id'=>$this->user->user_id]);
        $response = $this->get('fund');
        $response->assertStatus(200);
        $response->assertViewHas('account');
    }
    /**
     * @runInSeparateProcess
    */
    public function testExceptionHandlingFundIndex()
    {
        $this->withExceptionHandling();
        $response = $this->get('fund');
        $response->assertStatus(500);
    }
        /**
     * @runInSeparateProcess
    */
    public function testUpdateLeverage()
    {
        $this->withoutExceptionHandling();
        $account = factory(Account::class)->create(['user_id'=>$this->user->user_id]);
        $response = $this->put('fund/update',[
            'leverage' => $this->faker->randomElement(['50 : 1','40 : 1','30 : 1','20 : 1','10 : 1'])
        ]);
        $response->assertStatus(302);
        $response->assertSessionHas('alert', 'Leverage is updated successfully!');
    }
        /**
     * @runInSeparateProcess
    */
    public function testExceptionHandlingUpdateLeverage()
    {
        $this->withExceptionHandling();
        $response = $this->put('fund/update');
        $response->assertStatus(500);
    }
    /**
     * @runInSeparateProcess
    */
    public function testWithdrawIndex()
    {
        $this->withoutExceptionHandling();
        $account = factory(Account::class)->create(['user_id'=>$this->user->user_id]);
        $response = $this->get('fund/withdraw');
        $response->assertStatus(200);
        $response->assertViewHas('account');
    }
        /**
     * @runInSeparateProcess
    */
    public function testExceptionHandlingWithdrawIndex()
    {
        $this->withExceptionHandling();
        $response = $this->get('fund/withdraw');
        $response->assertStatus(500);
    }
    /**
     * @runInSeparateProcess
    */
    public function testWithdrawUpdate()
    {
        $this->withoutExceptionHandling();
        $account = factory(Account::class)->create(['user_id'=>$this->user->user_id]);
        $response = $this->put('fund/withdraw');
        $response->assertStatus(302);
        $response->assertSessionHas('alert', 'Balance is updated successfully!');
    }
    /**
     * @runInSeparateProcess
    */
    public function testExceptionHandlingWithdrawUpdate()
    {
        $this->withExceptionHandling();
        $response = $this->put('fund/withdraw');
        $response->assertStatus(500);
    }
    /**
     * @runInSeparateProcess
    */
    public function testDepositIndex()
    {
        $this->withoutExceptionHandling();
        $account = factory(Account::class)->create(['user_id'=>$this->user->user_id]);
        $response = $this->get('fund/deposit');
        $response->assertStatus(200);
        $response->assertViewHas('account');
    }
        /**
     * @runInSeparateProcess
    */
    public function testExceptionHandlingDepositIndex()
    {
        $this->withExceptionHandling();
        $response = $this->get('fund/deposit');
        $response->assertStatus(500);
    }
    /**
     * @runInSeparateProcess
    */
    public function testDepositUpdate()
    {
        $this->withoutExceptionHandling();
        $account = factory(Account::class)->create(['user_id'=>$this->user->user_id]);
        $response = $this->put('fund/deposit');
        $response->assertStatus(302);
        $response->assertSessionHas('alert', 'Balance is updated successfully!');
    }
    /**
     * @runInSeparateProcess
    */
    public function testExceptionHandlingDepositUpdate()
    {
        $this->withExceptionHandling();
        $response = $this->put('fund/deposit');
        $response->assertStatus(500);
    }


}

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

class MainControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
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
    public function testHomeIndex()
    {
        $this->withoutExceptionHandling();
        $account = factory(Account::class)->create(['user_id'=>$this->user->user_id]);
        $response = $this->get('index');
        $response->assertStatus(200);
        $response->assertViewHas('data');
    }

    /**
     * @runInSeparateProcess
    */
    public function testExceptionHandlingHomeIndex()
    {
        $this->withExceptionHandling();
        $response = $this->get('index');
        $response->assertStatus(500);
    }

        /**
     * @runInSeparateProcess
    */
    public function testHomeCreate()
    {
        $this->withoutExceptionHandling();
        $account = factory(Account::class)->create(['user_id'=>$this->user->user_id]);
        $order = factory(Order::class)->create(['ticketID' => "AOD".random_int(10,30)]);
        $orderObject = array(
            'instrument' =>$this->faker->randomElement(['EUR_USD','AUD_USD','GBP_USD','USD_JPY','EUR_JPY']),
            'unit' => $this->faker->numberBetween($min = 1, $max = 10000),
            'type' => $this->faker->randomElement(['sell','buy']),
            'entry' => $this->faker->randomFloat($nbMaxDecimals = 5, $min = 1, $max = 200),
            'exit' => $this->faker->randomFloat($nbMaxDecimals = 5, $min = 1, $max = 200),
            'margin' =>$this->faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = null),
            'leverage' => $this->faker->randomElement([10,20,30,40,50]),
            'USDJPYSell' => $this->faker->randomFloat($nbMaxDecimals = 5, $min = 1, $max = 200),
            'USDJPYBuy'=>$this->faker->randomFloat($nbMaxDecimals = 5, $min = 1, $max = 200),
            'EURJPYSell' =>$this->faker->randomFloat($nbMaxDecimals = 5, $min = 1, $max = 200),
            'EURJPYBuy' => $this->faker->randomFloat($nbMaxDecimals = 5, $min = 1, $max = 200)
        );
        $response = $this->post('index/store',[
            "orderObject" => $orderObject,
        ]);
        $response->assertStatus(200);
        $response->assertJsonCount(1);
    }

    /**
     * @runInSeparateProcess
    */
    public function testExceptionHandlingHomeCreate()
    {
        $this->withExceptionHandling();
        $account = factory(Account::class)->create(['user_id'=>$this->user->user_id]);
        $order = factory(Order::class)->create();
        $response = $this->post('index/store',[]);
        $response->assertStatus(500);
    }

    /**
     * @runInSeparateProcess
    */
    public function testHomeClose()
    {
        $this->withoutExceptionHandling();
        $account = factory(Account::class)->create(['user_id'=>$this->user->user_id]);
        $order = factory(Order::class)->create();
        $orderObject = array(
            'ticketID' => $order->ticketID,
            'margin' =>$this->faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = null),
            'remaining_units' => $this->faker->numberBetween($min = 1, $max = 10000),
            'entry' => $this->faker->randomFloat($nbMaxDecimals = 5, $min = 1, $max = 200),
            'exit' => $this->faker->randomFloat($nbMaxDecimals = 5, $min = 1, $max = 200),
            'cost' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = null),
            'profit' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = null),
            'leverage' => $this->faker->randomElement([10,20,30,40,50]),
        );
        $response = $this->put('index/close',[
            "orderObject" => $orderObject,
        ]);
        $response->assertStatus(200);
        $response->assertJson([
            'message' => "Orders have been reduced/closed successfully."
        ]);
    }

    /**
     * @runInSeparateProcess
    */
    public function testExceptionHandlingHomeClose()
    {
        $this->withExceptionHandling();
        $account = factory(Account::class)->create(['user_id'=>$this->user->user_id]);
        $order = factory(Order::class)->create();
        $response = $this->put('index/close',[]);
        $response->assertStatus(500);
    }

    /**
     * @runInSeparateProcess
    */
    public function testGetCandle()
    {
        $this->withoutExceptionHandling();
        $account = factory(Account::class)->create(['user_id'=>$this->user->user_id]);
        $order = factory(Order::class)->create();
        $chartObject = array(
            'instrument' => $this->faker->randomElement(['EUR_USD','AUD_USD','GBP_USD','USD_JPY','EUR_JPY']),
            'interval' => $this->faker->randomElement(["S5","S10","S15","S30","M1","M2","M5","M10","M15","M30","H1","H2","H3","H4","H6","H8","H12","D","W","M"]),
        );
        $response = $this->post('index/data',[
            'chartObject'=>$chartObject
        ]);
        $response->assertStatus(200);
        $response->assertJsonCount(1);
    }

        /**
     * @runInSeparateProcess
    */
    public function testExceptionHandlingGetCandle()
    {
        $this->withExceptionHandling();
        $account = factory(Account::class)->create(['user_id'=>$this->user->user_id]);
        $order = factory(Order::class)->create();
        $response = $this->post('index/data',[]);
        $response->assertStatus(500);
    }

        /**
     * @runInSeparateProcess
    */
    public function testChangeSeries()
    {
        $this->withoutExceptionHandling();
        $account = factory(Account::class)->create(['user_id'=>$this->user->user_id]);
        $order = factory(Order::class)->create();
        $chartObject = array(
            'instrument' => $this->faker->randomElement(['EUR_USD','AUD_USD','GBP_USD','USD_JPY','EUR_JPY']),
            'interval' => $this->faker->randomElement(["S5","S10","S15","S30","M1","M2","M5","M10","M15","M30","H1","H2","H3","H4","H6","H8","H12","D","W","M"]),
        );
        $response = $this->post('index/chart',[
            'chartObject'=>$chartObject
        ]);
        $response->assertStatus(200);
        $response->assertJsonCount(2);
    }

            /**
     * @runInSeparateProcess
    */
    public function testExceptionHandlingChangeSeries()
    {
        $this->withExceptionHandling();
        $account = factory(Account::class)->create(['user_id'=>$this->user->user_id]);
        $order = factory(Order::class)->create();
        $response = $this->post('index/chart',[]);
        $response->assertStatus(500);
    }

    /**
     * @runInSeparateProcess
    */
    public function testSetTutorial()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('index/tutorial',[
            'status '=> $this->faker->randomElement([true,false])
        ]);
        $response->assertStatus(200);
    }

        /**
     * @runInSeparateProcess
    */
    public function testgetCurrencyRate()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('index/rate');
        $response->assertStatus(200);
        $response->assertJsonCount(1);
    }
}

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

class ElearningControllerTest extends TestCase
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
    public function testElearning()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('learning/search',[
            $search = "Forex"
        ]);
        $response->assertStatus(200);
        $response->assertViewHas('result');
    }
}

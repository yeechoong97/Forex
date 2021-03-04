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

class UserModelTest extends TestCase
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
    public function UserHasExpectedColumn()
    {
        $this->assertTrue( 
            Schema::hasColumns('user', [
                'name','user_id','username','phone','avatar','email', 'tutorial','password',
          ]), 1);
    }
    /**
     * @runInSeparateProcess
    */
    public function testUserHasAccount()
    {
        parent::setUp();
        $user = factory(User::class)->create();
        $account = factory(Account::class)->create(['user_id'=> $user->user_id]);
        $this->assertInstanceOf(Account::class,$user->account);
    }

    /**
     * @runInSeparateProcess
    */
    public function testUserHasManyForum()
    {
        parent::setUp();
        $user = factory(User::class)->create();
        $forum = factory(Forum::class)->create(['user_id'=> $user->user_id]);
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection',$user->forum);
    }

   /**
     * @runInSeparateProcess
    */
    public function testUserHasManyComment()
    {
        parent::setUp();
        $user = factory(User::class)->create();
        $comment = factory(Comment::class)->create(['user_id'=> $user->user_id]);
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection',$user->comment);
    }



}

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

class ForumModelTest extends TestCase
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
    public function ForumHasExpectedColumn()
    {
        $this->assertTrue( 
            Schema::hasColumns('forum', [
                'forum_id',
                'user_id',
                'tag',
                'title',
                'contents'
          ]), 1);
    }
        /**
     * @runInSeparateProcess
    */
    public function testForumBelongsToUser()
    {
        parent::setUp();
        $forum = factory(Forum::class)->create();
        $user = factory(User::class)->create(['user_id'=> $forum->user_id]);
        $this->assertInstanceOf(User::class,$forum->user);
    }

    /**
 * @runInSeparateProcess
    */
    public function testForumHasManyComment()
    {
        parent::setUp();
        $forum = factory(Forum::class)->create();
        $comment = factory(Comment::class)->create(['forum_id'=> $forum->forum_id]);
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection',$forum->comment);
    }
}

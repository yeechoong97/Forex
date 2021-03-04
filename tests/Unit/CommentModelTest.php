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

class CommentModelTest extends TestCase
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
    public function CommentHasExpectedColumn()
    {
        $this->assertTrue( 
            Schema::hasColumns('comment', [
                'forum_id',
                'comment_id',
                'user_id',
                'contents'
          ]), 1);
    }
    /**
     * @runInSeparateProcess
    */
    public function testCommentBelongsToUser()
    {
        parent::setUp();
        $comment = factory(Comment::class)->create();
        $user = factory(User::class)->create(['user_id'=> $comment->user_id]);
        $this->assertInstanceOf(User::class,$comment->user);
    }

    /**
     * @runInSeparateProcess
    */
    public function testCommentBelongsToForum()
    {
        parent::setUp();
        $comment = factory(Comment::class)->create();
        $forum = factory(Forum::class)->create(['forum_id'=> $comment->forum_id]);
        $this->assertInstanceOf(Forum::class,$comment->forum);
    }
}

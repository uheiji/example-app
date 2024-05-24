<?php

namespace Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use App\Services\TweetService;
use Mockery;

class TweetServiceTest extends TestCase
{
    /**
     * @runInSeparateProcess
     * A basic unit test example.
     */
    public function test_check_own_tweet(): void
    {
        $tweetService = new TweetService();

        $mock = Mockery::mock('alias:app\Models\Tweet');
        $mock->ShouldReceive('where->first')->andReturn((object)[
            'id' => 1,
            'user_id' => 1
        ]);

        $result = $tweetService->checkOwnTweet(1,1);
        $this->assertTrue($result);

        $result = $tweetService->checkOwnTweet(2,1);
        $this->assertFalse($result);

    }
}

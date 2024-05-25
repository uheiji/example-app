<?php

namespace Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use App\Services\TweetService;
use Mockery;
use App\Modules\ImageUpload\ImageManagerInterface;

class TweetServiceTest extends TestCase
{
    /**
     * @runInSeparateProcess
     * A basic unit test example.
     */
    public function test_check_own_tweet(): void
    {

        $mock = Mockery::mock('alias:app\Models\Tweet');
        $mock->ShouldReceive('where->first')->andReturn((object)[
            'id' => 1,
            'user_id' => 1
        ]);

        $imageManager = mockery::mock(ImageManagerInterFace::class);
        $tweetService = new TweetService($imageManager);

    }
}

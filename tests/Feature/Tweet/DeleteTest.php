<?php

namespace Tests\Feature\Tweet;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Tweet;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class DeleteTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * A basic feature test example.
     */
    public function test_delete_successed()
    {
        // ユーザーを作成して認証
        $user = User::factory()->create();

        // 削除するツイートを作成
        $tweet = Tweet::factory()->create([
            'user_id' => $user->id,
        ]);

        // ユーザーを認証
        $this->actingAs($user);

        // DELETEリクエストを送信
        $response = $this->delete('/tweet/delete/' . $tweet->id);

        // リダイレクト先を確認
        $response->assertRedirect('/tweet');
    }
}

<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Http\Requests\Tweet\UpdateRequest;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request)
    {
        $tweetId = $request->route('tweetId');
        $tweet = Tweet::findOrFail($tweetId);
        $tweet->content = $request->input('tweet');
        $tweet->save();

        return redirect()
            ->route('tweet.update.index', ['tweetId' => $tweet->id])
            ->with('feedback.success', 'つぶやきを編集しました');
    }
}

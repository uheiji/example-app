@if($myTweet)
<details class="tweet-option relative text-gray-500">
    <summary>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path d="M10 6a2 2 0 100 4 2 2 0 000-4zM10 12a2 2 0 110 4 2 2 0 010-4zM10 2a2 2 0 110 4 2 2 0 010-4z" />
        </svg>
    </summary>
    <div class="bg-white rounded shadow-md absolute right-0 w-24 z-20 pt-1 pb-1">
        <a href="{{ route('tweet.update.index', ['tweetId' => $tweetId]) }}" class="flex items-center pt-1 pb-1 pl-3 pr-3 hover:bg-gray-100">
            <span>編集</span>
        </a>
        <div>
            <form action="{{ route('tweet.delete', ['tweetId' => $tweetId]) }}" method="post" onclick="return confirm('削除してもよろしいですか？');">
                @csrf
                @method('DELETE')
                <button type="submit" class="flex items-center w-full pt-1 pb-1 pl-3 pr-3 hover:bg-gray-100">
                    <span>削除</span>
                </button>
            </form>
        </div>
    </div>
</details>
@endif

@once
@push('css')
<style>
    .tweet-option > summary{
        list-style: none;
        cursor: pointer;
    }
    .tweet-option[open] > summary::before{
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 10;
        display: block;
        content: "";
        background: transparent;
    }
</style>
@endpush
@endonce

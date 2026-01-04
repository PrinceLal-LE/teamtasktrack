<div class="space-y-4">
    @foreach($record->comments as $comment)
        <div class="flex gap-3">
            <div class="flex-shrink-0">
                <div class="w-8 h-8 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-xs font-bold">
                    {{ substr($comment->user->name, 0, 2) }}
                </div>
            </div>
            <div class="flex-1 space-y-1">
                <div class="flex items-center justify-between">
                    <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $comment->user->name }}</h3>
                    <p class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
                <div class="text-sm text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-800 p-2 rounded-lg border border-gray-200 dark:border-gray-700">
                    {!! $comment->body !!}
                </div>
            </div>
        </div>
    @endforeach
    
    @if($record->comments->isEmpty())
        <div class="text-center text-sm text-gray-500 py-4">
            No comments yet. Start the conversation!
        </div>
    @endif
</div>
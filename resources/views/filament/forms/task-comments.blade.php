<div class="space-y-4" wire:key="comments-container">
    @if(isset($record) && $record && $record->relationLoaded('comments'))
        @foreach($record->comments as $comment)
            <div class="flex gap-3 group/comment" wire:key="comment-{{ $comment->id }}">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-xs font-bold">
                        {{ substr($comment->user->name, 0, 2) }}
                    </div>
                </div>
                <div class="flex-1 space-y-1">
                    <div class="flex items-center justify-between">
                        <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $comment->user->name }}</h3>
                        <div class="flex items-center gap-2">
                            <div class="text-xs text-gray-500">
                                <div>{{ $comment->created_at->format('M d, Y') }}</div>
                                <div class="text-[10px]">{{ $comment->created_at->format('h:i A') }}</div>
                                @if($comment->edited_at)
                                    <div class="text-[10px] text-orange-500 italic">(edited)</div>
                                @endif
                            </div>
                            @if($comment->user_id === auth()->id())
                                <div class="flex items-center gap-1 opacity-0 group-hover/comment:opacity-100 transition-opacity">
                                    @if($this->editingCommentId !== $comment->id)
                                        <button
                                            type="button"
                                            wire:click="startEditComment({{ $comment->id }})"
                                            class="text-blue-500 hover:text-blue-700 text-xs p-1"
                                            title="Edit comment"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </button>
                                        <button
                                            type="button"
                                            x-on:click="
                                                Swal.fire({
                                                    title: 'Are you sure?',
                                                    text: 'You won\'t be able to revert this!',
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#d33',
                                                    cancelButtonColor: '#3085d6',
                                                    confirmButtonText: 'Yes, delete it!'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        $wire.deleteComment({{ $comment->id }});
                                                    }
                                                });
                                            "
                                            class="text-red-500 hover:text-red-700 text-xs p-1"
                                            title="Delete comment"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    @else
                                        <button
                                            type="button"
                                            wire:click="updateComment({{ $comment->id }})"
                                            class="text-green-500 hover:text-green-700 text-xs p-1"
                                            title="Save comment"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </button>
                                        <button
                                            type="button"
                                            wire:click="cancelEditComment"
                                            class="text-gray-500 hover:text-gray-700 text-xs p-1"
                                            title="Cancel editing"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                    @if($this->editingCommentId === $comment->id)
                        <div wire:key="editing-comment-{{ $comment->id }}" class="space-y-2">
                            <textarea
                                wire:model.live="editingCommentBody"
                                class="w-full rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500 text-sm"
                                rows="4"
                            ></textarea>
                        </div>
                    @else
                        <div class="text-sm text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-800 p-2 rounded-lg border border-gray-200 dark:border-gray-700">
                            {!! $comment->body !!}
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
        
        @if($record->comments->isEmpty())
            <div class="text-center text-sm text-gray-500 py-4">
                No comments yet. Start the conversation!
            </div>
        @endif
    @else
        <div class="text-center text-sm text-gray-500 py-4">
            No comments available.
        </div>
    @endif
</div>
<div class="max-w-lg mx-auto my-16 border border-slate-200 rounded-xl overflow-hidden">
    <div class="h-[400px] bg-gradient-to-t from-slate-100 p-6 flex space-y-1.5 overflow-scroll flex-col-reverse">
        <div class="flex flex-col">
            @foreach($messages as $key => $message)
                @if ($message['role'] === 'user')
                    <div class="w-3/4 space-y-0.5 self-end">
                        <div class="text-xs text-right">You</div>
                        <div class="bg-slate-800 text-slate-50 rounded-xl rounded-tr-none px-3 py-1.5 text-sm">
                            {{ $message['content'] }}
                        </div>
                    </div>
                @endif

                @if ($message['role'] === 'assistant')
                    <livewire:chat-response :key="$key" :messages="$messages" :prompt="$messages[$key - 1]" />
                @endif
            @endforeach
        </div>
    </div>
    <form wire:submit="send" class="bg-slate-100 p-3 border-t border-slate-200 flex space-x-2">
        <div class="bg-white rounded-full grow relative flex items-center h-10 focus-within:ring-2 ring-inset ring-blue-500">
            <input class="bg-transparent rounded-full grow px-4 py-2 text-sm h-10 focus:outline-0" placeholder="Ask me anything" wire:model="body" />
            <button class="bg-slate-800 text-slate-50 rounded-3xl text-sm font-medium size-10 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                    <path d="M3.105 2.288a.75.75 0 0 0-.826.95l1.414 4.926A1.5 1.5 0 0 0 5.135 9.25h6.115a.75.75 0 0 1 0 1.5H5.135a1.5 1.5 0 0 0-1.442 1.086l-1.414 4.926a.75.75 0 0 0 .826.95 28.897 28.897 0 0 0 15.293-7.155.75.75 0 0 0 0-1.114A28.897 28.897 0 0 0 3.105 2.288Z" />
                </svg>
            </button>
        </div>
    </form>
</div>

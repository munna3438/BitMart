{{-- Floating launcher --}}
<button
    type="button"
    data-ai-trigger
    class="fixed bottom-20 right-4 z-50 flex items-center gap-2 rounded-full bg-ai-600 py-3 pl-3.5 pr-4 text-sm font-semibold text-white shadow-md transition hover:bg-ai-700 active:scale-95 md:bottom-6 lg:right-6"
    aria-label="Ask BitMart AI"
>
    <x-icon name="sparkles" class="size-4.5" />
    Ask BitMart AI
</button>

<div data-ai-sheet class="pointer-events-none fixed inset-0 z-[60] hidden">
    <div data-ai-backdrop class="absolute inset-0 bg-neutral-950/40 opacity-0 transition-opacity duration-200"></div>

    <div class="pointer-events-auto absolute inset-x-0 bottom-0 mx-auto flex max-h-[80vh] flex-col rounded-t-2xl bg-white shadow-lg sm:max-w-xl lg:inset-x-auto lg:right-6 lg:bottom-6 lg:w-[400px] lg:rounded-2xl">
        <div class="flex items-center justify-between border-b border-neutral-100 px-4 py-3">
            <div class="flex items-center gap-2.5">
                <span class="flex size-9 items-center justify-center rounded-full bg-ai-50 text-ai-600">
                    <x-icon name="sparkles" class="size-5" />
                </span>
                <div>
                    <p class="text-sm font-semibold text-neutral-900">BitMart AI</p>
                    <p class="text-xs text-neutral-500">Smart shopping assistant</p>
                </div>
            </div>
            <button type="button" data-ai-close class="inline-flex size-9 items-center justify-center rounded-md text-neutral-500 transition hover:bg-neutral-100" aria-label="Close BitMart AI">
                <x-icon name="x" class="size-5" />
            </button>
        </div>

        <div data-ai-messages class="flex-1 space-y-3 overflow-y-auto px-4 py-4">
            <div class="max-w-[85%] rounded-2xl rounded-bl-md bg-neutral-100 px-3.5 py-2.5 text-sm text-neutral-700">
                Hi! I'm BitMart AI. Tell me what you're looking for — try a suggestion below.
            </div>
        </div>

        <div class="px-4">
            <div class="flex flex-wrap gap-2 pb-3" data-ai-suggestions>
                @foreach([
                    'Find something under ৳1,500',
                    'Help me choose a gift',
                    'Find an outfit for a casual event',
                    'Show popular products',
                ] as $chip)
                    <button type="button" data-ai-prompt="{{ $chip }}" class="rounded-full border border-ai-200 bg-ai-50 px-3 py-1.5 text-xs font-medium text-ai-700 transition hover:bg-ai-100">
                        {{ $chip }}
                    </button>
                @endforeach
            </div>
        </div>

        <div class="border-t border-neutral-100 p-3">
            <div class="flex items-center gap-2">
                <input
                    type="text"
                    data-ai-input
                    autocomplete="off"
                    placeholder="Ask BitMart AI…"
                    class="h-11 flex-1 rounded-full border border-neutral-300 bg-neutral-100/60 px-4 text-sm text-neutral-800 placeholder:text-neutral-400 focus:border-ai-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-ai-500/30"
                >
                <button type="button" data-ai-send class="inline-flex size-11 shrink-0 items-center justify-center rounded-full bg-ai-600 text-white transition hover:bg-ai-700 active:scale-95" aria-label="Send message">
                    <x-icon name="arrow-right" class="size-5" />
                </button>
            </div>
        </div>
    </div>
</div>
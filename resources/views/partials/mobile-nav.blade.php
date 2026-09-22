<nav class="fixed inset-x-0 bottom-0 z-50 border-t border-neutral-200 bg-white/95 backdrop-blur supports-[backdrop-filter]:bg-white/85 lg:hidden" aria-label="Primary">
    <div class="grid grid-cols-5">
        <a href="#" class="flex flex-col items-center gap-0.5 py-2.5 text-primary-700" aria-current="page">
            <x-icon name="home" class="size-5.5" />
            <span class="text-[11px] font-semibold">Home</span>
        </a>
        <button type="button" data-menu-toggle-mobile class="flex flex-col items-center gap-0.5 py-2.5 text-neutral-500 hover:text-neutral-700">
            <x-icon name="grid" class="size-5.5" />
            <span class="text-[11px] font-semibold">Categories</span>
        </button>
        <button type="button" data-search-open class="relative flex flex-col items-center gap-0.5 py-2.5 text-neutral-500 hover:text-neutral-700">
            <x-icon name="search" class="size-5.5" />
            <span class="text-[11px] font-semibold">Search</span>
        </button>
        <button type="button" data-ai-trigger class="relative flex flex-col items-center gap-0.5 py-2.5 text-neutral-500 transition hover:text-ai-600">
            <span class="relative">
                <span class="absolute -right-2 -top-1.5 rounded-full bg-ai-600 px-1 text-[9px] font-bold text-white">AI</span>
                <x-icon name="sparkles" class="size-5.5 text-ai-600" />
            </span>
            <span class="text-[11px] font-semibold">AI</span>
        </button>
        <button type="button" data-account-nav class="flex flex-col items-center gap-0.5 py-2.5 text-neutral-500 hover:text-neutral-700">
            <x-icon name="user" class="size-5.5" />
            <span class="text-[11px] font-semibold">Account</span>
        </button>
    </div>
</nav>
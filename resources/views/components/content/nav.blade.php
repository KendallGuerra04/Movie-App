<nav class="relative max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8 bg-slate-950"
    aria-label="Global">
    <div class="flex items-center justify-between">
        <a class="flex-none text-xl font-semibold text-white dark:text-white" href="{{ route('home') }}"
            aria-label="Brand"><i class="fa-solid fa-clapperboard" style="color: #ffffff;"></i> Movie
            app</a>
        <div class="sm:hidden">
            <button type="button"
                class="hs-collapse-toggle size-9 flex justify-center items-center text-sm font-semibold rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-neutral-700 dark:hover:bg-neutral-700"
                data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation"
                aria-label="Toggle navigation">
                <svg class="hs-collapse-open:hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" x2="21" y1="6" y2="6" />
                    <line x1="3" x2="21" y1="12" y2="12" />
                    <line x1="3" x2="21" y1="18" y2="18" />
                </svg>
                <svg class="hs-collapse-open:block hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18" />
                    <path d="m6 6 12 12" />
                </svg>
            </button>
        </div>
    </div>
    <div id="navbar-collapse-with-animation"
        class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
        <div class="flex flex-col sm:flex-row sm:items-center py-2 md:py-0 sm:ps-7">
            <a class="py-3 ps-px sm:px-3 sm:py-6 font-medium text-white hover:text-gray-500 dark:text-white dark:hover:text-neutral-500"
                href="{{ route('home') }}" aria-current="page">Home</a>
            <a class="py-3 ps-px sm:px-3 sm:py-6 font-medium text-white hover:text-gray-500 dark:text-white dark:hover:text-neutral-500"
                href="{{ route('movies') }}">Movies</a>
            <a class="py-3 ps-px sm:px-3 sm:py-6 font-medium text-white hover:text-gray-500 dark:text-white dark:hover:text-neutral-500"
                href="{{ route('series') }}">Tv Series</a>

        </div>
    </div>
</nav>

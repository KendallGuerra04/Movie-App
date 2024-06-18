@php
    $page--;
@endphp
@if ($page >= 1)
    <a href="{{ route($rout, ['page' => $page]) }}"
        class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-1.5 text-sm rounded-lg text-white hover:text-black hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
        <svg aria-hidden="true" class="hidden flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="m15 18-6-6 6-6"></path>
        </svg>
        <span>Previous</span>
    </a>
@endif
<div class="flex items-center gap-x-1">
    @for ($i = 1; $i <= 10; $i++)
        <a href="{{ route($rout, ['page' => $i]) }}"
            class="min-h-[38px] min-w-[38px] flex justify-center items-center text-white hover:text-black hover:bg-gray-100 py-2 px-3 text-sm rounded-lg focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10"
            aria-current="page">{{ $i }}</a>
    @endfor

</div>
@php
    $page++;
@endphp
@if ($page <= 10)
    <a href="{{ route($rout, ['page' => $page]) }}"
        class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-1.5 text-sm rounded-lg text-white hover:text-black hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
        <span>Next</span>
        <svg aria-hidden="true" class="hidden flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6"></path>
        </svg>
    </a>
@endif

@php($p = $paginator)
@if ($p->hasPages())
    <div class="px-6 py-4 border-t border-gray-208">
        <nav aria-label="Page navigation">
            <ul class="flex-space-x-px text-sm">
                @if ($p->onFirstPage())
                    <li>
                        <span
                            class="flex items-center justify-center text-gray-400 bg-gray-108 box-border border border-gray-300 cursor-not-allowed font-medium rounded-s-base text-sm px-3 h-18">Previous</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $p->previousPageUrl() }}"
                            class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover: text-heading font-medium rounded-s-base text-sm px-3 h-18 focus:outline-none">Previous</a>
                    </li>
                @endif

                @foreach ($p->getUrlRange(1, $p->lastPage()) as $page => $url)
                    @if ($page == $p->currentPage())
                        <li>
                            <a href="{{ $url }}" aria-current="page"
                                class="flex items-center justify-center text-fg-brand bg-neutral-tertiary-medium box-border border border-default-medium hover: text-fg-brand font-medium text-sm w-10 h-10 focus:outline-none">{{ $page }}</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}"
                                class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover: text-heading font-medium text-sm w-18 h-18 focus: outline-none">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach

                @if ($p->hasMorePages())
                    <li>
                        <a href="{{ $p->nextPageUrl() }}"
                            class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover: text-heading font-medium rounded-e-base text-sm px-3 h-18 focus:outline-none">Next</a>
                    </li>
                @else
                    <li>
                        <span
                            class="flex items-center justify-center text-gray-400 bg-gray-108 box-border border border-gray-300 cursor-not-allowed font-medium rounded-e-base text-sm px-3 h-16">Next</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif

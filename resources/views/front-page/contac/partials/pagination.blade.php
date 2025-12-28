@php($p = $paginator)
@if ($p->hasPages())
    <div class="px-6 py-4 border-t border-gray-200">
        <nav aria-label="Page navigation" class="flex justify-end">
            <ul class="flex space-x-px text-sm">
                @if ($p->onFirstPage())
                    <li>
                        <span
                            class="flex items-center justify-center text-gray-400 bg-gray-100 border border-gray-300 cursor-not-allowed font-medium rounded-l text-sm px-3 h-10">Previous</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $p->previousPageUrl() }}"
                            class="flex items-center justify-center text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 hover:text-gray-900 font-medium rounded-l text-sm px-3 h-10 focus:outline-none">Previous</a>
                    </li>
                @endif

                @foreach ($p->getUrlRange(1, $p->lastPage()) as $page => $url)
                    @if ($page == $p->currentPage())
                        <li>
                            <a href="{{ $url }}" aria-current="page"
                                class="flex items-center justify-center text-blue-600 bg-blue-50 border border-gray-300 hover:text-blue-600 font-medium text-sm w-10 h-10 focus:outline-none">{{ $page }}</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}"
                                class="flex items-center justify-center text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 hover:text-gray-900 font-medium text-sm w-10 h-10 focus:outline-none">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach

                @if ($p->hasMorePages())
                    <li>
                        <a href="{{ $p->nextPageUrl() }}"
                            class="flex items-center justify-center text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 hover:text-gray-900 font-medium rounded-r text-sm px-3 h-10 focus:outline-none">Next</a>
                    </li>
                @else
                    <li>
                        <span
                            class="flex items-center justify-center text-gray-400 bg-gray-100 border border-gray-300 cursor-not-allowed font-medium rounded-r text-sm px-3 h-10">Next</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif

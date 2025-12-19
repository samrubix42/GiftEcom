@if ($paginator->hasPages())
<div class="w-100 d-flex mt-4 justify-content-center"
     data-anime='{ "translateY": [0,0], "opacity": [0,1], "duration":600, "delay":100, "staggervalue":150, "easing":"easeOutQuad" }'>

    <ul class="pagination pagination-style-01 fs-14 fw-500 mb-0">

        {{-- Previous --}}
        <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
            <button class="page-link" wire:click="previousPage" wire:loading.attr="disabled">
                <i class="feather icon-feather-arrow-left fs-18 d-xs-none"></i>
            </button>
        </li>

        {{-- Pages --}}
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                        <button class="page-link"
                                wire:click="gotoPage({{ $page }})"
                                wire:loading.attr="disabled">
                            {{ str_pad($page, 2, '0', STR_PAD_LEFT) }}
                        </button>
                    </li>
                @endforeach
            @endif
        @endforeach

        {{-- Next --}}
        <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
            <button class="page-link" wire:click="nextPage" wire:loading.attr="disabled">
                <i class="feather icon-feather-arrow-right fs-18 d-xs-none"></i>
            </button>
        </li>

    </ul>
</div>
@endif

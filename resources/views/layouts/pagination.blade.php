@if ($paginator->lastPage() > 1)

<nav aria-label="navigation">
    <ul class="pagination mt-50 mb-70">
        <li class="page-item"><a class="page-link" href="{{ $paginator->url(1) }}"><i class="fa fa-angle-left"></i></a></li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
        @endfor
    
        <li class="page-item"><a class="page-link" href="{{ $paginator->url($paginator->currentPage()+1) }}"><i class="fa fa-angle-right"></i></a></li>
    </ul>
</nav>
@endif
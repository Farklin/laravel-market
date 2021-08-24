<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">KaMishok</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('all_product') }}">Главная <span class="sr-only"></span></a>
        </li>
       @foreach($header_category as $category)
        
        <li class="nav-item">
          <a class="nav-link" href="{{ route('category', $category->id) }}">{{$category->title}}</a>
        </li>
       @endforeach 
       
       
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Искать мыльце" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
      </form>
      @guest
        
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">Войти</a>
        </li>
        @else 

        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit(); " role="button">
                <i class="fas fa-sign-out-alt"></i>

                {{ __('Выйти') }}
            </a>
        </div>

       @endauth
    </div>
  </nav>
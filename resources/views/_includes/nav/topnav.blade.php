{{-- included boostrap here --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

{{-- nav-bar starts --}}
<nav class="navbar navbar-light mb-5" style="background-color: #e3f2fd;">
    {{-- nav items --}}
    <a href="{{ route('index') }}" class="navbar-brand pl-4" href="#">Laravel Answers</a>
    <a href="{{ route('questions.index') }}" class="btn btn-primary">Recent</a>
    <a href="#" class="btn btn-primary">Popular</a>
    <a href="{{ route('questions.create') }}" class="btn btn-primary" style="margin-top:1px;">Ask A Question</a>
    
    {{-- check if the current user is authenticated or is a guest --}}
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        <li class="nav-item">
            @if (Route::has('register'))
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        </li>
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
</nav>
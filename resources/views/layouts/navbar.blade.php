<nav>
    <a href="{{ url('/') }}">Home</a>
    <a href="{{ route('comments') }}">Komentarze</a>
    @guest
        <a href="{{ route('login') }}">Log in</a>
        <a href="{{ route('register') }}">Register</a>
    @else
        <a href="{{ url('/dashboard') }}">Dashboard</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endguest
</nav>

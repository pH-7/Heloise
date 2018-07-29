<nav class="border split-nav">
    <div class="nav-brand">
        <h3>
            <a href="{{ route('homepage') }}">
                {{ config('app.name', 'My Blog') }}
            </a>
        </h3>
    </div>
    <div class="collapsible">
        <input id="collapsible1" type="checkbox" name="collapsible1">
        <button>
            <label for="collapsible1">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </label>
        </button>
        <div class="collapsible-body">
            <ul class="inline">
                <li class="active"><a href="{{ route('homepage') }}">Home</a></li>
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endguest
                <li>
                    <a href="{{ route('post.create') }}">
                        Add Post
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

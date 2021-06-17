<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/user/home">{{ __('language.Home') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/user/logout">{{ __('language.Logout') }}</a>
                    </li>
                </ul>
            </div>

            <div class="lang-menu">
                <div class="selected-lang" style="padding-bottom: 10px">
                    English
                </div>
                <ul>
                    <li>
                        <a href="{{ route('language', ['en']) }}" class="en">English</a>
                    </li>
                    <li>
                        <a href="{{ route('language', ['vi']) }}" class="vn">Vietnam</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</div>

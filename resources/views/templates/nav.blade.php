<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img style="width:50px;height:auto" src="{{ asset('storage/logo.png')}}" class="img-responsive"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('articles.index') ? 'active' : '' }}" href="{{ route('articles.index')}}">Artículos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('categories.index') ? 'active' : '' }}" href="{{ route('categories.index')}}">Categorías</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('subcategories.index') ? 'active' : '' }}" href="{{ route('subcategories.index')}}">Subcategorías</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<nav class="navbar navbar-expand-lg bg-body-tertiary" aria-label="Tenth navbar example">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08"
                aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
            <ul class="navbar-nav w-100
            mx-auto">
                <li class="nav-item flex-fill mx-2"">
                    <a class="navbar-brand" href="#">
                        <img style="width:50px;height:auto" src="{{ asset('storage/logo.png') }}" class="img-responsive">
                    </a>
                </li>
                <li class="nav-item flex-fill mx-2">
                    <a class="nav-link {{ request()->routeIs('articles.index') ? 'active' : '' }}" href="{{ route('articles.index') }}">Artículos</a>
                </li>
                <li class="nav-item flex-fill mx-2">
                    <a class="nav-link {{ request()->routeIs('categories.index') ? 'active' : '' }}" href="{{ route('categories.index') }}">Categorías</a>
                </li>
                <li class="nav-item flex-fill mx-2">
                    <a class="nav-link {{ request()->routeIs('subcategories.index') ? 'active' : '' }}" href="{{ route('subcategories.index') }}">Subcategorías</a>
                </li>
                <li class="nav-item flex-fill mx-2">
                    <a class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}" href="{{ route('roles.index') }}">Roles</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<a href="#" class="brand-link text-center">
    <span class="brand-text font-weight-light">{{ config('app.name')}}</span>
</a>

<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="#" class="d-block">{{Auth::guard("admin")->user()->name}}</a>
        </div>
    </div>

    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Arama..." aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route("superadmin.add.category")}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Kategori Ekle
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route("superadmin.add.subcategory")}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Alt Kategori Ekle
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route("superadmin.category.list")}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Kategori Listesi
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route("superadmin.subcategory.list")}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Alt Kategori Listesi
                    </p>
                </a>
            </li>

        </ul>
    </nav>
</div>

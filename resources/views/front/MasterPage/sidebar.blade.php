<a href="#" class="brand-link text-center">
    <span class="brand-text font-weight-light">{{ config('app.name')}}</span>
</a>

<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex text-center">
        <h4 class="text-light w-100">Kategoriler</h4>
    </div>
    @php
    $categories = \App\Models\Category::all();
    $subcategories = \App\Models\SubCategory::all();
    @endphp
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    @foreach($categories as $item)
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        {{$item->name}}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @foreach($subcategories as $value)
                        @if($value->category_id == $item->id)
                    <li class="nav-item">
                        <a href="{{route("category.get",$value->id)}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{$value->name}}</p>
                        </a>
                    </li>
                        @endif
                    @endforeach
                </ul>
            </li>
    @endforeach
        </ul>
    </nav>
</div>

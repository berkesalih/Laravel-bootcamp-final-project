@extends("superAdmin.masterpages.masterpage")
@section("content")
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Kategori Adı</th>
            <th>Alt Kategori Adı</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subcategory as $item)
            <tr>
                <td class="w-25">
                    <a class="btn btn-primary" href="{{route("superadmin.subcategory.edit",$item->id)}}">
                        Düzenle
                    </a>
                    <a class="btn btn-danger" href="{{route("superadmin.subcategory.delete",$item->id)}}">
                        Sil
                    </a>
                </td>
                <td>{{\App\Models\SubCategory::getCategoryNameByID($item->category_id)}}</td>
                <td>{{$item->name}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection

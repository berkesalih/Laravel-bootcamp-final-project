@extends("superAdmin.masterpages.masterpage")
@section("content")
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Kategori Adı</th>
        </tr>
        </thead>
        <tbody>
        @foreach($category as $item)
        <tr>
            <td class="w-25">
                <a class="btn btn-primary" href="{{route("superadmin.category.edit",$item->id)}}">
                    Düzenle
                </a>
                <a class="btn btn-danger" href="{{route("superadmin.category.delete",$item->id)}}">
                    Sil
                </a>
            </td>
            <td>{{$item->name}}</td>
        </tr>
        @endforeach

        </tbody>
    </table>
@endsection

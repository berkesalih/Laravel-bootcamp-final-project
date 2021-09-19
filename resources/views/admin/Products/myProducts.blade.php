@extends("admin.masterpages.masterpage")
@section("content")
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Ürün Adı</th>
                <th>Ürün Stok Sayısı</th>
                <th>Ürün Kategorisi</th>
                <th>Ürün Fiyatı</th>
            </tr>
            </thead>
            <tbody>
            @foreach($myProducts as $item)
                <tr>
                    <td>
                        <a class="btn btn-primary" href="{{route("saler_productUpdate",$item->id)}}">
                           Düzenle
                        </a>
                        <a class="btn btn-danger" href="{{route("saler_productDelete",$item->id)}}">
                            Sil
                        </a>
                    </td>

                    <td>{{$item->name}}</td>
                    <td>{{$item->stock}}</td>
                    <td>{{\App\Models\SubCategory::getSubCategoryNameByID($item->sc_id) }}</td>
                    <td>{{$item->price."₺"}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">

    </div>

@endsection

@extends("admin.masterpages.masterpage")
@section("content")
    <table class="table table-sm">
        <thead>
        <tr>
            @foreach($order as $item)
                @if($item->status == "s")
                    <th>#</th>
                @endif
            @endforeach
            <th>Ürün Adı</th>
            <th>Adet</th>
            <th>Fiyat</th>
            <th>Sipariş Veren Kullanıcı</th>
            <th>Sipariş Durumu</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order as $item)
        <tr>
            @if($item->status == "s")
            <td>
                <a class="btn btn-outline-danger" href="{{route("saler.cancelOrder",$item->id)}}">Siparişi İptal Et</a>
                <a class="btn btn-outline-success" href="{{route("saler.completeOrder",$item->id)}}">Siparişi Tamamla</a>
            </td>
            @endif
            <td>{{\App\Models\Order::getProductNameById($item->product_id)}}</td>
            <td>
                {{$item->pieces}}
            </td>
            <td>{{$item->price}} ₺</td>
            <td>{{\App\Models\Order::getUserNameById($item->user_id)}}</td>
            <td>Sipariş Verildi</td>
        </tr>
        @endforeach

    </table>
@endsection

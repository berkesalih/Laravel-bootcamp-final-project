@extends("front.MasterPage.masterpage")
@section("content")
    <div class="row">
    @foreach($product as $item)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route("product.detail",$item->id)}}">{{$item->name}}</a> </h5>
                        <p class="card-text"><s>{{$item->price."₺"}}</s> <br>{{getProductRealPrice($item->id)."₺"}}</p>
                        <p class="card-text"><b>Stok Sayısı : </b> <br>{{$item->stock." adet"}}</p>
                        <form method="POST" action="{{route("addToCart")}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <div class="d-flex justify-content-between" >
                                <input style="width: 50%"  type="number" min="1" max="10" required name="pieces"/>
                                <input class="btn btn-outline-primary" value="Sepete Ekle" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    @endforeach
    </div>

@endsection

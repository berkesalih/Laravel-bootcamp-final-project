@extends("front.MasterPage.masterpage")
@section("content")
    @php
    $totalPrice = 0;
    $totalDiscount = 0;
    @endphp
    <div class="col-12 table-responsive">
        @if(is_numeric($message))
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Qty</th>
                <th>Product</th>
                <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>

            @foreach($cart as $key => $value)
                @php
                $product = getProduct($key)
                @endphp
            <tr>
                <td><a href="{{route("deleteToCart",$key)}}" class="btn btn-danger">Sepetten Çıkra</a> </td>
                <td>{{$value}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price * $value." ₺"}}</td>
                @php
                    $totalPrice += $product->price * $value;
                    $totalDiscount +=getDiscount($product->id) * $value;
                @endphp
            </tr>
            @endforeach


            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <p class="lead"><b>Toplamlar</b></p>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th style="width:50%">Tutar:</th>
                            <td>{{$totalPrice." ₺"}}</td>
                        </tr>
                        <tr>
                            <th>Toplam İndirim Tutarı:</th>
                            <td>{{$totalDiscount."₺"}}</td>
                        </tr>
                        <tr>
                            <th>Ödenecek Tutar:</th>
                            <td>{{$totalPrice - $totalDiscount."₺"}}</td>
                        </tr>
                        </tbody>
                    </table>
                    @if(!Auth::guard("user")->check())
                        <div class="alert alert-danger" role="alert">
                            Siparişi tamamlamak için önce giriş yapmalısınız.
                        </div>
                    @else
                        <a class="btn btn-outline-success" href="{{route("completeOrder")}}">Siparişi Tamamla</a>
                    @endif
                </div>
            </div>
        </div>
        @else
            {{$message}}
        @endif
    </div>

@endsection

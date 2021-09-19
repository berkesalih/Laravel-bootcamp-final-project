@extends("front.MasterPage.masterpage")
@section("content")
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3">{{$product->name}}</h3>
                <p>{{"Stok Sayısı: ".$product->stock." Adet"}}</p>
                <hr>
                <div class="bg-gray py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        {{"İndirimli Fiyat: ".getProductRealPrice($product->id)."₺"}}
                    </h2>
                    <h4 class="mt-0">
                        <small><s>{{"Eski Fiyat: ".$product->price."₺"}}</s></small>
                    </h4>
                </div>
                <div class="mt-4">
                    <form method="POST" action="{{route("addToCart")}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <div class="d-flex justify-content-between" >
                            <input style="width: 50%"  type="number" min="1" max="10" value="1" required name="pieces"/>
                            <input class="btn btn-outline-primary" value="Sepete Ekle" type="submit">
                        </div>
                    </form>
                </div>


            </div>
        </div>
        <div class="row mt-4">
            <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                </div>
            </nav>
            <div class="tab-content p-3 w-100" id="nav-tabContent">
                <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> {{$product->props}} </div>
                <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                    @foreach($comments as $item)
                        <h2>{{\App\Models\Comment::getUserName($item->user_id)}}
                            @foreach($orders as $order)
                                @if($order->user_id == $item->user_id)
                                    <span style="font-size: 14px;" class="badge bg-success ml-1">Satın alan kullanıcı</span>
                                    @break
                                @endif
                            @endforeach
                        </h2>
                        <p>{{$item->description}}</p>
                        <hr>
                    @endforeach
                    @if(Auth::guard("user")->check())
                        <form method="POST" action="{{route("detail.addComment")}}">
                            @csrf
                            <textarea placeholder="Yorumunuzu giriniz" class="form-control w-100" name="description"></textarea>
                            <input name="product_id" type="hidden" value="{{$product->id}}"/>
                            <br>
                            <button type="submit" class="btn btn-outline-dark">Yorum Yap</button>
                        </form>
                    @else
                            <div class="alert alert-danger" role="alert">
                                Yorum yapmak için önce giriş yapmalısınız.
                            </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

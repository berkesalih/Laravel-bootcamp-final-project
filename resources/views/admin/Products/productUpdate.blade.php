@extends("admin.masterpages.masterpage")

@section("title","Ürün Güncelle")
@section("content")
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ürün Güncelle</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <form method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputProductName">Ürün Adı</label>
                            <input type="text" value="{{$product->name}}" name="name" id="inputProductName" class="form-control">
                            <input type="hidden" value="{{$product->id}}" name ="id">
                        </div>
                        <div class="form-group">
                            <label for="inputCategoryName">Kategori Adı</label>
                            <select name="category" id="inputCategoryName" class="form-control">
                                @foreach($category as $item)
                                    <option {{$item->id == \App\Models\SubCategory::getCategoryID($product->sc_id) ? "selected" : ""}} value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputSubcategoryName">Alt Kategori Adı</label>
                            <select required name="subcategory" id="inputSubcategoryName" class="form-control">
                                @foreach($subcategory as $value)
                                    @if($value->category_id == \App\Models\SubCategory::getCategoryID($product->sc_id))
                                    <option {{$value->id == $product->sc_id ? "selected" : ""}} value="{{$value->id}}">{{$value->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputProps">Ürün Özellikleri</label>
                            <textarea name="properties" id="inputProps" class="form-control" rows="4">{{$product->props}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputDiscount">İndirim Oranı(%)</label>
                            <input type="number" value="{{$product->discount}}" name="discount" id="inputDiscount" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputStock">Stok Sayısı</label>
                            <input type="number" value="{{$product->stock}}" name="stock" id="inputStock" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputPrice">Ürün Fiyatı(₺)</label>
                            <input type="number" value="{{$product->price}}" name="price" id="inputPrice" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-outline-primary" value="Güncelle">
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
@section("custom_js")
    <script>
        $(document).ready(function () {

            $("#inputCategoryName").change(function () {
                var val = $(this).val();
                document.getElementById("inputSubcategoryName").innerHTML = "";
                @php
                    foreach ($subcategory as $item)
                    {
                @endphp
                if (val == {{$item->category_id}})
                {
                    let id = {{$item->id}};
                    let name = "{{$item->name}}";
                    let selectedID = {{$product->sc_id}};
                    if (selectedID == id)
                    {
                        console.log("sa");
                        document.getElementById("inputSubcategoryName").innerHTML +="<option selected value='"+id+"'>"+name+"</option>";
                    }
                    else
                    {
                        document.getElementById("inputSubcategoryName").innerHTML +="<option value='"+id+"'>"+name+"</option>";
                    }
                }
                @php
                    }
                @endphp
            });
        });
    </script>
@endsection

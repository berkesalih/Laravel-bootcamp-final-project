@extends("admin.masterpages.masterpage")

@section("title","Ürün Ekle")
@section("content")
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ürün Ekle</h3>

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
                        <input type="text" name="name" id="inputProductName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputCategoryName">Kategori Adı</label>
                        <select name="category" id="inputCategoryName" class="form-control">
                            <option id value="0">Kategori Seç</option>
                            @foreach($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputSubcategoryName">Alt Kategori Adı</label>
                        <select disabled required name="subcategory" id="inputSubcategoryName" class="form-control">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputProps">Ürün Özellikleri</label>
                        <textarea name="properties" id="inputProps" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputDiscount">İndirim Oranı(%)</label>
                        <input type="number" name="discount" id="inputDiscount" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputStock">Stok Sayısı</label>
                        <input type="number" name="stock" id="inputStock" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputPrice">Ürün Fiyatı(₺)</label>
                        <input type="number" name="price" id="inputPrice" class="form-control">
                    </div>
                    <input type="submit" class="btn btn-outline-primary" value="Ekle">
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
            var d = 1;
            $("#inputCategoryName").change(function () {
                document.getElementById("inputSubcategoryName").removeAttribute("disabled");
                if (d == 1)
                {
                    $("#inputCategoryName").find('option').get(0).remove();
                    d--;
                }
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
                        document.getElementById("inputSubcategoryName").innerHTML +="<option value='"+id+"'>"+name+"</option>";
                    }
                    @php
                    }
                    @endphp
            });
        });
    </script>
@endsection

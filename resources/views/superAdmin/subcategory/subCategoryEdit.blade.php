@extends("superAdmin.masterpages.masterpage")
@section("content")
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Alt Kategori Güncelle</h3>

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
                            <label for="inputCategoryName">Kategori Adı</label>
                            <select name="category" id="inputCategoryName" class="form-control">

                                @foreach($category as $item)
                                    <option {{$subcategory->category_id == $item->id ? "selected" : ""}} value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            <br>
                            <label for="inputSubcategoryName">Alt Kategori Adı</label>
                            <input type="text" value="{{$subcategory->name}}" name="name" id="inputSubcategoryName" class="form-control">
                            <input type="hidden" value="{{$subcategory->id}}" name ="id">
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

@extends("superAdmin.masterpages.masterpage")
@section("content")
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Kategori Ekle</h3>

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
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputSubCategoryName">Alt Kategori Adı</label>
                            <input name="name" id="inputSubCategoryName" class="form-control" required>
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

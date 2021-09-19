@extends("admin.masterpages.masterpage")
@section("content")
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            @foreach($detail as $item)
                {{$item->name}}
            @endforeach
        </div>
    </div>
@endsection

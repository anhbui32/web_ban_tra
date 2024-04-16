@extends('layouts.client')
@section('title')
    {{ $title }}
@endsection
@section('mainContent')
    <div id="list-cat">

    </div>
@endsection
@section('js')
    <script>
        $.get('http://127.0.0.1:8000/api/categoryApi', function(res) {
            console.log(res);
            let cats = res.Category;
            let _li = '';
            let url = '{{ route('getProductsCategory') }}' + '/';
            cats.forEach(function(item) {
                _li += '<a href="' + url + item.id + '" class="list-group-item">' + item.type_name +
                    '</a>';
                // console.log(item);
            })
            $('#list-cat').html(_li);
            $('#list-cats').html(_li);
            // let status = res.status;
            // console.log(status);
            // let header = res.headers;
            // console.log(header);
        })
    </script>
@endsection

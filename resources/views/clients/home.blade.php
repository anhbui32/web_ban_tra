@extends('layouts.client')
@section('title')
    {{ $title }}
@endsection
@section('mainContent')
    @if (Session::has('notice'))
        <div class="alert alert-danger">
            {{ Session::get('notice') }}
        </div>
    @endif
    @include('layouts.blocks.banner')
    @include('layouts.blocks.sectionAboutUs')
    @include('layouts.blocks.sectionSlideProducts')
    @include('layouts.blocks.sectionContactUs')
@endsection
{{-- @section('sidebar')
    @parent
    sidebar đơn lẻ (sidebar con)
@endsection --}}

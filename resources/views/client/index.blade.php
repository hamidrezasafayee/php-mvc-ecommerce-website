@extends('client.layouts.app')

@section('title', 'Home')

@section('content')
    @include('client.layouts.slider')

    <div class="container-fluid my-4">
        <h5>New Products</h5>
        <div class="row">
            @foreach ($products as $product)
                @include('client.layouts.single_product')
            @endforeach
        </div>
    </div>
@endsection

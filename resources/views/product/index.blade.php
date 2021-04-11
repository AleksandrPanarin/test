@extends('base')

@section('title-page', 'Products')

@section('content')
    @if($products->total())
        <div class="mt-2 d-flex justify-content-end">
            <a class="btn btn-success" type="button" href="{{route('products.create')}}">
                Add product
            </a>
        </div>
        <div class="row mt-2">
            @foreach($products as $product)
                <div class="col-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <p class="card-text">{{$product->art}}</p>
                            <p class="card-text">{{$product->name}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{route('products.show', $product)}}" type="button"
                                       class="btn btn-sm btn-outline-secondary">
                                        View
                                    </a>
                                    <a href="{{route('products.edit', $product)}}" type="button"
                                       class="btn btn-sm btn-outline-secondary">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mb-5">
            {!! $products->links('vendor.pagination.bootstrap-4') !!}
        </div>
    @else
        <div class="col-12">
            <div class="alert alert-danger text-center mt-5">
                <h1>Products not found</h1>
            </div>
        </div>
    @endif
@endsection

@extends('base')

@section('title-page', 'Products')

@section('content')
    <div class="row mt-5">
        @foreach($products as $product)
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <div class="card-body">
                        <p class="card-text">Art: {{$product->art}}</p>
                        <p class="card-text">Name: {{$product->name}}</p>
                        <p class="card-text">Status: {{$product->status}}</p>
                        <p class="card-text">Data color: {{isset($product->data['color']) ? $product->data['color'] : ''}}</p>
                        <p class="card-text">Data size: {{isset($product->data['size']) ? $product->data['size'] : ''}}</p>
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

    <div class="d-flex justify-content-center">
        {!! $products->links('vendor.pagination.bootstrap-4') !!}
    </div>
@endsection

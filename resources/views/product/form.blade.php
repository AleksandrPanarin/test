@extends('base')

@section('title-page', isset($product) ? 'Update '. $product->name : 'Create product')

@section('content')
    <div class="mt-5">
        <form method="POST"
              @if(isset($product))
              action="{{ route('products.update', $product) }}"
              @else
              action="{{ route('products.store') }}"
              @endif
              class="mt-3">
            @csrf
            @isset($product)
                @method('PUT')
            @endisset
            <div class="form-row">
                <div class="col-md-6">
                    <label for="art">Art</label>
                    <input id="art"
                           name="art"
                           value="{{ old('art', isset($product) ? $product->art : null) }}"
                           type="text" class="form-control">
                    @error('art')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="name">Name</label>
                    <input id="name"
                           name="name"
                           value="{{ old('name', isset($product) ? $product->name : null) }}"
                           type="text" class="form-control">
                    @error('name')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        @foreach($statuses as $status)
                            <option value="{{$status}}"
                                    @if(isset($product) && $product->status == $status) selected @endif>
                                {{$status}}
                            </option>
                        @endforeach
                    </select>
                    @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="size">Size</label>
                    <input
                        id="size"
                        name="data[size]"
                        value="{{ old( 'data.size',
                        (isset($product) && !empty($product->data['size'])) ?$product->data['size'] : '')}}"
                        type="text" class="form-control">
                </div>

                <div class="col-md-6">
                    <label for="color">Color</label>
                    <input
                        id="color"
                        name="data[color]"
                        value="{{old('data.color',
                        (isset($product) && !empty($product->data['color'])) ? $product->data['color'] : '' ) }}"
                        type="text" class="form-control">
                </div>

            </div>
            <div class="row mt-4">
                <div class="col">
                    <button type="submit" class="btn btn-success">
                        @if(isset($product))
                            Update
                        @else
                            Create
                        @endif
                    </button>
                    <a type="button" class="btn btn-secondary" href="{{ route('products.index') }}">Back to products</a>
                </div>
            </div>
        </form>
    </div>
@endsection

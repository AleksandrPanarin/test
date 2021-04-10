@extends('base')

@section('title', 'Product '.$product->name)

@section('content')
    <div class="d-flex justify-content-center">
        <div class="mt-3">
            <a type="button" class="btn btn-secondary" href="{{ route('products.index') }}">Back to products</a>
            <div class="card mt-3" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Id: {{$product->id}}</li>
                    <li class="list-group-item">Name: {{$product->name}}</li>
                    <li class="list-group-item">Status: {{$product->status}}</li>
                    <li class="list-group-item">Color: {{$product->data['color']}}</li>
                    <li class="list-group-item">Size: {{$product->data['size']}}</li>
                    <li class="list-group-item">Created: {{$product->created_at->format('d-m-Y H:i:s')}}</li>
                    <li class="list-group-item">Updated: {{$product->updated_at->format('d-m-YH:i:s')}}</li>
                </ul>
            </div>

            <form method="POST" class="mt-3" action="{{ route('products.destroy', $product) }}">
                <a type="button" class="btn btn-warning" href="{{ route('products.edit', $product) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection

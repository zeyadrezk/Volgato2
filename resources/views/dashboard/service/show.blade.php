@extends('layouts.admin.master')

@section('title')
   Product
    {{ $title }}
@endsection

@push('css')
@endpush

@section('content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3> Product</h3>
        @endslot
        <li class="breadcrumb-item">Products</li>
        <li class="breadcrumb-item">Product</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">

                        <div class="mb-4">
                            <h2>Product</h2>
                            <br>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3>{{ $product->name['en'] }} / {{ $product->name['ar'] }}</h3>
                                                <p><strong>Price:</strong> {{ $product->price }}</p>
                                                <p><strong>Old Price:</strong> {{ $product->oldprice }}</p>
                                                <img src="{{ $product->image }}" alt="Product Image" class="img-fluid mb-2">
                                                <p><strong>Second Image:</strong><img src=" {{ $product->secondImage }}"</p>
                                                <p><strong>Video:</strong> <a href="{{ $product->Video }}" target="_blank">Watch Video</a></p>
                                                <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
                                                <p><strong>Total Rate:</strong> {{ $product->total_rate }}</p>
                                                <p><strong>Category:</strong> {{ $product->category->name['en'] }} / {{ $product->category->name['ar'] }}</p>
                                                <p><strong>Country:</strong> {{ $product->country->name['en'] }} / {{ $product->country->name['ar'] }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Short Description:</strong> {{ $product->short_description['en'] }}, {{ $product->short_description['ar'] }}</p>
                                                <p><strong>Description:</strong> {{ $product->description['en'] }} / {{ $product->description['ar'] }}</p>
                                                <p><strong>Details:</strong> {{ $product->details['en'] }} / {{ $product->details['ar'] }}</p>
                                                <!-- Display other product details as needed -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
    @endpush

@endsection

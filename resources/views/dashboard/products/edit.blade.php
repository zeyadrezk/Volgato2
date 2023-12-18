@extends('layouts.admin.master')

@section('title')
    Edit Product
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
            <h3>Edit Product</h3>
        @endslot
        <li class="breadcrumb-item">Products</li>
        <li class="breadcrumb-item">Edit Product</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="container mt-4">

                            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name_en" class="form-label">Name (English):</label>
                                            <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en', $product->name['en']) }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="name_ar" class="form-label">Name (Arabic):</label>
                                            <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ old('name_ar', $product->name['ar']) }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="price" class="form-label">Price:</label>
                                            <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="oldprice" class="form-label">Old Price:</label>
                                            <input type="text" class="form-control" id="oldprice" name="oldprice" value="{{ old('oldprice', $product->oldprice) }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image:</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                        </div>

                                        <div class="mb-3">
                                            <label for="secondImage" class="form-label">Second Image:</label>
                                            <input type="file" class="form-control" id="secondImage" name="secondImage">
                                        </div>

                                        <div class="mb-3">
                                            <label for="Video" class="form-label">Video URL:</label>
                                            <input type="text" class="form-control" id="Video" name="Video" value="{{ old('Video', $product->Video) }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="quantity" class="form-label">Quantity:</label>
                                            <input type="text" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="category_id" class="form-label">Category:</label>
                                            <select class="form-select" id="category_id" name="category_id">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                        {{ $category->name['en'] }}, {{ $category->name['ar'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="short_description_en" class="form-label">Short Description (English):</label>
                                            <input type="text" class="form-control" id="short_description_en" name="short_description_en" value="{{ old('short_description_en', $product->short_description['en']) }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="short_description_ar" class="form-label">Short Description (Arabic):</label>
                                            <input type="text" class="form-control" id="short_description_ar" name="short_description_ar" value="{{ old('short_description_ar', $product->short_description['ar']) }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="description_en" class="form-label">Description (English):</label>
                                            <textarea class="form-control" id="description_en" name="description_en">{{ old('description_en', $product->description['en']) }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="description_ar" class="form-label">Description (Arabic):</label>
                                            <textarea class="form-control" id="description_ar" name="description_ar">{{ old('description_ar', $product->description['ar']) }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="details_en" class="form-label">Details (English):</label>
                                            <textarea class="form-control" id="details_en" name="details_en">{{ old('details_en', $product->details['en']) }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="details_ar" class="form-label">Details (Arabic):</label>
                                            <textarea class="form-control" id="details_ar" name="details_ar">{{ old('details_ar', $product->details['ar']) }}</textarea>
                                        </div>



                                        <div class="mb-3">
                                            <label for="country_id" class="form-label">Country:</label>
                                            <select class="form-select" id="country_id" name="country_id">
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}" {{ $country->id == $product->country_id ? 'selected' : '' }}>
                                                        {{ $country->name['en'] }},{{ $country->name['ar'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update Product</button>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
    @endpush

@endsection

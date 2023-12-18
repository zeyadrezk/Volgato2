@extends('layouts.admin.master')

@section('title')
    Edit Category
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
            <h3>Edit Category</h3>
        @endslot
        <li class="breadcrumb-item">Categories</li>
        <li class="breadcrumb-item">Edit Category</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="container mt-4">

                            <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name_en" class="form-label">Name (English):</label>
                                            <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en', $category->name['en']) }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="name_ar" class="form-label">Name (Arabic):</label>
                                            <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ old('name_ar', $category->name['ar']) }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image:</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                            @if($category->image)
                                                <div class="mt-2">
                                                    <img src="{{ asset('images/categories/'.$category->image) }}" alt="Category Image" style="width: 100px;">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update Category</button>
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

@extends('layouts.admin.master')

@section('title')
    Edit page
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
            <h3>Edit page</h3>
        @endslot
        <li class="breadcrumb-item">pages</li>
        <li class="breadcrumb-item">Edit page</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="container mt-4">

                                <form action="{{ route('page.update', $page->id) }}" method="POST" >
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name_en" class="form-label">title (English):</label>
                                                <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en', $page->title['en']) }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="name_ar" class="form-label">title (Arabic):</label>
                                                <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ old('name_ar', $page->title['ar']) }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="description_en" class="form-label">Description (English):</label>
                                                <textarea class="form-control" id="description_en" name="description_en">{{ old('description_en', $page->description['en']) }}</textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="description_ar" class="form-label">Description (Arabic):</label>
                                                <textarea class="form-control" id="description_ar" name="description_ar">{{ old('description_ar', $page->description['ar']) }}</textarea>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Update page</button>
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

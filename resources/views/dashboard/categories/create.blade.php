@extends('layouts.admin.master')

@section('title')
    Add Category
    {{ $title }}
@endsection

@push('css')
@endpush

@section('content')




    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Add Category</h3>
        @endslot
        <li class="breadcrumb-item">Category</li>
        <li class="breadcrumb-item">Add Category</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">

                        <h2>Create Category</h2>

                        {{-- Display validation errors if any --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Category creation form --}}
                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- Name (English) --}}
                            <div class="form-group">
                                <label for="name_en">Name (English):</label>
                                <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name.en') }}" required>
                            </div>

                            {{-- Name (Arabic) --}}
                            <div class="form-group">
                                <label for="name_ar">Name (Arabic):</label>
                                <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ old('name.ar') }}" required>
                            </div>

                            {{-- Image Upload --}}
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                            {{-- Submit Button --}}
                            <button type="submit" class="btn btn-primary">Create Category</button>
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

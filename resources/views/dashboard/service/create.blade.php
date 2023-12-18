@extends('layouts.admin.master')

@section('title')
    Add Service
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
            <h3>Add Service</h3>
        @endslot
        <li class="breadcrumb-item">Services</li>
        <li class="breadcrumb-item">Add Service</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">

                        <div class="container mt-4">
                            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Name (English) -->
                                        <div class="mb-3">
                                            <label for="name_en" class="form-label">Name (English)</label>
                                            <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en') }}">
                                        </div>

                                        <!-- Name (Arabic) -->
                                        <div class="mb-3">
                                            <label for="name_ar" class="form-label">Name (Arabic)</label>
                                            <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ old('name_ar') }}">
                                        </div>

                                        <!-- Price -->
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Price</label>
                                            <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                                        </div>

                                        <!-- Old Price -->
                                        <div class="mb-3">
                                            <label for="oldprice" class="form-label">Old Price</label>
                                            <input type="text" class="form-control" id="oldprice" name="oldprice" value="{{ old('oldprice') }}">
                                        </div>

                                        <!-- Image -->
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                        </div>

                                        <!-- Duration -->
                                        <div class="mb-3">
                                            <label for="duration" class="form-label">Duration</label>
                                            <input type="time" class="form-control" id="duration" name="duration" value="{{ old('duration') }}">
                                        </div>

                                        <!-- Start Time -->
                                        <div class="mb-3">
                                            <label for="start_time" class="form-label">Start Time</label>
                                            <input type="time" class="form-control" id="start_time" name="start_time" value="{{ old('start_time') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Description (English) -->
                                        <div class="mb-3">
                                            <label for="description_en" class="form-label">Description (English)</label>
                                            <input type="text" class="form-control" id="description_en" name="description_en" value="{{ old('description_en') }}">
                                        </div>

                                        <!-- Description (Arabic) -->
                                        <div class="mb-3">
                                            <label for="description_ar" class="form-label">Description (Arabic)</label>
                                            <input type="text" class="form-control" id="description_ar" name="description_ar" value="{{ old('description_ar') }}">
                                        </div>

                                        <!-- Short Description (English) -->
                                        <div class="mb-3">
                                            <label for="short_description_en" class="form-label">Short Description (English)</label>
                                            <input type="text" class="form-control" id="short_description_en" name="short_description_en" value="{{ old('short_description_en') }}">
                                        </div>

                                        <!-- Short Description (Arabic) -->
                                        <div class="mb-3">
                                            <label for="short_description_ar" class="form-label">Short Description (Arabic)</label>
                                            <input type="text" class="form-control" id="short_description_ar" name="short_description_ar" value="{{ old('short_description_ar') }}">
                                        </div>

                                        <!-- Details (English) -->
                                        <div class="mb-3">
                                            <label for="details_en" class="form-label">Details (English)</label>
                                            <input type="text" class="form-control" id="details_en" name="details_en" value="{{ old('details_en') }}">
                                        </div>

                                        <!-- Details (Arabic) -->
                                        <div class="mb-3">
                                            <label for="details_ar" class="form-label">Details (Arabic)</label>
                                            <input type="text" class="form-control" id="details_ar" name="details_ar" value="{{ old('details_ar') }}">
                                        </div>

                                        <!-- End Time -->
                                        <div class="mb-3">
                                            <label for="end_time" class="form-label">End Time</label>
                                            <input type="time" class="form-control" id="end_time" name="end_time" value="{{ old('end_time') }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Country -->
                                <div class="mb-3">
                                    <label for="country_id" class="form-label">Country</label>
                                    <select class="form-select" id="country_id" name="country_id">
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name['en'] }}, {{ $country->name['ar'] }}</option>
                                        @endforeach
                                    </select>
                                </div>



                                <!-- Status -->
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <input type="checkbox" id="status" name="status" value="1" {{ old('status') ? 'checked' : '' }}>
                                </div>

                                <!-- Submit Button -->
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Add Service</button>
                                </div>
                            </form>
                        </div>

                    </div>
            </div>
        </div>
    </div>


    @push('scripts')
    @endpush

@endsection

@extends('layouts.admin.master')

@section('title')
    {{ $page->title['en'] }}@endsection

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
            <h3> {{ $page->title['en'] }}</h3>
        @endslot
        <li class="breadcrumb-item">pages</li>
        <li class="breadcrumb-item">{{ $page->title['en'] }}</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">

                        <div class="mb-4">
                            <h2>{{ $page->title['en'] }}</h2>
                            <br>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <h4>English Title: {{ $page->title['en'] }}</h4>
                                            <h4>Arabic Title: {{ $page->title['ar'] }}</h4>
                                            <p>English Description: {{ $page->description['en'] }}</p>
                                            <p>Arabic Description: {{ $page->description['ar'] }}</p>

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

@extends('layouts.admin.master')

@section('title')
    Categories {{ $title }}
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

    {{-- Add the success message section --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Categories</h3>
        @endslot
        <li class="breadcrumb-item">Categories</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <a href="{{ route('category.create') }}" class="btn btn-primary">Add Category</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name (English)</th>
                                <th>Name (Arabic)</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=1; @endphp
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$i++ }}</td>
                                    <td >
                                        <a href="{{ route('category.show', $category->id) }}">{{ $category->name['en'] }}</a>

                                    </td>
                                    <td>
                                        {{ $category->name['ar'] }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('images/categories/' . $category->image) }}" alt="Category Image" width="100">
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @endpush

@endsection

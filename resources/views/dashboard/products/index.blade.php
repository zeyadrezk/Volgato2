@extends('layouts.admin.master')

@section('title')Products
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

    {{-- Add the success message section --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

  @component('components.breadcrumb')
    @slot('breadcrumb_title')
      <h3>Products</h3>
    @endslot
    <li class="breadcrumb-item">Products</li>
  @endcomponent

  <div class="container-fluid">
      <div class="row">
          <div class="col-sm-12">
              <div class="card">
                  <div class="card-header pb-0">
                          <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
                  </div>
                  <div class="card-body">
                      <table class="table">
                          <thead>
                          <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>actions</th>

                          </tr>
                          </thead>
                          <tbody>
                          @php $i=1; @endphp
                          @foreach($products as $product)
                              <tr>
                                  <td>{{$i++ }}</td>
                                  <td>
                                      <a href="{{route('products.show', $product->id)}}" class="text-primary">  en -> {{ $product->name['en'] }} , ar -> {{ $product->name['ar'] }} </a>
                                  </td>

                                  <td>
                                      <div class="btn-group">

                                      <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                                      <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
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

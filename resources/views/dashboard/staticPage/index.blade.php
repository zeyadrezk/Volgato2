@extends('layouts.admin.master')

@section('title')StaticPages
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

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

  @component('components.breadcrumb')
    @slot('breadcrumb_title')
      <h3>StaticPages</h3>
    @endslot
    <li class="breadcrumb-item">StaticPages</li>
  @endcomponent

  <div class="container-fluid">
      <div class="row">
          <div class="col-sm-12">
              <div class="card">

                  <div class="card-body">
                      <table class="table">
                          <thead>
                          <tr>
                              <th>title</th>
                              <th>actions</th>

                          </tr>
                          </thead>
                          <tbody>
                          @foreach ($pages as $page)
                              <tr>
                                  <td><a href="{{ route('page.show', $page->id) }}">en ->{{ $page->title['en'] }} , ar ->{{ $page->title['ar'] }}</a></td>
                                  <td><a href="{{ route('page.edit', $page->id) }}"  class="btn btn-primary">Edit</a></td>
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


@extends('backend.layouts.master')

@section('content')
<h6 class="mb-0 mt-3 text-uppercase">All Category</h6>
<hr />
<div class="card">
  <div class="card-body">
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModalCategory">
      create Category
    </button>
    <div class="table-responsive">
      {{ $dataTable->table() }}
    </div>
  </div>
</div>
@include('backend.pages.category.components.create')
@include('backend.pages.category.components.edit')
@endsection    

@push('script')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
<script src="{{asset('assets/js/backend/category.js')}}"></script>
@endpush
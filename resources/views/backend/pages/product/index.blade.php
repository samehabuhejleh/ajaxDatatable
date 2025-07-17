@extends('backend.layouts.master')

@section('content')
<h6 class="mb-0 mt-3 text-uppercase">All Product</h6>
<hr />
<div class="card">
  <div class="card-body">
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
      create product
    </button>
    <div class="table-responsive">
      <table id="product_table" class="table table-striped table-bordered product-table"" style=" width:100%">
        <thead>
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Stock</th>
            <th>Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Stock</th>
            <th>Price</th>
            <th>Action</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
@include('backend.pages.product.components.create')
@include('backend.pages.product.components.edit')
@endsection

@push('script')
<script src="{{asset('assets/js/backend/product.js')}}"></script>
@endpush
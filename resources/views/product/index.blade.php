@extends('layout.template')

@section('content')
<!-- START DATA -->
<div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
          <form class="d-flex" action="" method="get">
              <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Add Some Keywords" aria-label="Search">
              <button class="btn btn-secondary" type="submit">Search</button>
          </form>
        </div>
        
        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
          <a href='' class="btn btn-primary">+ Add Data</a>
        </div>
  
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-3">ID</th>
                    <th class="col-md-4">Name Product</th>
                    <th class="col-md-2">Description</th>
                    <th class="col-md-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>1001</td>
                    <td>Ani</td>
                    <td>Ilmu Komputer</td>
                    <td>
                        <a href='' class="btn btn-warning btn-sm">Edit</a>
                        <a href='' class="btn btn-danger btn-sm">Del</a>
                    </td>
                </tr>
            </tbody>
        </table>
</div>
<!-- AKHIR DATA -->
@endsection
       
   
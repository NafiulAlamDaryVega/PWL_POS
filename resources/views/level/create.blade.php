@extends('layout.app')

{{-- Customize layout sections --}}
@section('subtitle', 'Level')
@section('content_header_title', 'Level')
@section('content_header_subtitle', 'Create')

{{-- Content body: main page content --}}
@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Data Level</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="../level">
            <div class="card-body">
                <div class="form-group">
                    <label for="level_kode">Level Kode</label>
                    <input type="text" class="form-control" id="level_kode" placeholder="Masukkan Level Kode">
                </div>
                <div class="form-group">
                    <label for="level_nama">Level Nama</label>
                    <input type="text" class="form-control" id="level_nama" placeholder="Masukkan Level Nama">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add Data</button>
            </div>
        </form>
      </div>
      <!-- /.card -->
@endsection

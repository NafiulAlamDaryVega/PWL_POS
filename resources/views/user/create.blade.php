@extends('layout.app')

{{-- Customize layout sections --}}
@section('subtitle', 'User')
@section('content_header_title', 'User')
@section('content_header_subtitle', 'Create')

{{-- Content body: main page content --}}
@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Data User</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="../user">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Masukkan Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
                </div>
                <div class="form-group">
                    <label for="level_id">Level Id</label>
                    <input type="text" class="form-control" id="level_id" placeholder="Masukkan Level ID">
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

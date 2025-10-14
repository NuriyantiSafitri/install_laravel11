@extends('layouts.app')

@section('title', 'Daftar Produk Fashion')

@section('content')
<div class="card shadow-sm mb-4">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="h4 mb-0">Daftar Produk Fashion</h2>
      <a href="#" class="btn btn-success btn-sm">+ Tambah Produk</a>
    </div>

    <table class="table table-bordered table-striped">
      <thead class="table-light">
        <tr>
          <th style="width:60px">No</th>
          <th>Nama Produk</th>
          <th>Excerpt</th>
          <th style="width:120px">Published</th>
          <th style="width:140px">Tanggal</th>
          <th style="width:160px">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($articles as $i => $article)
          <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $article['title'] }}</td>
            <td>{{ $article['excerpt'] }}</td>
            <td>{{ $article['is_published'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $article['created_at'] }}</td>
            <td>
              <a href="#" class="btn btn-sm btn-warning">Edit</a>
              <a href="#" class="btn btn-sm btn-danger">Hapus</a>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="text-center">Belum ada data.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection

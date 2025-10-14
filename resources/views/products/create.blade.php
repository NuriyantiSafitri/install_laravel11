@extends('layouts.app')

@section('title', 'Eloquent Create')

@section('content')
<div class="row">
  <div class="col-md-8">
    <h1 class="mb-3">Eloquent Create</h1>

    {{-- tampilkan pesan sukses --}}
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- FORM --}}
    <div class="card mb-4">
      <div class="card-body">
        <form action="{{ route('products.store') }}" method="POST">
          @csrf

          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
          </div>

          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga') ?? 0 }}" required>
          </div>

          <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" value="{{ old('stok') ?? 0 }}" required>
          </div>

          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea>
          </div>

          <button class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>

    {{-- Tabel produk --}}
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Daftar Produk</h5>

        <div class="table-responsive">
          <table class="table table-sm table-bordered align-middle">
            <thead class="table-light">
              <tr>
                <th style="width:60px">#</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>created_at</th>
                <th>updated_at</th>
              </tr>
            </thead>
            <tbody>
              @forelse($products as $p)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $p->nama }}</td>
                  <td>Rp {{ number_format($p->harga,0,',','.') }}</td>
                  <td>{{ $p->stok }}</td>
                  <td>{{ \Illuminate\Support\Str::limit($p->deskripsi, 60) }}</td>
                  <td>{{ $p->created_at ? $p->created_at->format('Y-m-d H:i:s') : '-' }}</td>
                  <td>{{ $p->updated_at ? $p->updated_at->format('Y-m-d H:i:s') : '-' }}</td>
                </tr>
              @empty
                <tr><td colspan="7" class="text-center">Belum ada data.</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>

      </div>
    </div>

  </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Daftar Artikel')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Daftar Artikel</h1>
        <a href="{{ route('articles.create') }}" class="btn btn-primary">+ Tambah Artikel</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Judul</th>
                <th>Excerpt</th>
                <th>Publikasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>{{ $article->excerpt }}</td>
                <td>{{ $article->is_published ? 'Ya' : 'Tidak' }}</td>
                <td>
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $articles->links() }}
@endsection

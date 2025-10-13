@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Buat Artikel</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <div>
            <label>Judul</label><br>
            <input type="text" name="title" value="{{ old('title') }}" required>
        </div>

        <div>
            <label>Excerpt</label><br>
            <textarea name="excerpt" rows="3">{{ old('excerpt') }}</textarea>
        </div>

        <div>
            <label>Body</label><br>
            <textarea name="body" rows="8" required>{{ old('body') }}</textarea>
        </div>

        <div>
            <label><input type="checkbox" name="is_published" {{ old('is_published') ? 'checked' : '' }}> Publikasikan</label>
        </div>

        <div>
            <button type="submit">Simpan Artikel</button>
            <a href="{{ route('articles.index') }}">Kembali</a>
        </div>
    </form>
</div>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>👕 Dashboard Barang Fashion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #0d6efd;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            background: #0056b3;
            padding: 8px 15px;
            border-radius: 6px;
        }
        .navbar a:hover {
            background: #003f7f;
        }
        .container {
            margin-top: 40px;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .add {
            display: inline-block;
            margin-bottom: 15px;
            padding: 8px 15px;
            background: #198754;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
        .add:hover { background: #146c43; }
        .edit {
            background: #ffc107;
            padding: 5px 10px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
        .delete {
            background: #dc3545;
            padding: 5px 10px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        };
    </style>
</head>

<body>
    <div class="navbar">
        <h3>👕 Dashboard Fashion Store</h3>
        <div>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('logout') }}">Logout</a>
        </div>
    </div>

    <div class="container">
        <h2 class="text-center mb-4">🧾 Daftar Produk Fashion</h2>

        <a href="#" class="add">+ Tambah Produk</a>

        <table class="table table-bordered table-striped align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Ukuran</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($produk) && count($produk) > 0)
                    @foreach ($produk as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item['nama'] }}</td>
                            <td>{{ $item['kategori'] }}</td>
                            <td>{{ $item['ukuran'] }}</td>
                            <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                            <td>{{ $item['stok'] }}</td>
                            <td>
                                <a href="#" class="edit">Edit</a>
                                <a href="#" class="delete">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="text-center text-muted">Belum ada produk ditambahkan.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>

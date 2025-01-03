@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Produk</title>
    </head>
    <style>
/* Container styling */
.container {
    padding: 2rem;
    max-width: 1200px;
    margin: 0 auto; 
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Header styling */
h1 {
    color: white;
    font-weight: bold;
    margin-bottom: 1.5rem;
    font-size: 24px;
    text-align: center;
    text-transform: uppercase;
    border-bottom: 2px solid #3498db; /* Garis bawah biru */
    display: inline-block;
    padding-bottom: 5px;
}

.header-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
}

.btn-primary {
    padding: 1rem 2rem;
    background: linear-gradient(135deg, #3498db, #2980b9);
    border: none;
    border-radius: 50px;
    font-weight: 600;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
    color: white;
    text-decoration: none;
    text-align: center;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #2980b9, #3498db);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(52, 152, 219, 0.4);
}

/* Table styling */
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1.5rem;
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.table thead {
    background-color: #007bff; /* Biru */
    color: white;
    text-transform: uppercase;
}

.table th, .table td {
    padding: 12px 15px;
    text-align: center;
    font-size: 14px;
    border-bottom: 1px solid #ddd;
}

.table tbody tr:nth-child(even) {
    background-color: #f2f2f2; /* Abu-abu terang */
}

.table tbody tr:hover {
    background-color: #e9f5ff; /* Biru sangat terang */
    cursor: pointer;
}

/* Numbering column */
.table td:first-child {
    font-weight: bold;
    color: #3498db;
}

/* Price column styling */
.table td:nth-child(4) {
    color: #28a745; /* Hijau */
    font-weight: bold;
}

/* Action buttons styling */
.btn-warning, .btn-danger {
    padding: 6px 12px;
    font-size: 14px;
    border-radius: 4px;
    text-transform: uppercase;
    font-weight: bold;
    transition: background-color 0.3s ease, transform 0.3s ease;
    display: inline-block;
    cursor: pointer;
}

.btn-warning {
    background-color: #ffc107; /* Kuning */
    color: #333;
}

.btn-warning:hover {
    background-color: #e0a800; /* Kuning gelap */
    transform: translateY(-2px);
}

.btn-danger {
    background-color: #dc3545; /* Merah */
    color: white;
}

.btn-danger:hover {
    background-color: #c82333; /* Merah gelap */
    transform: translateY(-2px);
}

/* Empty state styling */
.text-center {
    padding: 20px;
    color: #6c757d;
    font-style: italic;
    background-color: #f8f9fa;
    border-radius: 4px;
    font-size: 16px;
}

/* Responsive styling */
@media (max-width: 768px) {
    .container {
        padding: 1rem;
    }

    h1 {
        font-size: 20px;
    }

    .btn-primary {
        width: 100%;
    }

    .table th, .table td {
        font-size: 12px;
        padding: 8px;
    }

    .btn-warning, .btn-danger {
        padding: 5px 10px;
        font-size: 12px;
    }
}

    </style>
    <body>
        <div class="container">
            <div class="header-wrapper">
            <h1>Produk</h1>
                    
            <!-- Tombol Tambah Produk -->
            <a href="{{ route('products.create') }}" class="btn btn-primary">Tambah Produk</a>
            </div>
        
            <!-- Tabel Produk -->
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td> <!-- Penomoran otomatis -->
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
                                
                                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada produk</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </body>
    </html>
@endsection

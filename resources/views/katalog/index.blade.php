@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')
 <h1>Katalog Produk</h1>
 <p>Harga dan stok toko</p>

 {{-- Form Pencarian --}}
 <form method="GET" action="{{ route('katalog.index') }}">
     <label for="q">Nama produk</label>
     <input id="q" name="q" value="{{ $q ?? '' }}">
     <button type="submit">Cari</button>
 </form>
    <hr>

 {{-- Daftar Produk Hasil Filter --}}
 @forelse ($produk as $item)
     <div style="margin-top: 10px;">
         <p><strong>{{ $item['nama'] }}</strong></p>
         <p>Rp {{ number_format($item['harga'], 0, ',', '.') }}</p>
    
    
         <p>
             @if ($item['stok'] > 0)
                 <span style="color: green;">Stok: {{ $item['stok'] }} (Tersedia)</span>
             @else
                 <span style="color: red;">Stok Habis</span>
             @endif
         </p>
    
        </div>
     <hr>
 @empty
     <p style="color: red; margin-top: 10px;">Produk tidak ditemukan.</p>
 @endforelse

@endsection
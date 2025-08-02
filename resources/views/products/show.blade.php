@extends('layouts.app')

@section('content')
    <div class="bg-cover bg-center min-h-screen p-4" style="background-image: url('https://via.placeholder.com/1920x1080');">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold mb-8 text-center" style="color: #A594F9;">Detail Produk</h1>

            <div class="bg-white bg-opacity-90 shadow-xl rounded-xl p-8 mb-8" style="border-color: #CABBE9;">
                <h2 class="text-2xl font-semibold mb-4" style="color: #6A5ACD;">Informasi Produk</h2>
                <p class="text-lg"><strong>Nama:</strong> {{ $product->name }}</p>
                <p class="text-lg"><strong>Harga:</strong> {{ $product->price }} €</p>
                <p class="text-lg"><strong>Warna:</strong> {{ $product->color }}</p>
                <p class="text-lg"><strong>Memori RAM:</strong> {{ $product->memory_ram }}</p>
                <p class="text-lg"><strong>Kategori:</strong> {{ $product->category->name }}</p>
            </div>

            <div class="bg-white bg-opacity-90 shadow-xl rounded-xl p-8 mb-8" style="border-color: #CABBE9;">
                <h2 class="text-2xl font-semibold mb-4" style="color: #A594F9;">Tambah Ulasan Kamu</h2>
                <form action="{{ route('ratings.store', $product->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="comment" class="block font-medium mb-2" style="color: #6A5ACD;">Komentar</label>
                        <textarea name="comment" id="comment"
                            class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-#A594F9 transition duration-200"
                            style="border-color: #CABBE9;" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="score" class="block font-medium mb-2" style="color: #6A5ACD;">Nilai (0-5)</label>
                        <input type="number" name="score" id="score" min="0" max="5"
                            class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-#A594F9 transition duration-200"
                            style="border-color: #CABBE9;" required>
                    </div>
                    <button type="submit" class="text-white px-6 py-3 rounded-xl font-semibold transition duration-200"
                        style="background-color: #A594F9;" onmouseover="this.style.backgroundColor='#8875E5'"
                        onmouseout="this.style.backgroundColor='#A594F9'">
                        Kirim Ulasan
                    </button>
                </form>
            </div>

            <div class="bg-white bg-opacity-90 shadow-xl rounded-xl p-8 mb-8" style="border-color: #CABBE9;">
                <h2 class="text-2xl font-semibold mb-4" style="color: #A594F9;">Ulasan dari Pelanggan</h2>
                @foreach ($product->ratings as $rating)
                    <div class="mb-6">
                        <p class="text-lg"><strong>Nilai:</strong> {{ $rating->score }}/5</p>
                        <p class="text-lg"><strong>Komentar:</strong> {{ $rating->comment }}</p>
                    </div>
                @endforeach
            </div>

            <a href="{{ route('products.index') }}"
                class="text-white px-6 py-3 rounded-xl font-semibold transition duration-200 inline-block"
                style="background-color: #A594F9;" onmouseover="this.style.backgroundColor='#8875E5'"
                onmouseout="this.style.backgroundColor='#A594F9'">
                Kembali ke Daftar Produk
            </a>
        </div>
    </div>
@endsection

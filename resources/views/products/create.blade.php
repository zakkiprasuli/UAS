@extends('layouts.app')

@section('content')
    <div class="bg-cover bg-center min-h-screen flex items-center justify-center"
        style="background-image: url('https://via.placeholder.com/1920x1080');">
        <div class="w-full max-w-md mx-4">
            <div class="bg-white bg-opacity-90 shadow-xl rounded-xl p-8">
                <h1 class="text-3xl font-bold mb-8 text-center" style="color: #1202ff;">Buat Produk Baru</h1>

                <form action="{{ route('products.store') }}" method="POST">
                    @csrf

                    <div class="mb-6">
                        <label for="name" class="block font-medium mb-2" style="color: #2200ff;">Nama Produk</label>
                        <input type="text" name="name" id="name"
                            class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-#A594F9 focus:border-#A594F9 transition duration-200"
                            style="border-color: #CABBE9;" required>
                    </div>

        <div class="mb-6">
            <label for="price" class="block font-medium mb-2" style="color: #2200ff;">Harga (Rp)</label>
                <div class="relative">
                    <span class="absolute left-3 top-3 text-gray-500">Rp</span>
                <input type="number" step="1" min="0" name="price" id="price"
                    class="w-full pl-12 pr-4 py-3 border rounded-xl focus:ring-2 focus:ring-#A594F9 focus:border-#A594F9 transition duration-200"
                    style="border-color: #CABBE9;" required>
            </div>
        </div>

                
                    <div class="mb-6">
                        <label for="color" class="block font-medium mb-2" style="color: #2200ff;">Warna</label>
                        <input type="text" name="color" id="color"
                            class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-#A594F9 focus:border-#A594F9 transition duration-200"
                            style="border-color: #CABBE9;">
                    </div>

                    <div class="mb-6">
                        <label for="memory_ram" class="block font-medium mb-2" style="color: #2200ff;">RAM (jika ada)</label>
                        <input type="text" name="memory_ram" id="memory_ram"
                            class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-#A594F9 focus:border-#A594F9 transition duration-200"
                            style="border-color: #CABBE9;">
                    </div>

                    <div class="mb-6">
                        <label for="category_id" class="block font-medium mb-2" style="color: #2200ff;">Kategori</label>
                        <select name="category_id" id="category_id"
                            class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-#A594F9 focus:border-#A594F9 transition duration-200"
                            style="border-color: #CABBE9;" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center justify-center">
                        <button type="submit"
                            class="w-full text-white px-6 py-3 rounded-xl font-semibold transition duration-200"
                            style="background-color: #A594F9;" onmouseover="this.style.backgroundColor='#8875E5'"
                            onmouseout="this.style.backgroundColor='#A594F9'">
                            Simpan Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6" style="color: #2700e8;">Daftar Produk</h1>

        <a href="{{ route('products.create') }}"
            class="text-white px-6 py-3 rounded-xl font-semibold transition duration-200 mb-6 inline-block"
            style="background-color: #2b00ff;" onmouseover="this.style.backgroundColor='#8875E5'"
            onmouseout="this.style.backgroundColor='#A594F9'">
            Tambah Produk Baru
        </a>

        <div class="bg-white bg-opacity-90 shadow-xl rounded-xl p-6 mb-8" style="border-color: #CABBE9;">
            <form action="{{ route('products.index') }}" method="GET" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="category_id" class="block font-medium mb-2" style="color: #2200ff;">Filter berdasarkan
                            kategori</label>
                        <select name="category_id" id="category_id"
                            class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-#A594F9 transition duration-200"
                            style="border-color: #CABBE9;">
                            <option value="">Semua Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="sort" class="block font-medium mb-2" style="color: #2200ff;">Urutkan berdasarkan</label>
                        <select name="sort" id="sort"
                            class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-#A594F9 transition duration-200"
                            style="border-color: #CABBE9;">
                            <option value="">Pilih...</option>
                            <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Nama</option>
                            <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>Harga</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="text-white px-6 py-3 rounded-xl font-semibold transition duration-200"
                    style="background-color: #2b00ff;" onmouseover="this.style.backgroundColor='#8875E5'"
                    onmouseout="this.style.backgroundColor='#A594F9'">
                    Terapkan Filter
                </button>
            </form>
        </div>

        <div class="bg-white bg-opacity-90 shadow-xl rounded-xl overflow-hidden" style="border-color: #CABBE9;">
            <table class="min-w-full">
                <thead style="background-color: #F3E8FF;">
                    <tr>
                        <th class="px-6 py-3 text-left font-medium" style="color: #6A5ACD;">Nama</th>
                        <th class="px-6 py-3 text-left font-medium" style="color: #6A5ACD;">Harga</th>
                        <th class="px-6 py-3 text-left font-medium" style="color: #6A5ACD;">Warna</th>
                        <th class="px-6 py-3 text-left font-medium" style="color: #6A5ACD;">RAM</th>
                        <th class="px-6 py-3 text-left font-medium" style="color: #6A5ACD;">Kategori</th>
                        <th class="px-6 py-3 text-left font-medium" style="color: #6A5ACD;">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y" style="border-color: #CABBE9;">
                    @foreach ($products as $product)
                        <tr class="hover:bg-[#F0E6FF] transition">
                            <td class="px-6 py-4" style="color: #6A5ACD;">{{ $product->name }}</td>
                            <td class="px-6 py-4" style="color: #6A5ACD;">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="px-6 py-4" style="color: #6A5ACD;">{{ $product->color }}</td>
                            <td class="px-6 py-4" style="color: #6A5ACD;">{{ $product->memory_ram }}</td>
                            <td class="px-6 py-4" style="color: #6A5ACD;">{{ $product->category->name }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('products.show', $product->id) }}"
                                    class="font-medium transition duration-200" style="color: #A594F9;"
                                    onmouseover="this.style.color='#8875E5'" onmouseout="this.style.color='#A594F9'">
                                    Lihat
                                </a>
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="font-medium transition duration-200" style="color: #6A5ACD;"
                                    onmouseover="this.style.color='#5548C8'" onmouseout="this.style.color='#6A5ACD'">
                                    Edit
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium transition duration-200"
                                        style="color: #FF6B8B;" onmouseover="this.style.color='#E05575'"
                                        onmouseout="this.style.color='#FF6B8B'">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

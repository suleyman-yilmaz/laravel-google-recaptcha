@extends('layouts.app')
@section('content')
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Kullanıcı Listesi</h1>
            <a href="{{ route('logout') }}" class="text-sm text-blue-600 hover:underline">Çıkış Yap</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left border-b">#</th>
                        <th class="px-4 py-2 text-left border-b">ID</th>
                        <th class="px-4 py-2 text-left border-b">Ad Soyad</th>
                        <th class="px-4 py-2 text-left border-b">E-posta</th>
                        <th class="px-4 py-2 text-left border-b">Kayıt Tarihi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($users as $item)
                        <tr>
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $item->id }}</td>
                            <td class="px-4 py-2">{{ $item->name }}</td>
                            <td class="px-4 py-2">{{ $item->email }}</td>
                            <td class="px-4 py-2">{{ $item->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

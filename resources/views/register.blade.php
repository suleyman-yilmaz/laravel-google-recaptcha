@extends('layouts.app')

@section('content')
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Kayıt Ol</h2>
        <form class="space-y-4" method="POST" action="{{ route('register.post') }}">
            @csrf

            <div>
                <label class="block mb-1 font-medium">Ad Soyad</label>
                <input type="text" name="name"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('name') }}" required />
            </div>

            <div>
                <label class="block mb-1 font-medium">E-posta</label>
                <input type="email" name="email"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('email') }}" required />
            </div>

            <div>
                <label class="block mb-1 font-medium">Şifre</label>
                <input type="password" name="password"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required />
            </div>

            <div>
                <label class="block mb-1 font-medium">Şifre Doğrula</label>
                <input type="password" name="password_confirmation"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required />
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Kayıt
                Ol</button>
        </form>
        <p class="text-sm text-center mt-4">Zaten hesabın var mı? <a href="{{ route('login.index') }}"
                class="text-blue-600 hover:underline">Giriş Yap</a></p>
    </div>
@endsection

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kayıt Ol</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Başarılı!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 3000, // 3 saniye sonra kapanacak
                toast: true,
                position: 'top-end'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Hata!',
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 3000, // 3 saniye sonra kapanacak
                toast: true,
                position: 'top-end'
            });
        </script>
    @endif
    @yield('content')
</body>

</html>

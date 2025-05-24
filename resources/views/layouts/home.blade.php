<!-- resources/views/layouts/home.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Klinik Sederhana</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="navbar bg-primary text-primary-content px-4">
        <div class="flex-1">
            <a href="{{ url('/home') }}" class="btn btn-ghost normal-case text-xl">Dashboard {{ ucfirst(Auth::user()->role) }}</a>
            <a href="{{ route('pasien.index') }}" class="btn btn-ghost normal-case ml-2">Data Pasien</a>

            @auth
                @php $role = Auth::user()->role; @endphp

                @if($role === 'pendaftaran')
                    <a href="{{ route('pasien.create') }}" class="btn btn-ghost normal-case ml-2">Tambah Pasien</a>
                @endif

                @if($role === 'apoteker')
                    <a href="{{ route('obat.index') }}" class="btn btn-ghost normal-case ml-2">Kelola Obat</a>
                @endif
            @endauth
        </div>

        <div class="flex-none gap-2">

            <label class="swap swap-rotate cursor-pointer mx-2">
                <input type="checkbox" id="dark-toggle" class="hidden" />
                <!-- Sun Icon -->
                <svg class="swap-off fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m8.485-8.485l-.707.707M4.222 4.222l-.707.707M21 12h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <!-- Moon Icon -->
                <svg class="swap-on fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3a7 7 0 009.79 9.79z" />
                </svg>
            </label>

            @auth
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button 
                        type="submit" 
                        class="btn btn-secondary"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    >
                        Logout
                    </button>
                </form>
            @endauth
        </div>
    </div>

    @yield('content')
</body>

<script>
  const html = document.documentElement;
  const toggle = document.getElementById('dark-toggle');
  const savedTheme = localStorage.getItem('theme') || 'light';

  html.setAttribute('data-theme', savedTheme);
  toggle.checked = savedTheme === 'dark';

  toggle.addEventListener('change', () => {
    if (toggle.checked) {
      html.setAttribute('data-theme', 'dark');
      localStorage.setItem('theme', 'dark');
    } else {
      html.setAttribute('data-theme', 'light');
      localStorage.setItem('theme', 'light');
    }
  });
</script>

</html>

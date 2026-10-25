<x-guest-layout>
  <h5 class="text-center text-dark mt-2">Buat akun baru</h5>
  <p class="text-center text-muted small mb-4">Daftar untuk mengelola tiket konser.</p>

  <form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="mb-3">
      <label for="name">Nama</label>
      <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
      @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
      <label for="email">Email</label>
      <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
      @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
      <label for="password">Password</label>
      <input id="password" type="password" name="password" required autocomplete="new-password">
      @error('password')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
      <label for="password_confirmation">Ulangi password</label>
      <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
    </div>
    <button type="submit">Daftar</button>
  </form>

  <div class="text-center small mt-4">
    <span class="text-muted">Sudah punya akun?</span> <a href="{{ route('login') }}">Masuk</a>
  </div>
</x-guest-layout>

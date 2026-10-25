<x-guest-layout>
  <h5 class="text-center text-dark mt-2">Masuk ke akun</h5>
  <p class="text-center text-muted small mb-4">Kelola tiket & stok konser punk.</p>

  @if(session('status'))<div class="alert alert-success py-2 small">{{ session('status') }}</div>@endif

  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-3">
      <label for="email">Email</label>
      <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
      @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
      <label for="password">Password</label>
      <input id="password" type="password" name="password" required autocomplete="current-password">
      @error('password')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
    </div>
    <div class="form-check mb-2">
      <input type="checkbox" class="form-check-input" id="remember" name="remember">
      <label class="form-check-label" for="remember">Ingat saya</label>
    </div>
    <button type="submit">Masuk</button>
  </form>

  <div class="text-center small mt-4">
    @if(Route::has('password.request'))<a href="{{ route('password.request') }}">Lupa password?</a><br>@endif
    <span class="text-muted">Belum punya akun?</span> <a href="{{ route('register') }}">Daftar</a>
  </div>
</x-guest-layout>

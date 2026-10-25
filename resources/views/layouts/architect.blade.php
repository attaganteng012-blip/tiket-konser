<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title', 'Tiket Konser') | Architect</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<style>
:root{--p:#3f6ad8;--s:#3ac47d;--d:#d92550;--w:#f7b924;--i:#16aaff}
body{font-family:'Open Sans',sans-serif;background:#f1f4f6;color:#495057;font-size:.88rem}
.tb{position:fixed;top:0;left:0;right:0;height:60px;background:#fff;box-shadow:0 .47rem 2.19rem rgba(4,9,20,.03);display:flex;align-items:center;gap:14px;padding:0 20px;z-index:1040}
.logo{font-family:'Kaushan Script',cursive;font-size:1.7rem;color:#000;width:215px;text-decoration:none}
.ib{width:34px;height:34px;border-radius:50%;display:grid;place-items:center;border:0;background:#e8eefc;color:var(--p)}
.sb{position:fixed;top:60px;bottom:0;left:0;width:250px;background:linear-gradient(180deg,#16b3a0 0%,#6fc34a 65%,#a1cb2b 100%);color:#fff;overflow:auto;z-index:1030;padding:10px 0 30px;transition:.2s}
.sb h6{font-size:.68rem;letter-spacing:.6px;font-weight:700;margin:16px 22px 6px;opacity:.9}
.sb a{display:flex;gap:10px;align-items:center;color:#fff;text-decoration:none;padding:8px 22px;opacity:.9}
.sb a.on{background:rgba(255,255,255,.28);border-radius:4px;margin:0 14px;padding:7px 10px;opacity:1;font-weight:600}
.main{margin-left:250px;padding:84px 28px 30px}
.card{border:0;border-radius:.25rem;background:#fff;box-shadow:0 .47rem 2.19rem rgba(4,9,20,.03),0 .94rem 1.4rem rgba(4,9,20,.03),0 .25rem .53rem rgba(4,9,20,.05)}
.card-h{padding:.75rem 1.25rem;border-bottom:1px solid #f1f4f6;color:#343a40}
.pg-ic{width:50px;height:50px;border-radius:.25rem;background:#fff;display:grid;place-items:center;box-shadow:0 .25rem .53rem rgba(4,9,20,.05)}
.ic{width:34px;height:34px;border-radius:50%;display:grid;place-items:center;color:#fff;flex:none}
.big{font-size:1.9rem;font-weight:600;color:#343a40;line-height:1.1}
.tab{display:inline-block;padding:7px 14px;border-radius:.25rem;color:#343a40;text-decoration:none}
.tab.on{background:var(--p);color:#fff}
.btn-primary{background:var(--p);border-color:var(--p)}
.btn-pill{border-radius:30px;padding:.4rem 1.6rem;font-weight:600}
.poster{height:150px;border-radius:.25rem .25rem 0 0;background:linear-gradient(135deg,#16b3a0,#a1cb2b);color:#fff;display:grid;place-items:center;font-size:2.4rem;font-weight:700;object-fit:cover;width:100%}
.progress{height:6px}
@media(max-width:991px){.sb{transform:translateX(-100%)}.sb.open{transform:none}.main{margin-left:0;padding:84px 14px 30px}.logo{width:auto}.hide-sm{display:none!important}}
</style>
</head>
<body>
<header class="tb">
  <button class="ib d-lg-none" onclick="document.querySelector('.sb').classList.toggle('open')"><i class="bi bi-list"></i></button>
  <a class="logo" href="{{ route('tickets.index') }}">Architect</a>
  <span class="ib hide-sm"><i class="bi bi-search"></i></span>
  <span class="hide-sm text-muted"><i class="bi bi-grid"></i> Mega Menu &nbsp; <i class="bi bi-gear"></i> Settings &nbsp; <i class="bi bi-folder2"></i> Projects</span>
  <div class="ms-auto dropdown">
    <a class="d-flex align-items-center gap-2 text-decoration-none text-dark" data-bs-toggle="dropdown" href="#">
      <span class="ic" style="background:var(--p)"><i class="bi bi-person-fill"></i></span>
      <span class="hide-sm lh-sm"><b>{{ auth()->user()->name ?? 'Tamu' }}</b><br><small class="text-muted">Admin Tiket</small></span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
      <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a></li>
      <li><form method="POST" action="{{ route('logout') }}">@csrf<button class="dropdown-item">Logout</button></form></li>
    </ul>
  </div>
</header>

<nav class="sb">
  <h6>MENU</h6>
  <a class="{{ request()->routeIs('tickets.index','tickets.show') ? 'on' : '' }}" href="{{ route('tickets.index') }}"><i class="bi bi-ticket-perforated"></i> Daftar Tiket</a>
  <a class="{{ request()->routeIs('tickets.create') ? 'on' : '' }}" href="{{ route('tickets.create') }}"><i class="bi bi-plus-square"></i> Tambah Tiket</a>
  <h6>KATEGORI</h6>
  @foreach(\App\Models\Ticket::CATEGORIES as $c)
    <a href="{{ route('tickets.index', ['category' => $c]) }}"><i class="bi bi-tag"></i> {{ $c }}</a>
  @endforeach
  <h6>AKUN</h6>
  <a href="{{ route('profile.edit') }}"><i class="bi bi-person"></i> Profil</a>
</nav>

<main class="main">
  <div class="d-flex align-items-center mb-3 gap-3">
    <div class="pg-ic"><i class="bi bi-ticket-perforated text-danger fs-4"></i></div>
    <div><div class="fs-5 text-dark">@yield('title')</div><div class="text-muted small">@yield('subtitle', 'Kelola tiket & stok konser Pop-Punk / Punk Rock Indonesia.')</div></div>
    <div class="ms-auto">@yield('action')</div>
  </div>

  @if(session('ok'))<div class="alert alert-success py-2">{{ session('ok') }}</div>@endif
  @if($errors->any())<div class="alert alert-danger py-2">Periksa kembali isian yang ditandai merah.</div>@endif

  @yield('content')
</main>

<div class="modal fade" id="delModal" tabindex="-1"><div class="modal-dialog modal-dialog-centered">
  <form method="POST" id="delForm" class="modal-content">@csrf @method('DELETE')
    <div class="modal-body text-center p-4">
      <i class="bi bi-exclamation-circle text-danger" style="font-size:3rem"></i>
      <h5 class="mt-2">Hapus tiket ini?</h5>
      <p class="text-muted mb-0">Tiket <b id="delName"></b> akan dihapus permanen.</p>
    </div>
    <div class="modal-footer justify-content-center border-0">
      <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
      <button class="btn btn-danger">Ya, hapus</button>
    </div>
  </form>
</div></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('click', e => {
  const b = e.target.closest('[data-del]'); if (!b) return;
  document.getElementById('delForm').action = b.dataset.del;
  document.getElementById('delName').textContent = b.dataset.name;
  new bootstrap.Modal('#delModal').show();
});
</script>
</body>
</html>

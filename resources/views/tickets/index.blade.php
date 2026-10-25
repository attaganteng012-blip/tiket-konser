@extends('layouts.architect')
@section('title', 'Tiket Konser Dashboard')
@section('action')
  <a href="{{ route('tickets.create') }}" class="btn btn-info text-white btn-sm"><i class="bi bi-plus-lg"></i> Tambah Tiket</a>
@endsection

@section('content')
<div class="mb-3">
  @foreach(['' => 'Semua'] + array_combine($categories, $categories) as $k => $v)
    <a class="tab {{ request('category', '') === $k ? 'on' : '' }}" href="{{ route('tickets.index', array_filter(['q' => request('q'), 'category' => $k])) }}">{{ $v }}</a>
  @endforeach
</div>

<div class="card mb-4">
  <div class="card-h">Ringkasan Tiket</div>
  <div class="row g-3 p-3 text-center text-md-start">
    <div class="col-md-4 d-flex gap-3 align-items-center"><span class="ic" style="background:var(--w)"><i class="bi bi-music-note-beamed"></i></span><div><small class="text-muted">Total Konser</small><div class="big">{{ $stats['count'] }}</div></div></div>
    <div class="col-md-4 d-flex gap-3 align-items-center"><span class="ic" style="background:var(--d)"><i class="bi bi-ticket-perforated"></i></span><div><small class="text-muted">Total Stok Tiket</small><div class="big">{{ number_format($stats['stock'], 0, ',', '.') }}</div></div></div>
    <div class="col-md-4 d-flex gap-3 align-items-center"><span class="ic" style="background:var(--s)"><i class="bi bi-cash-stack"></i></span><div><small class="text-muted">Potensi Pendapatan</small><div class="big text-success">Rp {{ number_format($stats['value'], 0, ',', '.') }}</div></div></div>
  </div>
</div>

<form class="card p-3 mb-4 flex-row gap-2" method="GET">
  <input name="q" value="{{ request('q') }}" class="form-control" placeholder="Cari band, event, atau venue...">
  <select name="category" class="form-select w-auto">
    <option value="">Semua kategori</option>
    @foreach($categories as $c)<option @selected(request('category') === $c)>{{ $c }}</option>@endforeach
  </select>
  <button class="btn btn-primary"><i class="bi bi-search"></i></button>
</form>

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
@forelse($tickets as $t)
  <div class="col"><div class="card h-100">
    @if($t->poster_url)<img src="{{ $t->poster_url }}" class="poster" alt="{{ $t->band }}">@else<div class="poster">{{ mb_substr($t->band, 0, 2) }}</div>@endif
    <div class="p-3 d-flex flex-column h-100">
      <div class="d-flex justify-content-between mb-1">
        <span class="badge bg-{{ $t->category_color }}">{{ $t->category }}</span>
        <span class="badge bg-{{ $t->stock_status[1] }}">{{ $t->stock_status[0] }}</span>
      </div>
      <a href="{{ route('tickets.show', $t) }}" class="fs-6 fw-bold text-dark text-decoration-none">{{ $t->band }}</a>
      <div class="text-muted small">{{ $t->event }}</div>
      <div class="small mt-2"><i class="bi bi-geo-alt"></i> {{ $t->venue }}</div>
      <div class="small"><i class="bi bi-calendar-event"></i> {{ $t->event_date->translatedFormat('d M Y, H:i') }}</div>
      <div class="d-flex justify-content-between align-items-end mt-3">
        <div class="fs-5 fw-bold text-success">Rp {{ number_format($t->price, 0, ',', '.') }}</div>
        <small class="text-muted">Stok {{ $t->stock }}</small>
      </div>
      <div class="progress mt-1"><div class="progress-bar bg-{{ $t->stock_status[1] }}" style="width:{{ min(100, $t->stock / 5) }}%"></div></div>
      <div class="d-flex gap-2 mt-3 pt-1">
        <a href="{{ route('tickets.show', $t) }}" class="btn btn-sm btn-outline-dark flex-fill">Detail</a>
        <a href="{{ route('tickets.edit', $t) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
        <button type="button" class="btn btn-sm btn-danger" data-del="{{ route('tickets.destroy', $t) }}" data-name="{{ $t->band }}"><i class="bi bi-trash"></i></button>
      </div>
    </div>
  </div></div>
@empty
  <div class="col-12"><div class="card p-4 text-center text-muted">Belum ada tiket yang cocok. <a href="{{ route('tickets.create') }}">Tambah tiket baru</a></div></div>
@endforelse
</div>

<div class="mt-4">{{ $tickets->links('pagination::bootstrap-5') }}</div>
@endsection

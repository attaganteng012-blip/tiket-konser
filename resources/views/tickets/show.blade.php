@extends('layouts.architect')
@section('title', $ticket->band)
@section('subtitle', $ticket->event)
@section('action')
  <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i> Edit</a>
  <button type="button" class="btn btn-danger btn-sm" data-del="{{ route('tickets.destroy', $ticket) }}" data-name="{{ $ticket->band }}"><i class="bi bi-trash"></i> Hapus</button>
@endsection

@section('content')
<div class="card"><div class="row g-0">
  <div class="col-md-4">
    @if($ticket->poster_url)<img src="{{ $ticket->poster_url }}" class="poster" style="height:100%;min-height:240px;border-radius:.25rem 0 0 .25rem" alt="">@else<div class="poster" style="height:100%;min-height:240px">{{ mb_substr($ticket->band, 0, 2) }}</div>@endif
  </div>
  <div class="col-md-8 p-4">
    <span class="badge bg-{{ $ticket->category_color }}">{{ $ticket->category }}</span>
    <span class="badge bg-{{ $ticket->stock_status[1] }}">{{ $ticket->stock_status[0] }}</span>
    <div class="big text-success my-2">Rp {{ number_format($ticket->price, 0, ',', '.') }}</div>
    <p class="mb-1"><i class="bi bi-geo-alt"></i> {{ $ticket->venue }}</p>
    <p class="mb-1"><i class="bi bi-calendar-event"></i> {{ $ticket->event_date->translatedFormat('l, d F Y, H:i') }} WIB</p>
    <p><i class="bi bi-ticket-perforated"></i> Sisa stok: <b>{{ $ticket->stock }}</b></p>
    <hr>
    <p class="mb-0">{{ $ticket->description ?: 'Belum ada deskripsi acara.' }}</p>
  </div>
</div></div>
<a href="{{ route('tickets.index') }}" class="btn btn-light mt-3">Kembali ke daftar</a>
@endsection

@extends('layouts.architect')
@section('title', 'Edit Tiket Konser')
@section('content')
<div class="card"><div class="card-h">Ubah Data & Stok: {{ $ticket->band }}</div>
  <form class="p-4" method="POST" action="{{ route('tickets.update', $ticket) }}" enctype="multipart/form-data">
    @csrf @method('PUT')
    @include('tickets._form')
  </form>
</div>
@endsection

@extends('layouts.architect')
@section('title', 'Tambah Tiket Konser')
@section('content')
<div class="card"><div class="card-h">Data Tiket Baru</div>
  <form class="p-4" method="POST" action="{{ route('tickets.store') }}" enctype="multipart/form-data">
    @csrf
    @include('tickets._form')
  </form>
</div>
@endsection

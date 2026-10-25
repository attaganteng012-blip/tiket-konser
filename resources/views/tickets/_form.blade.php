@php
$fields = ['band' => ['Nama Konser/Band', 'text'], 'event' => ['Nama Event/Tour', 'text'], 'venue' => ['Lokasi/Venue', 'text'],
  'event_date' => ['Tanggal & Waktu Konser', 'datetime-local'], 'price' => ['Harga Tiket (Rp)', 'number'], 'stock' => ['Jumlah Stok Tiket', 'number']];
@endphp
<div class="row g-3">
@foreach($fields as $n => [$label, $type])
  <div class="col-md-6">
    <label class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $n }}" min="0" class="form-control @error($n) is-invalid @enderror"
      value="{{ old($n, isset($ticket) ? ($n === 'event_date' ? $ticket->event_date->format('Y-m-d\TH:i') : $ticket->$n) : '') }}">
    @error($n)<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
@endforeach
  <div class="col-md-6">
    <label class="form-label">Kategori Tiket</label>
    <select name="category" class="form-select @error('category') is-invalid @enderror">
      @foreach($categories as $c)<option @selected(old('category', $ticket->category ?? '') === $c)>{{ $c }}</option>@endforeach
    </select>
    @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-6">
    <label class="form-label">Poster Konser (jpg/png/webp, maks 2 MB)</label>
    <input type="file" name="poster" accept="image/*" class="form-control @error('poster') is-invalid @enderror">
    @error('poster')<div class="invalid-feedback">{{ $message }}</div>@enderror
    @if(isset($ticket) && $ticket->poster_url)<img src="{{ $ticket->poster_url }}" class="mt-2 rounded" height="70" alt="">@endif
  </div>
  <div class="col-12">
    <label class="form-label">Deskripsi Acara</label>
    <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $ticket->description ?? '') }}</textarea>
    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
</div>
<div class="mt-4 d-flex gap-2">
  <button class="btn btn-primary btn-pill">Simpan</button>
  <a href="{{ route('tickets.index') }}" class="btn btn-light btn-pill">Batal</a>
</div>

@extends('include.sidebar')

@section('content')
<p>Kembali</p>

<div class="content-activity w-100 rounded p-5">
  <div class="form-activity m-auto w-90 position-relative">
    <div class="title-activity">
      <h1>Day 1</h1>
    </div>
    <form action="" class="d-flex flex-wrap flex-row gap-3 justify-between">
      <div class="input-nama d-flex flex-column">
        <label for="nama">Nama</label>
        <input type="text" class="nama rounded border-1 p-2" required>
      </div>
      <div class="input-file">
        <label for="bukti">Bukti</label>
        <input type="file" class="bukti w-100 rounded p-2" required>
      </div>
      <div class="input-time">
        <div class="sikat-pagi d-flex mb-3 flex-row">
          <label for="pagi" class="w-100">Sikat gigi pagi</label>
          <input type="time" class="pagi w-100 border-1 rounded">
        </div>
        <div class="sikat-malam d-flex mb-3 flex-row">
          <label for="malam" class="w-100">Sikat gigi malam</label>
          <input type="time" class="malam w-100 border-1 rounded">
        </div>
      </div>
      <div class="input-deskripsi">
        <label for="deskripsi">Deskripsi makanan dan minuman yang dikonsumsi</label>
        <input type="text" class="deskripsi border-1 rounded w-100 p-5">
      </div>
      <button type="button" class="btn btn-danger rounded border-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Submit
      </button>
    </form>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('assets/js/components.js') }}"></script>
@endsection
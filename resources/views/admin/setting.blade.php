@extends('include.sidebar_admin')

@section('content')

<div class="container-setting">
    <form action="{{ route('admin.delete_data') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Reset</button>
    </form>
</div>

@endsection
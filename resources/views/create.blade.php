@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-12">
	<h2> Masukan Kelas </h2>
		<form action="{{ URL('/admin/kelas') }}{{ isset($progeram) ? '/' . $progeram->id : ''}}" method="POST">
			<div class="form-group">
			{{ csrf_field() }}
			@if (isset($user))
			{{ method_field('PUT') }}
			@endif
				<input type="text" name="nama" placeholder="Nama" class="form-control" value="{{ isset($progeram) ? $progeram->name : '' }}">
				<input type="text" name="pendaftaran" placeholder="Pendaftaran" class="form-control" value="{{ isset($progeram) ? $progeram->pendaftaran : '' }}">
				<input type="text" name="mulai" placeholder="Mulai" class="form-control" value="{{ isset($progeram) ? $progeram->mulai : '' }}">
				<input type="text" name="selesai" placeholder="Selesai" class="form-control" value="{{ isset($progeram) ? $progeram->selesai : '' }}">
				<button type="submit" class="btn btn-sm btn-success">Simpan</button>
			</div>
		</form>
	</div>
</div>

@endsection
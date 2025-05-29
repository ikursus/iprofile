@extends('admin.layout')

@section('title', 'Program Management')
@section('page-title', 'Senarai Program')

@section('page-actions')
<a href="{{ route('programs.create') }}" class="btn btn-primary">
    <i class="bi bi-plus"></i> Tambah Program Baru
</a>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Semua Program</h5>
    </div>
    <div class="card-body">
        @if($senaraiProgram->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">#</th>
                            <th width="30%">Nama Program</th>
                            <th width="25%">Kategori Program</th>
                            <th width="20%">Jenis Kemahiran</th>
                            <th width="20%">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($senaraiProgram as $program)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <i class="bi bi-bookmark"></i> {{ $program->nama_program }}
                                </td>
                                <td>
                                    @if($program->kategori_program)
                                        <span class="badge bg-info">{{ $program->kategori_program }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($program->jenis_kemahiran)
                                        <span class="badge bg-success">{{ $program->jenis_kemahiran }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-sm btn-outline-primary" href="{{ route('programs.show', $program->id) }}">
                                            <i class="bi bi-pencil"></i> Peserta
                                        </a>
                                        <a class="btn btn-sm btn-outline-primary" href="{{ route('programs.edit', $program->id) }}">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('programs.destroy', $program->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Adakah anda pasti ingin memadam program {{ $program->nama_program }}?')">
                                                <i class="bi bi-trash"></i> Padam
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-bookmark display-1 text-muted"></i>
                <h4 class="text-muted mt-3">Tiada Program Dijumpai</h4>
                <p class="text-muted">Belum ada program yang didaftarkan dalam sistem.</p>
                <a href="{{ route('programs.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i> Tambah Program Pertama
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
@extends('admin.layout')

@section('title', 'Maklumat Program')
@section('page-title', 'Maklumat Program')

@section('page-actions')
<div class="d-flex gap-2">
    <a href="{{ route('programs.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali ke Senarai
    </a>
    <a href="{{ route('programs.edit', $program->id) }}" class="btn btn-warning">
        <i class="bi bi-pencil"></i> Edit Program
    </a>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="bi bi-bookmark"></i> Maklumat Program
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Nama Program -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">
                            <i class="bi bi-bookmark"></i> Nama Program
                        </label>
                        <div class="form-control-plaintext border rounded px-3 py-2 bg-light">
                            {{ $program->nama_program }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Kategori Program -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            <i class="bi bi-tag"></i> Kategori Program
                        </label>
                        <div class="form-control-plaintext border rounded px-3 py-2 bg-light">
                            @if($program->kategori_program)
                                <span class="badge bg-info fs-6">
                                    {{ $program->kategori_program }}
                                </span>
                            @else
                                <span class="text-muted">Tidak dinyatakan</span>
                            @endif
                        </div>
                    </div>

                    <!-- Jenis Kemahiran -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            <i class="bi bi-gear"></i> Jenis Kemahiran
                        </label>
                        <div class="form-control-plaintext border rounded px-3 py-2 bg-light">
                            @if($program->jenis_kemahiran)
                                <span class="badge bg-success fs-6">
                                    {{ $program->jenis_kemahiran }}
                                </span>
                            @else
                                <span class="text-muted">Tidak dinyatakan</span>
                            @endif
                        </div>
                    </div>
                </div>

<!-- Users List Table -->
<div class="card mt-4">
    <div class="card-header bg-light">
        <h6 class="card-title mb-0">
            <i class="bi bi-people"></i> Senarai Peserta Program
        </h6>
    </div>
    <div class="card-body">
        @if($program->users->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. Telefon</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($program->users as $index => $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone ?? 'Tidak dinyatakan' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-3">
                <i class="bi bi-info-circle text-muted fs-1"></i>
                <p class="text-muted mb-0">Tiada peserta berdaftar dalam program ini</p>
            </div>
        @endif
    </div>
</div>

                <!-- Maklumat Sistem -->
                <div class="card mt-4">
                    <div class="card-header bg-light">
                        <h6 class="card-title mb-0">
                            <i class="bi bi-info-circle"></i> Maklumat Sistem
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    <i class="bi bi-calendar-plus"></i> Tarikh Dicipta
                                </label>
                                <div class="form-control-plaintext border rounded px-3 py-2 bg-light">
                                    {{ $program->created_at ? $program->created_at->format('d/m/Y H:i:s') : 'Tidak tersedia' }}
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    <i class="bi bi-calendar-check"></i> Tarikh Dikemaskini
                                </label>
                                <div class="form-control-plaintext border rounded px-3 py-2 bg-light">
                                    {{ $program->updated_at ? $program->updated_at->format('d/m/Y H:i:s') : 'Tidak tersedia' }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    <i class="bi bi-hash"></i> ID Program
                                </label>
                                <div class="form-control-plaintext border rounded px-3 py-2 bg-light">
                                    {{ $program->id }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar dengan maklumat tambahan -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0">
                    <i class="bi bi-list-check"></i> Tindakan Pantas
                </h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('programs.edit', $program->id) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit Program
                    </a>
                    <a href="{{ route('programs.index') }}" class="btn btn-secondary">
                        <i class="bi bi-list"></i> Senarai Program
                    </a>
                    <form action="{{ route('programs.destroy', $program->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Adakah anda pasti ingin memadam program {{ $program->nama_program }}?')">
                            <i class="bi bi-trash"></i> Padam Program
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Statistik atau maklumat tambahan -->
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="card-title mb-0">
                    <i class="bi bi-bar-chart"></i> Statistik
                </h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <div class="mb-3">
                        <i class="bi bi-people display-4 text-primary"></i>
                    </div>
                    <h5 class="text-primary">{{ $program->users->count() }}</h5>
                    <p class="text-muted mb-0">Peserta Berdaftar</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
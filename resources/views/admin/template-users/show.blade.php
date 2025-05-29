@extends('admin.layout')

@section('title', 'Maklumat User')
@section('page-title', 'Maklumat User')

@section('page-actions')
<div class="d-flex gap-2">
    <a href="{{ route('users.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali ke Senarai
    </a>
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">
        <i class="bi bi-pencil"></i> Edit User
    </a>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="bi bi-person"></i> Maklumat User
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Nama -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            <i class="bi bi-person"></i> Nama Penuh
                        </label>
                        <div class="form-control-plaintext border rounded px-3 py-2 bg-light">
                            {{ $user->name }}
                        </div>
                    </div>

                    <!-- No KP -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            <i class="bi bi-card-text"></i> No. Kad Pengenalan
                        </label>
                        <div class="form-control-plaintext border rounded px-3 py-2 bg-light">
                            {{ $user->no_kp ?? 'Tidak dinyatakan' }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Email -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            <i class="bi bi-envelope"></i> Alamat Email
                        </label>
                        <div class="form-control-plaintext border rounded px-3 py-2 bg-light">
                            {{ $user->email }}
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            <i class="bi bi-telephone"></i> No. Telefon
                        </label>
                        <div class="form-control-plaintext border rounded px-3 py-2 bg-light">
                            {{ $user->phone ?? 'Tidak dinyatakan' }}
                        </div>
                    </div>
                </div>

                <!-- Status -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            <i class="bi bi-toggle-on"></i> Status
                        </label>
                        <div class="form-control-plaintext border rounded px-3 py-2 bg-light">
                            @if($user->status == 'aktif')
                                <span class="badge bg-success">
                                    <i class="bi bi-check-circle"></i> Aktif
                                </span>
                            @elseif($user->status == 'tidak aktif')
                                <span class="badge bg-secondary">
                                    <i class="bi bi-x-circle"></i> Tidak Aktif
                                </span>
                            @elseif($user->status == 'digantung')
                                <span class="badge bg-warning">
                                    <i class="bi bi-pause-circle"></i> Digantung
                                </span>
                            @else
                                <span class="badge bg-light text-dark">{{ ucfirst($user->status) }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Account Information -->
                <div class="card mt-4">
                    <div class="card-header bg-light">
                        <h6 class="card-title mb-0">
                            <i class="bi bi-info-circle"></i> Maklumat Akaun
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    <i class="bi bi-calendar-plus"></i> Tarikh Daftar
                                </label>
                                <div class="form-control-plaintext border rounded px-3 py-2 bg-light">
                                    {{ $user->created_at }}
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    <i class="bi bi-calendar-check"></i> Tarikh Kemaskini
                                </label>
                                <div class="form-control-plaintext border rounded px-3 py-2 bg-light">
                                    {{ $user->updated_at }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    <i class="bi bi-envelope-check"></i> Status Email
                                </label>
                                <div class="form-control-plaintext border rounded px-3 py-2 bg-light">
                                    @if($user->email_verified_at)
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle"></i> Disahkan
                                        </span>
                                        <small class="text-muted d-block mt-1">
                                            {{ $user->email_verified_at->format('d/m/Y H:i:s') }}
                                        </small>
                                    @else
                                        <span class="badge bg-warning">
                                            <i class="bi bi-exclamation-triangle"></i> Belum Disahkan
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<!-- Program Information -->
<div class="card mt-4">
    <div class="card-header bg-light d-flex justify-content-between align-items-center">
        <h6 class="card-title mb-0">
            <i class="bi bi-journal-text"></i> Maklumat Program
        </h6>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addProgramModal">
            <i class="bi bi-plus-circle"></i> Tambah Program
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Nama Program</th>
                        <th>Kategori Program</th>
                        <th>Jenis Kemahiran</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $senaraiUserPrograms as $userProgram)
                        <tr>
                            <td>{{ $userProgram->nama_program }}</td>
                            <td>{{ $userProgram->kategori_program }}</td>
                            <td>{{ $userProgram->jenis_kemahiran }}</td>
                            <td></td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Program Modal -->
<div class="modal fade" id="addProgramModal" tabindex="-1" aria-labelledby="addProgramModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProgramModalLabel">Tambah Program Baharu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('users.programs.store', $user->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    
                    <div class="mb-3">
                        <label for="program_id" class="form-label">Pilih Program</label>
                        <select class="form-select" id="program_id" name="program_id" required>
                            <option value="">Pilih Program</option>
                            @foreach($senaraiPrograms as $program)
                                <option value="{{ $program->id }}">{{ $program->nama_program }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <div class="d-flex gap-2">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Edit User
                        </a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline" 
                              onsubmit="return confirm('Adakah anda pasti ingin memadam user ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Padam
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Sidebar -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0">
                    <i class="bi bi-person-badge"></i> Profil User
                </h6>
            </div>
            <div class="card-body">
                <div class="text-center mb-3">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" 
                         style="width: 80px; height: 80px;">
                        <i class="bi bi-person-fill text-white" style="font-size: 2rem;"></i>
                    </div>
                    <h5 class="mt-2 mb-0">{{ $user->name }}</h5>
                    <small class="text-muted">{{ $user->email }}</small>
                </div>

                <hr>

                <div class="alert alert-info">
                    <h6><i class="bi bi-info-circle"></i> Maklumat:</h6>
                    <ul class="mb-0 small">
                        <li>ID User: <strong>{{ $user->id }}</strong></li>
                        <li>Status: <strong>{{ ucfirst($user->status) }}</strong></li>
                        <li>Daftar: <strong>{{ $user->created_at }}</strong></li>
                        @if($user->email_verified_at)
                            <li>Email disahkan: <strong>Ya</strong></li>
                        @else
                            <li>Email disahkan: <strong>Tidak</strong></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="card-title mb-0">
                    <i class="bi bi-lightning"></i> Tindakan Pantas
                </h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-warning btn-sm">
                        <i class="bi bi-pencil"></i> Edit Maklumat
                    </a>
                    @if(!$user->email_verified_at)
                        <button class="btn btn-outline-info btn-sm" onclick="alert('Fungsi ini akan dilaksanakan kemudian')">
                            <i class="bi bi-envelope-check"></i> Sahkan Email
                        </button>
                    @endif
                    <button class="btn btn-outline-secondary btn-sm" onclick="alert('Fungsi ini akan dilaksanakan kemudian')">
                        <i class="bi bi-key"></i> Reset Kata Laluan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
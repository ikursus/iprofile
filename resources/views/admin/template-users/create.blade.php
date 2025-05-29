@extends('admin.layout')

@section('title', 'Tambah User Baru')
@section('page-title', 'Tambah User Baru')

@section('page-actions')
<a href="{{ route('users.index') }}" class="btn btn-secondary">
    <i class="bi bi-arrow-left"></i> Kembali ke Senarai
</a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="bi bi-person-plus"></i> Tambah User Baru
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <!-- Nama -->
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">
                                <i class="bi bi-person"></i> Nama Penuh <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- No KP -->
                        <div class="col-md-6 mb-3">
                            <label for="no_kp" class="form-label">
                                <i class="bi bi-card-text"></i> No. Kad Pengenalan
                            </label>
                            <input type="text" 
                                   class="form-control @error('no_kp') is-invalid @enderror" 
                                   id="no_kp" 
                                   name="no_kp" 
                                   value="{{ old('no_kp') }}" 
                                   placeholder="Contoh: 123456-78-9012">
                            @error('no_kp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">
                                <i class="bi bi-envelope"></i> Alamat Email <span class="text-danger">*</span>
                            </label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">
                                <i class="bi bi-telephone"></i> No. Telefon
                            </label>
                            <input type="tel" 
                                   class="form-control @error('phone') is-invalid @enderror" 
                                   id="phone" 
                                   name="phone" 
                                   value="{{ old('phone') }}" 
                                   placeholder="Contoh: 012-3456789">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">
                                <i class="bi bi-toggle-on"></i> Status
                            </label>
                            <select class="form-select @error('status') is-invalid @enderror" 
                                    id="status" 
                                    name="status">
                                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : 'selected' }}>
                                    Aktif
                                </option>
                                <option value="tidak aktif" {{ old('status') == 'tidak aktif' ? 'selected' : '' }}>
                                    Tidak Aktif
                                </option>
                                <option value="digantung" {{ old('status') == 'digantung' ? 'selected' : '' }}>
                                    Digantung
                                </option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Password Section -->
                    <div class="card mt-4">
                        <div class="card-header bg-light">
                            <h6 class="card-title mb-0">
                                <i class="bi bi-key"></i> Kata Laluan
                            </h6>
                            <small class="text-muted">Masukkan kata laluan untuk user baru</small>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">
                                        <i class="bi bi-lock"></i> Kata Laluan <span class="text-danger">*</span>
                                    </label>
                                    <input type="password" 
                                           class="form-control @error('password') is-invalid @enderror" 
                                           id="password" 
                                           name="password" 
                                           placeholder="Masukkan kata laluan"
                                           required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="password_confirmation" class="form-label">
                                        <i class="bi bi-lock-fill"></i> Sahkan Kata Laluan <span class="text-danger">*</span>
                                    </label>
                                    <input type="password" 
                                           class="form-control" 
                                           id="password_confirmation" 
                                           name="password_confirmation" 
                                           placeholder="Sahkan kata laluan"
                                           required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Info Sidebar -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0">
                    <i class="bi bi-info-circle"></i> Panduan
                </h6>
            </div>
            <div class="card-body">
                <div class="text-center mb-3">
                    <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center" 
                         style="width: 80px; height: 80px;">
                        <i class="bi bi-person-plus-fill text-white" style="font-size: 2rem;"></i>
                    </div>
                    <h5 class="mt-2 mb-0">User Baru</h5>
                    <small class="text-muted">Lengkapkan maklumat di bawah</small>
                </div>

                <hr>

                <div class="alert alert-info">
                    <h6><i class="bi bi-lightbulb"></i> Tips:</h6>
                    <ul class="mb-0 small">
                        <li>Pastikan alamat email adalah unik</li>
                        <li>Kata laluan mestilah sekurang-kurangnya 8 aksara</li>
                        <li>No. Kad Pengenalan adalah pilihan</li>
                        <li>Status lalai adalah 'Aktif'</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Required Fields Info -->
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="card-title mb-0">
                    <i class="bi bi-exclamation-triangle"></i> Medan Wajib
                </h6>
            </div>
            <div class="card-body">
                <div class="small">
                    <div class="mb-2">
                        <span class="text-danger">*</span> <strong>Nama Penuh</strong>
                    </div>
                    <div class="mb-2">
                        <span class="text-danger">*</span> <strong>Alamat Email</strong>
                    </div>
                    <div class="mb-2">
                        <span class="text-danger">*</span> <strong>Kata Laluan</strong>
                    </div>
                    <div class="mb-0">
                        <span class="text-danger">*</span> <strong>Sahkan Kata Laluan</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
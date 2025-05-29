@extends('admin.layout')

@section('title', 'Edit User')
@section('page-title', 'Edit User')

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
                    <i class="bi bi-person-gear"></i> Edit Maklumat User
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @method('PUT')
                    <input type="hidden" name="_method" value="PUT">
                    
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
                                   value="{{ old('name', $user->name) }}" 
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
                                   value="{{ old('no_kp', $user->no_kp) }}" 
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
                                   value="{{ old('email', $user->email) }}" 
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
                                   value="{{ old('phone', $user->phone) }}" 
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
                                <option value="aktif" {{ old('status', $user->status) == 'aktif' ? 'selected' : '' }}>
                                    Aktif
                                </option>
                                <option value="tidak aktif" {{ old('status', $user->status) == 'tidak aktif' ? 'selected' : '' }}>
                                    Tidak Aktif
                                </option>
                                <option value="digantung" {{ old('status', $user->status) == 'digantung' ? 'selected' : '' }}>
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
                                <i class="bi bi-key"></i> Tukar Kata Laluan
                            </h6>
                            <small class="text-muted">Biarkan kosong jika tidak mahu menukar kata laluan</small>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">
                                        <i class="bi bi-lock"></i> Kata Laluan Baru
                                    </label>
                                    <input type="password" 
                                           class="form-control @error('password') is-invalid @enderror" 
                                           id="password" 
                                           name="password" 
                                           placeholder="Masukkan kata laluan baru">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="password_confirmation" class="form-label">
                                        <i class="bi bi-lock-fill"></i> Sahkan Kata Laluan
                                    </label>
                                    <input type="password" 
                                           class="form-control" 
                                           id="password_confirmation" 
                                           name="password_confirmation" 
                                           placeholder="Sahkan kata laluan baru">
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
                            <i class="bi bi-check-circle"></i> Kemaskini User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- User Info Sidebar -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0">
                    <i class="bi bi-info-circle"></i> Maklumat User
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

                <div class="row text-sm">
                    <div class="col-12 mb-2">
                        <strong>ID:</strong> #{{ $user->id }}
                    </div>
                    <div class="col-12 mb-2">
                        <strong>Status:</strong> 
                        @if($user->status == 'aktif')
                            <span class="badge bg-success">{{ ucfirst($user->status) }}</span>
                        @elseif($user->status == 'tidak aktif')
                            <span class="badge bg-secondary">Tidak Aktif</span>
                        @else
                            <span class="badge bg-warning">{{ ucfirst($user->status) }}</span>
                        @endif
                    </div>
                    @if($user->email_verified_at)
                    <div class="col-12 mb-2">
                        <strong>Email Disahkan:</strong><br>
                        <small>{{ $user->email_verified_at->format('d/m/Y H:i') }}</small>
                    </div>
                    @endif
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
                    @if($user->status == 'aktif')
                        <button type="button" class="btn btn-warning btn-sm" 
                                onclick="toggleUserStatus('{{ $user->id }}', 'tidak aktif')">
                            <i class="bi bi-pause-circle"></i> Nyahaktifkan
                        </button>
                    @else
                        <button type="button" class="btn btn-success btn-sm" 
                                onclick="toggleUserStatus('{{ $user->id }}', 'aktif')">
                            <i class="bi bi-play-circle"></i> Aktifkan
                        </button>
                    @endif
                    
                    <button type="button" class="btn btn-info btn-sm" 
                            onclick="sendPasswordReset('{{ $user->id }}')">
                        <i class="bi bi-key"></i> Hantar Reset Password
                    </button>
                    
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-sm" 
                                onclick="confirmDelete('{{ $user->id }}', '{{ $user->name }}')">
                            <i class="bi bi-trash"></i> Padam User
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function toggleUserStatus(userId, newStatus) {
    if (confirm('Adakah anda pasti mahu menukar status user ini?')) {
        // Implement AJAX call to toggle status
        fetch(`/admin/users/${userId}/toggle-status`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ status: newStatus })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Ralat berlaku. Sila cuba lagi.');
            }
        });
    }
}

function sendPasswordReset(userId) {
    if (confirm('Hantar email reset password kepada user ini?')) {
        // Implement AJAX call to send password reset
        fetch(`/admin/users/${userId}/send-password-reset`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Email reset password telah dihantar.');
            } else {
                alert('Ralat berlaku. Sila cuba lagi.');
            }
        });
    }
}

function confirmDelete(userId, userName) {
    if (confirm(`Adakah anda pasti mahu memadam user "${userName}"? Tindakan ini tidak boleh dibatalkan.`)) {
        // Create and submit delete form
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/users/${userId}`;
        
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'DELETE';
        
        form.appendChild(csrfToken);
        form.appendChild(methodField);
        document.body.appendChild(form);
        form.submit();
    }
}
</script>
@endpush
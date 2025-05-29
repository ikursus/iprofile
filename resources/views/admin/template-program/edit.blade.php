@extends('admin.layout')

@section('title', 'Edit Program')
@section('page-title', 'Edit Program')

@section('page-actions')
<a href="{{ route('programs.index') }}" class="btn btn-secondary">
    <i class="bi bi-arrow-left"></i> Kembali ke Senarai
</a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="bi bi-pencil-square"></i> Edit Program
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('programs.update', $program->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Nama Program -->
                    <div class="mb-3">
                        <label for="nama_program" class="form-label">
                            <i class="bi bi-bookmark"></i> Nama Program <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control @error('nama_program') is-invalid @enderror" 
                               id="nama_program" 
                               name="nama_program" 
                               value="{{ old('nama_program', $program->nama_program) }}" 
                               maxlength="100"
                               placeholder="Masukkan nama program"
                               required>
                        @error('nama_program')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Maksimum 100 aksara</div>
                    </div>

                    <!-- Kategori Program -->
                    <div class="mb-3">
                        <label for="kategori_program" class="form-label">
                            <i class="bi bi-tags"></i> Kategori Program
                        </label>
                        <select class="form-select @error('kategori_program') is-invalid @enderror" 
                                id="kategori_program" 
                                name="kategori_program">
                            <option value="">Pilih Kategori Program</option>
                            <option value="Kemahiran Teknikal" {{ old('kategori_program', $program->kategori_program) == 'Kemahiran Teknikal' ? 'selected' : '' }}>Kemahiran Teknikal</option>
                            <option value="Kemahiran Insaniah" {{ old('kategori_program', $program->kategori_program) == 'Kemahiran Insaniah' ? 'selected' : '' }}>Kemahiran Insaniah</option>
                            <option value="Kemahiran Keusahawanan" {{ old('kategori_program', $program->kategori_program) == 'Kemahiran Keusahawanan' ? 'selected' : '' }}>Kemahiran Keusahawanan</option>
                            <option value="Kemahiran Kepimpinan" {{ old('kategori_program', $program->kategori_program) == 'Kemahiran Kepimpinan' ? 'selected' : '' }}>Kemahiran Kepimpinan</option>
                            <option value="Lain-lain" {{ old('kategori_program', $program->kategori_program) == 'Lain-lain' ? 'selected' : '' }}>Lain-lain</option>
                        </select>
                        @error('kategori_program')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Jenis Kemahiran -->
                    <div class="mb-3">
                        <label for="jenis_kemahiran" class="form-label">
                            <i class="bi bi-gear"></i> Jenis Kemahiran
                        </label>
                        <select class="form-select @error('jenis_kemahiran') is-invalid @enderror" 
                                id="jenis_kemahiran" 
                                name="jenis_kemahiran">
                            <option value="">Pilih Jenis Kemahiran</option>
                            <option value="Asas" {{ old('jenis_kemahiran', $program->jenis_kemahiran) == 'Asas' ? 'selected' : '' }}>Asas</option>
                            <option value="Pertengahan" {{ old('jenis_kemahiran', $program->jenis_kemahiran) == 'Pertengahan' ? 'selected' : '' }}>Pertengahan</option>
                            <option value="Lanjutan" {{ old('jenis_kemahiran', $program->jenis_kemahiran) == 'Lanjutan' ? 'selected' : '' }}>Lanjutan</option>
                            <option value="Pakar" {{ old('jenis_kemahiran', $program->jenis_kemahiran) == 'Pakar' ? 'selected' : '' }}>Pakar</option>
                        </select>
                        @error('jenis_kemahiran')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Buttons -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('programs.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Kemaskini Program
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0">
                    <i class="bi bi-info-circle"></i> Panduan
                </h6>
            </div>
            <div class="card-body">
                <h6>Maklumat Program:</h6>
                <ul class="list-unstyled small">
                    <li><i class="bi bi-check text-success"></i> Nama program adalah wajib</li>
                    <li><i class="bi bi-check text-success"></i> Kategori dan jenis kemahiran adalah pilihan</li>
                    <li><i class="bi bi-check text-success"></i> Nama program maksimum 100 aksara</li>
                </ul>
                
                <hr>
                
                <h6>Kategori Program:</h6>
                <ul class="list-unstyled small">
                    <li><strong>Kemahiran Teknikal:</strong> Program berkaitan teknologi</li>
                    <li><strong>Kemahiran Insaniah:</strong> Program soft skills</li>
                    <li><strong>Kemahiran Keusahawanan:</strong> Program perniagaan</li>
                    <li><strong>Kemahiran Kepimpinan:</strong> Program leadership</li>
                </ul>
                
                <hr>
                
                <div class="alert alert-info">
                    <i class="bi bi-info-circle"></i>
                    <strong>Program ID:</strong> {{ $program->id }}<br>
                    <strong>Dicipta:</strong> {{ $program->created_at->format('d/m/Y H:i') }}<br>
                    <strong>Dikemaskini:</strong> {{ $program->updated_at->format('d/m/Y H:i') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
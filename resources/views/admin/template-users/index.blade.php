@extends('admin.layout')

@section('title', 'Users Management')
@section('page-title', 'Users List')

@section('page-actions')
<a href="{{ route('users.create') }}" class="btn btn-primary">
    <i class="bi bi-plus"></i> Add New User
</a>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">All Users</h5>
    </div>
    <div class="card-body">
<div class="mb-3">
    <a href="{{ route('export.users') }}" class="btn btn-success">
        <i class="bi bi-file-earmark-excel"></i> Export Users
    </a>
</div>
        @if($senaraiUsers->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>IC Number</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($senaraiUsers as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <i class="bi bi-person"></i> {{ $user->name }}
                                </td>
                                <td>{{ $user->no_kp }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="_method" value="DELETE">
                                        
                                        <a class="btn btn-sm btn-outline-warning me-1" href="{{ route('users.print', $user->id) }}?print=stream">
                                            <i class="bi bi-print"></i> View PDF
                                        </a>

                                        <a class="btn btn-sm btn-warning me-1" href="{{ route('users.print', $user->id) }}">
                                            <i class="bi bi-print"></i> Download PDF
                                        </a>

                                        <a class="btn btn-sm btn-outline-info me-1" href="{{ route('users.show', $user->id) }}">
                                            <i class="bi bi-eye"></i> Show
                                        </a>

                                        <a class="btn btn-sm btn-outline-primary me-1" href="{{ route('users.edit', $user->id) }}">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>

                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete user {{ $user->name }}?')">
                                            <i class="bi bi-trash"></i> Padam
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-4">
                <i class="bi bi-people display-1 text-muted"></i>
                <p class="text-muted mt-2">No users found.</p>
            </div>
        @endif
        
        <div class="mt-5">
            {{ $senaraiUsers->links() }}
        </div>
    </div>
</div>
@endsection
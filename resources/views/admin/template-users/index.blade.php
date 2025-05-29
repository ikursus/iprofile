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
        @if($senaraiUsers->count() > 0)
            <ul class="list-group list-group-flush">
                @foreach ($senaraiUsers as $user)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>{{ $loop->iteration }}</div>
                        <div>
                            <i class="bi bi-person"></i> {{ $user->name }}
                            @if(isset($user->email))
                                <small class="text-muted d-block">{{ $user->email }}</small>
                            @endif
                        </div>
                        <div>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="_method" value="DELETE">
                                
                                <a class="btn btn-sm btn-outline-primary me-1" href="{{ route('users.edit', $user->id) }}">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>

                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete user {{ $user->name }}?')">
                                    <i class="bi bi-trash"></i> Padam
                                </button>

                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
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
@extends('admin.layouts.app')

@section('title', 'Quản lý tài khoản')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Danh sách tài khoản</h5>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm tài khoản
        </a>
    </div>
    <div class="card-body">
        <!-- Search Form -->
        <form action="{{ route('admin.users.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm tên, email..." value="{{ $search }}">
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="fas fa-search"></i> Tìm kiếm
                </button>
            </div>
        </form>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger mb-2">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <!-- Users Table -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Ngày tạo</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Không có tài khoản nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $users->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection 
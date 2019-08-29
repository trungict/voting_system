@extends('layouts.app')
@section('title', 'Manage user')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <h4 class="card-header text-center">Manage user</h4>
                    <div class="card-body">
                        <button class="btn btn-success" data-toggle="modal" data-target="#add-user">
                            <i class="fas fa-plus"></i> Add new user
                        </button>
                        <table class="table mt-4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th width="200"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($users as $user)
                                <tr data-id="{{ $user->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="name">{{ $user->name }}</td>
                                    <td class="email">{{ $user->email }}</td>
                                    <td class="role">{{ $user->getRoleName() }}</td>
                                    <td>
                                        <button class="edit-button btn btn-primary">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <form class="d-inline-block" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this user?')">
                                                <i class="fas fa-minus-circle"></i> Remove
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No user found!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="float-right">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('user.includes.add_user_modal')
    @include('user.includes.edit_user_modal')
@endsection

@section('js-section')
    <script>
        $('.edit-button').click(function () {
            let row = $(this).closest('tr');
            let userId = row.data('id');
            $('#form-edit-user')[0].reset();
            $('#form-edit-user').attr('action', '{{ url('users') }}' + '/' + userId);
            $('#edit-email').val(row.find('.email').text());
            $('#edit-name').val(row.find('.name').text());
            $('#edit-role option').filter(function() {
                return $(this).text() === row.find('.role').text();
            }).prop('selected', true);
            $('#edit-user').modal('show');
        });
    </script>
@endsection
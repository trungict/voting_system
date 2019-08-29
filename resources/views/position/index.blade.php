@extends('layouts.app')
@section('title', 'Manage position')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card text-center">
                    <h4 class="card-header">Manage position</h4>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <form action="{{ route('positions.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-3 col-form-label col-form-label">Position name</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="name" placeholder="Name of position" required>
                                        </div>
                                        <div class="col-3">
                                            <button class="btn btn-primary">
                                                <i class="fas fa-plus"></i> Add new position
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th width="150"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($positions as $position)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $position->name }}</td>
                                                    <td>
                                                        <form action="{{ route('positions.destroy', $position->id) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this position?')">
                                                                <i class="fas fa-minus-circle"></i> Remove
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">No position found!</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                        <div class="float-right">
                                            {{ $positions->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
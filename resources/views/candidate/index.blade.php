@extends('layouts.app')
@section('title', 'Manage candidate')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card text-center">
                    <h4 class="card-header">Manage candidate</h4>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <form action="{{ route('candidates.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-4">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Name of candidate" required>
                                        </div>
                                        <div class="form-group col-4">
                                            <select name="position_id" id="position_id" class="form-control" required>
                                                <option value="">Select candidate position</option>
                                                @foreach($positions as $position)
                                                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-4">
                                            <button class="btn btn-primary">
                                                <i class="fas fa-plus"></i> Add new candidate
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
                                                    <th>Position</th>
                                                    <th width="150"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($candidates as $candidate)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $candidate->name }}</td>
                                                    <td>{{ $candidate->position->name }}</td>
                                                    <td>
                                                        <form action="{{ route('candidates.destroy', $candidate->id) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this candidate?')">
                                                                <i class="fas fa-minus-circle"></i> Remove
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4">No candidate found!</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
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
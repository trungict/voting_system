@extends('layouts.app')
@section('title', 'Current poll')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card text-center">
                    <h4 class="card-header">Current Poll</h4>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <form>
                                    <div class="form-row justify-content-center">
                                        <label for="position" class="col-4 col-form-label col-form-label">Choose position</label>
                                        <div class="form-group col-5">
                                            <select id="position" name="position_id" class="form-control" required>
                                                <option value="">Select</option>
                                                @foreach($positions as $position)
                                                    <option value="{{ $position->id }}" {{ $request->position_id == $position->id ? 'selected' : '' }}>{{ $position->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-3">
                                            <button class="btn btn-primary">
                                                <i class="fas fa-eye"></i> See candidates
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                @if ($request->position_id)
                                    <div class="row justify-content-center mt-2">
                                            @if ($candidates->isEmpty())
                                                <i>No candidate found!</i>
                                            @else
                                            <div class="col-12">
                                                <div class="text-danger font-weight-bold text-left">
                                                    Note: You can't vote more than once in a respective position. This process cannot be undone so think wisely before casting your vote.
                                                </div>
                                            </div>
                                            <div class="col-4 text-left p-2">
                                                <form action="{{ route('submit-poll') }}" method="POST">
                                                    @csrf
                                                    @foreach($candidates as $candidate)
                                                        <div class="custom-control custom-radio p-2">
                                                            <input type="radio" id="candidate_{{ $candidate->id }}" name="poll" class="custom-control-input" value="{{ $candidate->id }}" required>
                                                            <label class="custom-control-label" for="candidate_{{ $candidate->id }}">{{ $candidate->name }}</label>
                                                        </div>
                                                    @endforeach
                                                    <button class="btn btn-primary mt-2" onclick="return confirm('Are you sure you want to vote this candidate?')">
                                                        <i class="fas fa-star"></i> Vote
                                                    </button>
                                                </form>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
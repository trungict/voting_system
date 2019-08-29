@extends('layouts.app')
@section('title', 'Poll result')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card text-center">
                    <h4 class="card-header">Poll result</h4>
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
                                                <i class="fas fa-eye"></i> See result
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                @if ($request->position_id)
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <h4>Total vote: {{ $totalVotes }}</h4>
                                        </div>
                                        @forelse($candidates as $candidate)
                                            <div class="col-12 text-left p-2">
                                                <div>
                                                    <strong>{{ $candidate->name }}</strong>: {{ $candidate->vote_count }} of {{ $totalVotes }} votes ({{ round($candidate->vote_count/$totalVotes * 100) }}%).
                                                </div>
                                                <div class="progress mt-2" style="height: 20px">
                                                    <div class="progress-bar {{ $colors[$loop->index % 4] }}" role="progressbar" style="width: {{ round($candidate->vote_count/$totalVotes * 100) }}%;" aria-valuenow="{{ round($candidate->vote_count/$totalVotes * 100) }}" aria-valuemin="0" aria-valuemax="100">{{ round($candidate->vote_count/$totalVotes * 100) }}%</div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-12">
                                                <i>No candidate found! Click <a href="{{ route('candidates.index') }}">here</a> to add new candidate</i>
                                            </div>
                                        @endforelse
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
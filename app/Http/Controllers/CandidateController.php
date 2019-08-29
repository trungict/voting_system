<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Position;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::with('position')->paginate(10);
        $positions = Position::all();
        return view('candidate.index', compact('candidates', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $candidate = new Candidate();
        $candidate->fill($request->all());

        if ($candidate->save()) {
            return redirect()->route('candidates.index')->with([
                'message' => 'Add new candidate successfully',
                'alert-type' => 'success'
            ]);
        }

        return redirect()->route('candidates.index')->with([
            'message' => 'Add new candidate failed',
            'alert-type' => 'error'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Candidate $candidate
     * @return $this
     * @throws \Exception
     */
    public function destroy(Candidate $candidate)
    {
        if ($candidate->delete()) {
            return back()->withInput()->with([
                'message' => 'Remove candidate successfully',
                'alert-type' => 'success'
            ]);
        }

        return back()->withInput()->with([
            'message' => 'Remove candidate failed',
            'alert-type' => 'error'
        ]);
    }

    public function pollResult(Request $request)
    {
        $positions = Position::all();
        $candidates = $request->position_id ? Candidate::where('position_id', $request->position_id)->orderBy('vote_count', 'desc')->get() : [];
        $colors = ['', 'bg-success', 'bg-info', 'bg-danger'];
        $totalVotes = 0;

        foreach ($candidates as $candidate) {
            $totalVotes += $candidate->vote_count;
        }

        return view('candidate.poll_result', compact('positions', 'candidates', 'totalVotes', 'colors', 'request'));
    }

    public function submitPoll(Request $request)
    {
        if ($request->has('poll')) {
            $candidate = Candidate::find($request->poll);

            if ($candidate) {
                $candidate->vote_count++;
                $candidate->save();

                return back()->withInput()->with([
                    'message' => 'You vote for ' . $candidate->name . ' successfully',
                    'alert-type' => 'success'
                ]);
            }

            return back()->withInput()->with([
                'message' => 'Candidate not found!',
                'alert-type' => 'error'
            ]);
        }

        abort(400);
    }
}

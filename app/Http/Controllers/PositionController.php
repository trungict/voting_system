<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::paginate(10);
        return view('position.index', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $position = new Position();
        $position->fill($request->all());

        if ($position->save()) {
            return redirect()->route('positions.index')->with([
                'message' => 'Add new position successfully',
                'alert-type' => 'success'
            ]);
        }

        return redirect()->route('positions.index')->with([
            'message' => 'Add new position failed',
            'alert-type' => 'error'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Position $position
     * @return $this
     * @throws \Exception
     */
    public function destroy(Position $position)
    {
        if ($position->delete()) {
            return back()->withInput()->with([
                'message' => 'Remove position successfully',
                'alert-type' => 'success'
            ]);
        }

        return back()->withInput()->with([
            'message' => 'Remove position failed',
            'alert-type' => 'error'
        ]);
    }
}

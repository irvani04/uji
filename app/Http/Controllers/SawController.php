<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use App\Models\DataTraining;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class SawController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Interview::select('user_name', 'n_komun', 'n_kejujuran', 'n_kesop', 'n_psikotes', 'n_tertulis', 'n_praktek')->get();
            // return $data;


            return Datatables::of($data)
                 ->addIndexColumn()
                 ->make(true);
       }

       return view('admin.saw.index', [
            'title' => 'Data Interview',

       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $interviews = Interview::all();

        $weights = [
            'n_tertulis' => 0.2,
            'n_psikotes' => 0.1,
            'n_kejujuran' => 0.25,
            'n_komun' => 0.1,
            'n_kesop' => 0.15,
            'n_praktek' => 0.2,

        ];
        $normalized = [];
        foreach ($interviews as $interview) {
            $normalized[$interview->id] = [];
            foreach ($weights as $attribute => $weight) {
                $normalized[$interview->id][$attribute] = $interview->{$attribute} / $interview->max($attribute);
            }
        }

        // Calculate the weighted sum for each alternative
        $weightedSum = [];
        foreach ($normalized as $interviewId => $attributes) {
            $weightedSum[$interviewId] = 0;
            foreach ($attributes as $attribute => $value) {
                $weightedSum[$interviewId] += $value * $weights[$attribute];
            }
        }

        // Sort the alternatives based on their weighted sum in descending order
        arsort($weightedSum);

        // Return the ranked alternatives
        return $weightedSum;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    
}

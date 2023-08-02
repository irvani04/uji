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
    public function create(Request $request)
    {
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
    public function show(string $id, Request $request)
    {
        // if ($request->ajax()) {
        //     //
        $interviews = Interview::all();
        // return $interviews;

        $weights = [
            'n_komun' => 0.1,
            'n_kejujuran' => 0.25,
            'n_kesop' => 0.15,
            'n_psikotes' => 0.1,
            'n_tertulis' => 0.2,
            'n_praktek' => 0.2,

        ];

        $maxAttributes = [];
        foreach ($weights as $attribute => $weight) {
            $maxAttributes[$attribute] = $interviews->max($attribute);
        }
        // return $maxAttributes;


        // Normalize the attributes
        $normalizedAttributes = [];
        foreach ($interviews as $interview) {
            $normalizedAttributes[$interview->user->name] = [];
            foreach ($weights as $attribute => $weight) {
                $normalizedAttributes[$interview->user->name][$attribute] = $interview->{$attribute} / $maxAttributes[$attribute];
            }
        }
        // return $normalizedAttributes;

        // Calculate the weighted sum for each alternative
        $weightedSum = [];
        foreach ($normalizedAttributes as $interviewUser => $attributes) {
            $weightedSum[$interviewUser] = 0;
            foreach ($attributes as $attribute => $value) {
                $weightedSum[$interviewUser] += $value * $weights[$attribute];
            }
            $i = 1;
            foreach ($weightedSum as $data) {
                $array = [
                    'name' => $interviewUser,
                    'weightedSum' => $data[$i]
                ];
                $i++;

                $result[] = $array;
            }
        }
        return $result;



        // Sort the alternatives based on their weighted sum in descending order
        arsort($weightedSum);
        // $peringkat = 1;

        // $ranking = [];

        // foreach ($weightedSum as $nilai => $hasil) {
        //     $ranking[$nilai] = $peringkat;
        //     $peringkat;
        // }

        // Return the ranked alternatives
        // return $weightedSum;
        return Datatables::of($weightedSum)
            ->addIndexColumn()
            ->make(true);

        // }
        // $interview = Interview::select('user_name', 'n_komun', 'n_kejujuran', 'n_kesop', 'n_psikotes', 'n_tertulis', 'n_praktek')->get();
        // $hasil = $interview->toArray();


        // foreach ($interview as $data) {
        //     $array = [
        //         intval($data->komun),
        //         intval($data->kejur),
        //         intval($data->kesop),
        //         intval($data->keprib),
        //         intval($data->penget),
        //         intval($data->praktek),
        //     ];

        //     $result[] = $array;
        // }

        // $i = 0;
        // foreach ($interview as $data) {
        //     $array = [
        //         'nama' => $data->user_name,
        //         'prediksi' => $weightedSum[$i]
        //     ];
        //     $i++;

        //     $result3[] = $array;
        // }

        return view('admin.saw.index', [
            'title' => 'Modal Data Interview',
            'interview' => $interview
        ]);
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

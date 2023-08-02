<?php

namespace App\Http\Controllers;

use App\Models\DataTraining;
use App\Models\Interview;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Phpml\Classification\KNearestNeighbors;

class KnnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $data = DataTraining::select('nama', 'komun', 'kejur', 'kesop', 'keprib', 'penget', 'praktek', 'hasil')->get();
            // return $data;


            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.knn.index', [
            'title' => 'Data Training',

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $point1 = DataTraining::select('id', 'nama', 'komun', 'kejur', 'kesop', 'keprib', 'penget', 'praktek', 'hasil')->get();
        // // return $point1;
        // $hasil = $point1->pluck('hasil')->toArray();


        // foreach ($point1 as $data) {
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

        // $classifier = new KNearestNeighbors($k = 5);
        //  $classifier->train($result, $hasil);

        // // return $classifier;

        // $point2 = Interview::select('user_name', 'n_komun', 'n_kejujuran', 'n_kesop', 'n_psikotes', 'n_tertulis', 'n_praktek')->get();

        // foreach ($point2 as $data) {
        //     $array = [
        //         intval($data->n_komun),
        //         intval($data->n_kejujuran),
        //         intval($data->n_kesop),
        //         intval($data->n_psikotes),
        //         intval($data->n_tertulis),
        //         intval($data->n_praktek),
        //     ];

        //     $result2[] = $array;
        // }

        // $prediksi = $classifier->predict($result2);
        // // return $prediksi;

        // $i = 0;
        // foreach ($point2 as $data) {
        //     $array = [
        //         'nama' => $data->user_name,
        //         'prediksi' => $prediksi[$i]
        //     ];
        //     $i++;

        //     $result3[] = $array;
        // }

        // return Datatables::of($result3)
        //     ->addIndexColumn()
        //     ->make(true);
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
        $point1 = DataTraining::select('id', 'nama', 'komun', 'kejur', 'kesop', 'keprib', 'penget', 'praktek', 'hasil')->get();
        // return $point1;
        $hasil = $point1->pluck('hasil')->toArray();


        foreach ($point1 as $data) {
            $array = [
                intval($data->komun),
                intval($data->kejur),
                intval($data->kesop),
                intval($data->keprib),
                intval($data->penget),
                intval($data->praktek),
            ];

            $result[] = $array;
        }

        $classifier = new KNearestNeighbors($k = 5);
         $classifier->train($result, $hasil);

        // return $classifier;

        $point2 = Interview::select('user_name', 'n_komun', 'n_kejujuran', 'n_kesop', 'n_psikotes', 'n_tertulis', 'n_praktek')->get();

        foreach ($point2 as $data) {
            $array = [
                intval($data->n_komun),
                intval($data->n_kejujuran),
                intval($data->n_kesop),
                intval($data->n_psikotes),
                intval($data->n_tertulis),
                intval($data->n_praktek),
            ];

            $result2[] = $array;
        }

        $prediksi = $classifier->predict($result2);
        // return $prediksi;

        $i = 0;
        foreach ($point2 as $data) {
            $array = [
                'nama' => $data->user_name,
                'prediksi' => $prediksi[$i]
            ];
            $i++;

            $result3[] = $array;
        }

        return Datatables::of($result3)
            ->addIndexColumn()
            ->make(true);
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

<?php

namespace App\Http\Controllers;

use App\Models\DataTraining;
use App\Models\Interview;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

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
        $training = [];
        $point1 = DataTraining::select('id','nama', 'komun', 'kejur', 'kesop', 'keprib', 'penget', 'praktek', 'hasil')->get();
        $point2 = Interview::select('user_name', 'n_komun', 'n_kejujuran', 'n_kesop', 'n_psikotes', 'n_tertulis', 'n_praktek', 'hasil')->get();
        // return $point1;
        $i = 0;
        foreach($point1 as $data){

            $komunScoreDiff = $data->komun - $point2[$i]->n_komun;
            $jujurScoreDiff = $data->kejur - $point2[$i]->n_kejujuran;
            $sopanScoreDiff = $data->kesop - $point2[$i]->n_kesop;
            $psikotesScoreDiff = $data->keprib - $point2[$i]->n_psikotes;
            $tulisScoreDiff = $data->penget - $point2[$i]->n_tertulis;
            $praktekScoreDiff = $data->praktek - $point2[$i]->n_praktek;
            
            $distance = sqrt(pow($komunScoreDiff, 2) + pow($jujurScoreDiff, 2) + pow($sopanScoreDiff, 2) + pow($psikotesScoreDiff, 2) + pow( $tulisScoreDiff, 2) + pow($praktekScoreDiff, 2));
            
            $array= [
                'id'        => $data->id,
                'komun'     => $komunScoreDiff,
                'jujur'     => $jujurScoreDiff,
                'sopan'     => $sopanScoreDiff,
                'psikotest' => $psikotesScoreDiff,
                'tulis'     => $tulisScoreDiff,
                'praktek'   => $praktekScoreDiff,
                'distance'  => $distance
            ];

            $result[] = $array;

            $i++;
    
        }

        // ambil kolom hasil
        $hasil = (array_column($result,'distance','id'));

        asort($hasil);

        $array_min = array_slice($hasil, 0, 3, true);
return $array_min;
        // Hitung jumlah pelamar yang diterima dan yang gagal di antara tetangga terdekat
        $lulusCount = 0;
        $gagalCount = 0;
        foreach ($array_min as $id => $array_min ) {

            $allInterview = DataTraining::find($id);
            if ($allInterview->hasil == 'Lulus') {
                $lulusCount++;
            } else {
                $gagalCount++;
            }
        }

        // Tentukan hasil klasifikasi berdasarkan mayoritas
        $result = $lulusCount > $gagalCount ? 'Lulus' : 'Gagal';

        return response()->json(['result' => $result]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $komunScore = $request->input('n_komun');
        $jujurScore = $request->input('n_kejujuran');
        $sopanScore = $request->input('n_kesop');
        $psikotesScore = $request->input('n_psikotes');
        $tulisScore = $request->input('n_tertulis');
        $praktekScore = $request->input('n_praktek');
        
        $k = 3; // Jumlah tetangga terdekat yang akan dipertimbangkan

        // Ambil semua data pelamar dari database
        $allInterviews = Interview::all();

        // Hitung jarak antara data input dengan semua data pelamar
        $distances = [];
        foreach ($allInterviews as $allInterview) {
            $distances[$allInterview->id] = $this->euclideanDistance($allInterview, (object) compact('komunScore', 'jujurScore', 'sopanScore', 'psikotesScore', 'tulisScore', 'praktekScore'));
        }

        // Urutkan jarak dari yang terdekat ke yang terjauh
        asort($distances);

        // Ambil K tetangga terdekat
        $nearestNeighbors = array_slice($distances, 0, $k, true);

        // Hitung jumlah pelamar yang diterima dan yang gagal di antara tetangga terdekat
        $lulusCount = 0;
        $gagalCount = 0;
        foreach ($nearestNeighbors as $id => $distance) {
            $allInterview = Interview::find($id);
            if ($allInterview->is_accepted) {
                $lulusCount++;
            } else {
                $gagalCount++;
            }
        }

        // Tentukan hasil klasifikasi berdasarkan mayoritas
        $result = $lulusCount > $gagalCount ? 'Lulus' : 'Gagal';

        return response()->json(['result' => $result]);
    

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $k = 3; // Jumlah tetangga terdekat yang akan dipertimbangkan

        // Ambil semua data pelamar dari database
        $allInterviews = Interview::all();

        // Hitung jarak antara data input dengan semua data pelamar
        $distances = [];
        foreach ($allInterviews as $allInterview) {
            $distances[$allInterview->id] = $this->euclideanDistance($allInterview, (object) compact('komunScore', 'jujurScore', 'sopanScore', 'psikotesScore', 'tulisScore', 'praktekScore'));
        }

        // Urutkan jarak dari yang terdekat ke yang terjauh
       return asort($distances);
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

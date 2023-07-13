<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
               if ($request->ajax()) {
            $data = Criteria::select('nama', 'criteria', 'bobot')->get();
            // return $data;


            return Datatables::of($data)
                 ->addIndexColumn()
                 ->addColumn('action',  function($data){
                    return '<button type="button" class="btn btn-success btn-sm" id="getEditProductData" data-id="'.$data->id.'">
                    Edit</button>';
                 })
                 ->rawColumns(['action'])
                 ->make(true);
       }

       return view('admin.saw.kriteria.index', [
            'title' => 'Data Kriteria',

       ]);


    }
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $criteriaId = $request->id;
 
        $criteria   =   Criteria::updateOrCreate(
                    [
                     'id' => $criteriaId
                    ],
                    [
                    'nama' => $request->nama, 
                    'criteria' => $request->criteria,
                    'bobot' => $request->bobot
                    ]);    
                         
        return Response()->json($criteria);
       
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
    public function edit(Request $request, string $id)
    {
        //

        $criteria = Criteria::findOrFail($id);

        return view('admin.saw.kriteria.edit', compact('criteria'));

        // $where = array('id' => $request->id);
        // $criteria  = Criteria::where($where)->first();
      
        // return Response()->json($criteria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama' => 'required',
            'criteria' => 'required',
            'bobot' => 'required'
        ]);

        $criteria = Criteria::findOrFail($id);
        $criteria->nama = $request->nama;
        $criteria->criteria = $request->criteria;
        $criteria->bobot = $request->bobot;
        $criteria->save();


        // $criteria->update([
        //     'nama' => $request->nama,
        //     'criteria' =>$request->criteria,
        //     'bobot' =>$request->bobot
        // ]);
        return redirect()->route('kriteria.index')
                        ->with('success','Criteria updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

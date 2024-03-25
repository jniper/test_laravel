<?php

namespace App\Http\Controllers;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['datas'] = Data::all();
        return view('patientform', $data);
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
        $data = new Data();

        $data->name = $request->Name;
        $data->picture = $request->Picture;
        $data->type = $request->Type;

        $data->save();

        return redirect::to('/form');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['data_per_id'] = Data::find($id);
        $data['datas'] = Data::all();
        return view('patientform', $data);
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
        $data = Data::find($id);
        $data->name = $request->Name;
        // $data->picture = $request->Picture;
        $data->type = $request->Type;

        $data->save();

        return redirect::to('/form');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Data::find($id);
        $data->delete();

        return Redirect::to('/form');
    }
}

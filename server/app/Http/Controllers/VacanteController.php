<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacancies = Vacante::where("status", "active")->latest()->paginate(10);

        return response()->json($vacancies, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->ajax()) {
            // validate each field

            $validate = Validator::make($request->all(), [
                'name' => ['required', 'max:100'],
                'description' => ['required', 'string', 'max:4000'],
                'image' => ['nullable', 'image', 'max:3000'],
                'salary' => ['required', 'numeric'],
                'benetifs' => ['nullable', 'string', 'max:4000'],
                'vacancies' => ['required', 'string'],
                'requirements' => ['required', 'string', 'max:4000'],
                'date' => ['required', 'date_format:d-m-Y H:i:s'],
                'status' => ['required', 'in:inactive,active'],
                'category_id' => ['required', 'exists:App\Models\Category,id'],
                'city_id' => ['required', 'exists:App\Models\City,id'],
                'experience_id' => ['required', 'exists:App\Models\Experience,id'],
            ]);


            // validar que los datos estan llegando por medio de postman
            if ($validate->fails()) {

                return response()->json($validate->errors(), 400); // bad request
            }

            // transform data a y-m- h:m:s
            $oldDate = strtotime($validate->date);
            $newData = date('Y-m-d H:i:s', $oldDate);
            $validate->date = $newData;

            // check if exists an image
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('vacant', 'public');
                $validate->image = $path;
            }

            dd($validate->date);

            // transform data a y-m- h:m:s
            // /$validator->date = $validator->date->format('Y-m-d H:i:s');

            // save vacante
            $vacant = auth()->user()->vacant()->create($validate->validated());

            return response()->json($vacant, 201); // request ok
        }

        return response()->json(["msg" => 'the data are invalidated'], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacante $vacante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacante $vacante)
    {

        if (Vacante::find($vacante->id)) {
            $vacante->delete();
            return response()->json([], 200);
        }

        return response()->json(["deleted" => false]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Dotenv\Repository\RepositoryInterface;

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
        if ($request->ajax()) {
            // validate each field
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'max:100'],
                'description' => ['required', 'string', 'max:4000'],
                'image' => ['nullable', 'img'],
                'salary' => ['required', 'numeric'],
                'benetifs' => ['nullable', 'string', 'max:4000'],
                'vacancies' => ['required', 'string'],
                'requirements' => ['required', 'string', 'max:4000'],
                'status' => ['required', 'in:inactive,active'],
                'category_id' => ['required', 'exists:App\Models\Category,id'],
                'city_id' => ['required', 'exists:App\Models\City,id'],
                'experience_id' => ['required', 'exists:App\Models\Experience,id'],
            ]);

            if ($validator->fails()) {
                return redirect()->json($validator, 400); // bad request
            }

            // save vacante
            $vacant = Auth::user()->vacant()->create($validator->validated());

            return redirect()->json($vacant, 202); // request ok
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

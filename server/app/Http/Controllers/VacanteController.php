<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Dotenv\Repository\RepositoryInterface;
use App\Http\Requests\Vacancies\StoreVacantRequest;
use App\Http\Requests\Vacancies\UpdateVacantRequest;
use Illuminate\Auth\Events\Validated;

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
    public function store(StoreVacantRequest $request)
    {
        //! Quitar el signo cuando se haga la peticion desde vue
        if (!$request->ajax()) {
            // transform date to format 'año - mes - dia - hora - minutos'
            $newData = date('Y-m-d H:i:s', strtotime($request->date));
            $request->date = $newData;

            // check if exists an image
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('vacant', 'public');
            }

            $vacantToSave = array_merge($request->validated(), [
                'date' => $request->date,
                'image' => $path ?? ''
            ]);

            // save vacante
            $vacant = $request->user()->vacant()->create($vacantToSave);

            return response()->json($vacant, 201); // request ok
        }

        return response()->json(["msg" => 'the client does not have the necessary permissions'], 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {
        return response()->json($vacante, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVacantRequest $request, Vacante $vacante)
    {
        //! Quitar el signo cuando se haga la peticion desde vue
        if (!request()->ajax()) {
            $vacante->update($request->Validated());
            return response()->json(['message' => "the vacant $vacante->name was updated"]);
        } else {
            return response()->json(["message" => 'the client does not have the necessary permissions'], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacante $vacante)
    {
        $vacante->delete();
        return response()->json(['message' => "the vacant \"$vacante->name\" was deleted"]);
    }
}

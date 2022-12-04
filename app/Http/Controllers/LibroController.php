<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['libros']=Libro::paginate(5);
        return view('libro.index', $datos );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('libro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$datosEmpleado = request()->all();

        $campos = [
            'Nombre'=>'required|string|max:100',
            'Autor'=>'required|string|max:100',
            'Editorial'=>'required|string|max:100',
            'Categoria'=>'required|string|max:100',
            'Isbn'=>'required|string|unique:libros|max:13',
            'Paginas'=>'required|string|max:5',
            'Encuadernacion'=>'required|string|max:100',
            'Tipo'=>'required|string|max:100',
            'Foto'=>'required|max:10000|mimes:jpg,jpeg,png,gif',
            
       
        ];
        $mensaje = [
                'required'=>'El :attribute es requerido',
                'Foto.required' => 'La foto es requerida'

        ];

        $this->validate($request, $campos, $mensaje);

        $datosLibro = request()->except('_token');

        if($request->hasFile('Foto')){
            $datosLibro['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Libro::insert($datosLibro);
        //return response()->json($datosEmpleado);

        $request->merge(['user_id'=> Auth::id()]);
        

        return redirect('libro')->with('mensaje','Libro agregado con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $libro=Libro::findOrFail($id);

        return view('libro.edit', compact('libro') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
       $campos=[
            
            'Nombre'=>'required|string|max:100',
            'Autor'=>'required|string|max:100',
            'Editorial'=>'required|string|max:100',
            'Categoria'=>'required|string|max:100',
            'Isbn'=>'required|string|unique:libros|max:13',
            'Paginas'=>'required|string|max:5',
            'Encuadernacion'=>'required|string|max:100',
            'Tipo'=>'required|string|max:100',
            'Foto'=>'required|max:10000|mimes:jpg,jpeg,png,gif',
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido',
        ];
        if($request->hasFile('Foto')){

            $campos = ['Foto'=>'required|max:10000|mimes:jpg,jpeg,png,gif'];
            $mensaje = ['Foto.required' => 'La foto es requerida'];
        }

        $this->validate($request, $campos,$mensaje);
        //
        $datosLibro = request()->except(['_token', '_method']);

        if($request->hasFile('Foto')){
            $libro=Libro::findOrFail($id);

            Storage::delete('public/'.$libro->Foto);

            $datosLibro['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Libro::where('id', '=', $id) -> update($datosLibro);
        $libro=Libro::findOrFail($id);
        //return view('libro.edit', compact('libro') );
    
        return redirect('libro')->with('mensaje','Libro editado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $libro=Libro::findOrFail($id);

        if(Storage::delete('public/'.$libro->Foto)){

            Libro::destroy($id);
            
        }

        return redirect('libro')->with('mensaje',
       'Libro borrado');

    }
}

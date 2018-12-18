<?php

namespace App\Http\Controllers;


use App\Message;
use App\Events\MessageWasRecived;
use Mail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $mensajes = DB::table('messages') -> get();
        */

        // USANDO EL MODELO DE ELOQUENT
        //$mensajes = Message::all();
        //LAS CONSULTAS HECHAS EN LA LINEA ANTERIOR SE PUEDEN OPTIMZIAR DE LA SIGUIENTE FORMA
        $mensajes = Message::with(['user', 'note', 'tags'])
        ->orderBy('created_at', request('sorted', 'DESC'))
        ->paginate(10);
        //ESTA CLASE DE CONSULTA SIRVE PARA OPTIMIZAR EL TIEMPO DE EJECUCION CUANDO SE TIENEN RELACIONES

        /*
        return Message::all();
        */

        return view("messages.index", compact('mensajes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("messages.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        /* ESTO ES UNA FORMA DE INSERTAR LOS DATOS EN LA TABLA
        DB::table('messages') -> insert([
            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "mensaje" => $request->input('mensaje'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        */
        

        /* USANDO EL MODELO DE ELOQUENT, ASIGNADO PROPIEDADES A UN OBJETO DEL MODELO CREADO
        $message = new Message;
        $message->Nombre = $request->input('nombre');
        $message->email = $request->input('email');
        $message->message = $request->input('mensaje');
        $message->save();
        */

        // USANDO EL MODELO DE ELOQUENT Y PERMITIR ENVIAR MENSAJES PARA USUARIOS E INVITADOS
        $message = Message::create($request->all());

        if (auth()->check()) {
            auth()->user()->messages()->save($message);
        }

        event(new MessageWasRecived($message));
        
        //PARA PERMITIR SOLO A USUARIOS REGISTRADOS ENVIAR MENSAJES SE UTILIZA LA SIGUIENTE LINEA
        //auth()->user()->messages()->create($request->all());

        return redirect() -> route('mensajes.create')->with('info', 'Hemos recibido tu mensaje');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //message = DB::table('messages')->where('id', $id)->first();

        // USANDO EL MODELO DE ELOQUENT
        $message = Message::findOrFail($id);
        return view("messages.show", compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$message = DB::table('messages')->where('id', $id)->first();

        // USANDO EL MODELO DE ELOQUENT
        $message = Message::findOrFail($id);
        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*
        DB::table('messages')->where('id', $id)->update([
            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "message" => $request->input('mensaje'),
            "updated_at" => carbon::now(),
        ]);
        */

        // USANDO EL MODELO DE ELOQUENT
        Message::findOrFail($id)->update($request->all());

        return redirect()->route('mensajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*
        DB::table('messages')->where('id', $id)->delete();
        */

        // USANDO EL MODELO DE ELOQUENT
        Message::findOrFail($id)->delete();
        return redirect()->route('mensajes.index');
    }
}

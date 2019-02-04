<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessage;
use Illuminate\Http\Request;

class PagesController extends Controller
{
	//protected $request;

	public function __construct() {
		$this -> middleware('example', ['except' => ['home']]);
	}

    public function home() {
    	//return ['key' => ['1', '2']];
    	return view('home');
    	/*return response('contenido de la respuesta', 201)
    		->header('X-TOKEN', 'secret')
    		->header('X-TOKEN-2', 'test');*/
    }

    /*
    public function contact() {
    	return view('contactos');
    }
    */

    public function saludo($nombre = "Invitado") {
    	$html = "<h2>Hola mundo</h2>";
		$consolas = [
			'Xbox',
			'Play 4',
			'switch'
		];
		//return view('saludo', ['nombre' => $nombre]);
		//return view('saludo')->with(['nombre' => $nombre]);
		return view('saludo', compact('nombre', 'html', 'consolas'));
    }

    public function mensajes(CreateMessage $request) {

    	$data = $request -> all();

    	/*return response()->json([
    		'data' => $data
    	], 202)
    	->header('TOKEN', 'secret');*/

    	return back()
    	//redirect()
    		//->route('contacto')
    		->with('info', 'Tu mensaje a sido enviado.');

    	/*if ($request->filled('nombre')) {
    		return 'Si tiene nombre. ' .  $request->input('nombre');
    	}
		return 'No tiene nombre.';*/ 	
    }

    public function select(Request $request)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);
        return redirect()->route('chat.create', $request->id);
    }
}

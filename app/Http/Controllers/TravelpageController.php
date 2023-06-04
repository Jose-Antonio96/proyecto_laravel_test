<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Travel;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Models\Tag;


class TravelpageController extends Controller
{
    public function travel($id){


        $travel = Travel::find($id);
            return view('traveliens.travelpage', compact('travel'));
        }

    public function createTravel(Request $request){

        if (!Auth::check())
            return redirect(route("login"));
    

    if (Auth::check()) {
        $user_id = Auth::id();
            /* Esto es para testeo
        Log::info("hello");
        Log::info($request);
        
        $data = $request->validate([
            'name' => 'required|max:100',
            'location' => 'required|max:40',
            'description' => 'required|max:3000',
            'image' => 'file',
            'starts' => 'date|after:tomorrow',
            'finishes' => 'date|after:start_date',
            'sponsored' => '',
            'professional' => '',
            'price' => 'required|max:10'
        ]);
        /*
        Log::info("world");
        Log::info($data);
        */
        

        $travel = new Travel();
        $travel -> name = $request->name;
        $travel -> location = $request->location;
        $travel -> description = $request->description;
        $travel->user_id = $user_id;
        /*
        $travel -> starts = $request->starts;
        $travel -> finishes = $request->finishes;
        */

        $travel-> save();


        return redirect(route('account'))->with('status', 'Viaje creado con éxito');
    }
}
    public function show(){
        $authedUser = Auth::user();
        
        $travels = Travel::where('user_id', $authedUser->id)->get();
    

        return view('traveliens.travel-display', compact('travels'));
    }

    public function get_tags(Request $request){
        $tag = $request->validate(['tags'=>'']);

        Tag::store($tag['tags'] ?? "off");

        return redirect(route('account'))->with('status', 'success');
    }

    public function joinTravel(Request $request){
        if (Auth::check()){

    $user_id = Auth::id();
    $travel_id = $request->input('travel_id');
         // Obtiene el ID del usuario y el ID del viaje de la solicitud POST
    $user_id = $request->input('user_id');
    $travel_id = $request->input('travel_id');

    // Asigna el viaje al usuario
    $user = User::find($user_id);
    $user->travel()->attach($travel_id);

    return redirect(route('account'))->with('status', 'Apuntado al viaje con éxito');
        }
    }

    public function joinedtravels(){
        return view('traveliens.joinedtravels');
    }

    public function displaytravels(Request $request){
        
        $travels = Travel::all();
        return view('traveliens.mainpage', compact('travels'));
    }
}




    
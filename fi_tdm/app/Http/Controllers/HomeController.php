<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;

class HomeController extends Controller
{

    public function index(Request $request){


        $co = $request->co;
        $cia = $request->cia;



        $shop = Shop::where("centro_operacion", $co)->where("id_company", $cia)->first();

        if (!$shop) {

            $shops = Shop::all();
            return view('error_404',compact("shops"));
        }

        $zonaHorariaColombia = new DateTimeZone('America/Bogota');
            $date_now = new DateTime('now', $zonaHorariaColombia);
            $date_now = Carbon::now()->format('Y-m-d');

        return view('welcome', compact("shop","date_now"));
    }


    public function save(Request $request){


        $user = User::where("phone", $request->phone)->where("id_shop", $request->id_shop)->first();


        if ($user) {
           return redirect()->back()->with('message_error',"Ya existe un registro de usuario!");
        }


        $user = new User();

        $user->name = $request->name;

        $user->phone = $request->phone;

            $user->date_brirthay = $request->date_brirthay;

        $user->id_shop = $request->id_shop;

        $user->save();


        return redirect()->back()->with('message',"Usuario creado correctamente");
    }


    public function show(Request $request){
        $users = User::join("shops", "users.id_shop", "shops.id")
        ->join("companies", "shops.id_company", "companies.id")
        ->select("users.name","users.phone", "users.date_brirthay", "shops.name as name_shop", "companies.name as name_company")
        ->get();
        return view('show',compact("users"));
    }
}

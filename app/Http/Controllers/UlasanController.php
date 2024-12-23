<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    public function store(Request $request, $id){
        $request -> validate([
            "ulasan" => "required",
        ]);

        $cekUlasan = Ulasan::where('user_id',Auth::id())->count();
        $Ulasan = Ulasan::where('user_id',Auth::id())->first();

        if ($cekUlasan < 1) {
            Ulasan::create([
                "user_id" => Auth::id(),
                "destinasi_id" => $id,
                "ulasan" => $request -> ulasan,
            ]);
        }else {
            $Ulasan->update([
                "user_id" => Auth::id(),
                "destinasi_id" => $id,
                "ulasan" => $request -> ulasan,
            ]);
        }
        return redirect("destinasi/". $id)->with("success");
    }
}

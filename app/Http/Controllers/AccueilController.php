<?php

namespace App\Http\Controllers;

use App\Models\Boutique;
use App\Models\Ville;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AccueilController extends Controller
{
    public function home()
    {
        $ville=Ville::all();
        $categorie=Category::all();
        $boutique=DB::table('boutiques')->selectRaw('count(id) as cnt')->pluck('cnt');
        return view('home.home',compact('ville','categorie','boutique'));
    }
    public function filtrage(Request $request)
    {
        $ville=Ville::all();
        $categorie=Category::all();
        $ville_recherche=$request->input('ville');
        $categorie_recherche=$request->input('Categorie');

        if($ville_recherche==''&&$categorie_recherche=='')
        {
            $boutique=Boutique::all();
        }
        else if($ville_recherche==''&&$categorie_recherche!='')
        {
            $boutique=Boutique::where('categorie_id',$categorie_recherche)->get();
        }
        else if($ville_recherche!=''&&$categorie_recherche=='')
        {
            $boutique=Boutique::where('ville_id',$ville_recherche)->get();
        }
        else{
            $boutique=Boutique::where('categorie_id',$categorie_recherche)->where('ville_id',$ville_recherche)->get();
        }
        return view('home.filtrage',compact('ville','categorie','boutique'));
    }
    public function filtrage1()
    {
        $ville=Ville::all();
        $categorie=Category::all();
        $boutique=Boutique::all();
        return view('home.filtrage',compact('ville','categorie','boutique'));
    }
    public function vetement()
    {
        $ville=Ville::all();
        $categorie=Category::all();
        $boutique=Boutique::where('categorie_id','2')->get();
        return view('home.filtrage',compact('ville','categorie','boutique'));
    }
    public function phone()
    {
        $ville=Ville::all();
        $categorie=Category::all();
        $boutique=Boutique::where('categorie_id','1')->get();
        return view('home.filtrage',compact('ville','categorie','boutique'));
    }
    public function voirplus($id)
    {
        $boutique=Boutique::where('id', $id)->get();
        return view('home.voirplus',compact('boutique'));
    }
}

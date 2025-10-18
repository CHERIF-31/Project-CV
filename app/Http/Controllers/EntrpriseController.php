<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrprise;
use Auth;
use App\Http\Requests\entrepriseRequest;

class EntrpriseController extends Controller
{
    public function index(){
        if(Auth::user()->type=='admin'){
            $list_entreprise=Entrprise::all();
        }
        elseif(Auth::user()->type =='entreprise'){
            $list_entreprise = Auth::user()->entrprise;
        }
        return view('backend.entreprise.entreprise',['entreprise'=> $list_entreprise]);
        
    }
    public function create(){

        return view('backend.entreprise.project-add');
    }
    public function store(entrepriseRequest $request){
        $entreprise = new Entrprise();
        $entreprise->domaine = $request->input('domaine');
        $entreprise->description =  $request->input('description');
        $entreprise->nombre =  $request->input('nombre');
        $entreprise->dollar =  $request->input('dollar');
        $entreprise->photo =  $request->input('photo');
        $entreprise->pays =  $request->input('pays');
        $entreprise->ville = $request->input('ville');
        $entreprise->adresse = $request->input('adresse');
        $entreprise->temps_jop =  $request->input('temps_jop');
        $entreprise->user_id = Auth::id();
        $entreprise->save();
        
        session()->flash('succes','Vous avez cree un post');
        return redirect()->route('entreprise.index');

    }
    public function destroy(entrepriseRequest $request,$id){
        $entreprise = Entrprise::find($id);
        $entreprise->delete();

        return redirect()->route('entreprise.index')->with('supprrime','Vous avez supprime la post');
    }
    public function edit($id){
        $entreprise= Entrprise::find($id);

        return view('backend.entreprise.project-edit',[ 'entreprise' => $entreprise]);
    }
    public function update(entrepriseRequest $request,$id){
        $entreprise= Entrprise::find($id);

        $entreprise->domaine = $request->input('domaine');
        $entreprise->description =  $request->input('description');
        $entreprise->nombre =  $request->input('nombre');
        $entreprise->dollar =  $request->input('dollar');
        $entreprise->photo =  $request->input('photo');
        $entreprise->pays =  $request->input('pays');
        $entreprise->ville = $request->input('ville');
        $entreprise->adresse = $request->input('adresse');
        $entreprise->temps_jop =  $request->input('temps_jop');
        $entreprise->user_id = Auth::id();
        $entreprise->save();
        

        return redirect()->route('entreprise.index')->with('modifier','Vous avez modifier un post');
    }
    public function index_all(){
        if(Auth::user()->type=='emploi' || Auth::user()->type=='admin'){
        $listentreprise= Entrprise::all();
        return view('backend.post.entreprisecv',['listentreprise'=>$listentreprise]);
        }else{
            return abort(code: 403);
        }
    }
}

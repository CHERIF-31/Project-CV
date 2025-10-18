<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cv; 
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\cvRequest;

class CvController extends Controller
{
    public function index(){
        if(Auth::user()->type == 'admin'){
            $listcv = Cv::all();
        }
        elseif(Auth::user()->type == 'emploi'){
            $listcv = Auth::user()->cv; // récupère uniquement les CV du user connecté
        }
        
        
        return view('backend.projet_cvs.projects',['cvs'=> $listcv]);
    }

    public function create(){
        return view('backend.projet_cvs.project-add');
    }

    public function store(cvRequest $request){
        $cv = new Cv();
        $cv->presentation=$request->input('presentation');
        $cv->domaine=$request->input('domaine');
        $cv->pays =  $request->input('pays');
        $cv->ville = $request->input('ville');
        $cv->adresse = $request->input('adresse');
        $cv->temps_jop =  $request->input('temps_jop');
        $cv->user_id = Auth::id();
        
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/cvs'), $filename);
            $cv->photo = 'uploads/cvs/'.$filename;
        }

        $cv->save();

        return redirect()->route('cvs.index')->with('succes', 'CV créé avec succès !');
    }

    public function show($id){
        $cv =Cv::find($id);
        return view('backend.projet_cvs.project-detail',['cvdetail'=>$cv]);
    }

    public function edit($id){
        $cv = Cv::find($id);

        return view('backend.projet_cvs.project-edit',['cvs' => $cv]);
    }

    public function update(cvRequest $request,$id){
        $cv = Cv::findOrFail($id);
        $cv->presentation=$request->input('presentation');
        $cv->domaine=$request->input('domaine');
        $cv->pays =  $request->input('pays');
        $cv->ville = $request->input('ville');
        $cv->adresse = $request->input('adresse');
        $cv->temps_jop =  $request->input('temps_jop');
        $cv->user_id = Auth::id();

        $cv->save();
        return redirect()->route('cvs.index')->with('modifier','Vous avez modifier le projet');;

    }

    public function destroy(cvRequest $request,$id){
        $cv=Cv::find($id);
        $cv->delete();

        return redirect()->route('cvs.index')->with('supprrime','Vous avez supprime le projet');
    } 
}
<?php
    use Illuminate\Routing\Controller;
    use App\Models\Content;
    use App\Models\User;
    use App\Models\Alunno;
    use App\Models\Impiegato;
    use App\Models\Scuola;
    use App\Models\Valutazione;

    class DeleteVoteController extends Controller{
        public function deletevote(){
            if(session("username")!=null){
                $user=session("username");
                $cf=User::select('Cf')->where('Username', $user)->first()->toArray()['Cf'];
                $alunno=Alunno::where('Cf', $cf)->get()->toArray();
                if($alunno!=null){
                    $tipo="alunno";
                }
                $impiegato=Impiegato::where('Cf', $cf)->get()->toArray();
                if($impiegato!=null){
                    $tipo="impiegato";
                }
                if(!isset($tipo)){
                    return redirect("homepage")->with("user", $user);
                }
                if($tipo="impiegato"){
                    return view("rimuovivoto")
                    ->with("user", $user)
                    ->with("tipo", $tipo)
                    ->with("cf", $cf);
                }
                else redirect("homepage")->with("user", $user)->with("tipo", $tipo);
            }
            else return redirect("login");
        }

        public function delete(){
            if(session("username")!=null){
                $user=session("username");
                $cf=User::select('Cf')->where('Username', $user)->first()->toArray()['Cf'];
                $alunno=Alunno::where('Cf', $cf)->get()->toArray();
                if($alunno!=null){
                    $tipo="alunno";
                }
                $impiegato=Impiegato::where('Cf', $cf)->get()->toArray();
                if($impiegato!=null){
                    $tipo="impiegato";
                }
                $request=request();
                foreach($request->voti as $voto){
                    Valutazione::where("codice", $voto)->delete();
                }
                return redirect("valutazione")
                ->with("user", $user)
                ->with("tipo", $tipo);
            }
            else redirect("login");
        }        
    }
?>
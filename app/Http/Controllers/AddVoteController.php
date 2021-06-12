<?php
    use Illuminate\Routing\Controller;
    use App\Models\Content;
    use App\Models\User;
    use App\Models\Alunno;
    use App\Models\Impiegato;
    use App\Models\Scuola;
    use App\Models\Docenza;
    use App\Models\Valutazione;

    class AddVoteController extends Controller{
        public function addvote(){
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
                    $result=array();
                    $selezione1=Docenza::select("id_classe")->where("cf_insegnante", $cf)->get()->toArray();
                    //print_r($selezione1);
                    foreach($selezione1 as $el){
                        $selezione2=Alunno::all()->where("id_classe", $el['id_classe'])->toArray();
                        //print_r($selezione2);
                    }
                    $result[]=$selezione2;
                    //print_r($result);
                    $selezione3=Docenza::select("nomemateria")->where("cf_insegnante", $cf)->get()->toArray();
                    //print_r($selezione3);
                    $result[]=$selezione3;
                    //print_r($result);
                    return view("aggiungivoto")
                    ->with("user", $user)
                    ->with("tipo", $tipo)
                    ->with("result", $result);
                }
                else redirect("homepage")->with("user", $user)->with("tipo", $tipo);
            }
            else return redirect("login");
        }

        public function add(){
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
                Valutazione::create([
                    'Cf_Alunno' => $request->alunno,
                    'Cf_Insegnante' => $cf,
                    'NomeMateria' => $request->materie,
                    'Voto' => $request->vote,
                    'Data' => $request->date
                ]);
                return redirect("valutazione")
                ->with("user", $user)
                ->with("tipo", $tipo);
            }
            else redirect("login");
        }
    }
?>
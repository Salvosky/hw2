<?php
    use Illuminate\Routing\Controller;
    use App\Models\Content;
    use App\Models\User;
    use App\Models\Alunno;
    use App\Models\Impiegato;
    use App\Models\Scuola;
    use App\Models\Valutazione_Dettagli;

    class ValutazioneController extends Controller{
        public function valutazione(){
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
                return view("valutazione")->with("user", $user)->with("tipo", $tipo)->with("cf", $cf);
            }
            else return redirect("login");
        }

        public function seek(string $cf){
            $result=Valutazione_Dettagli::where("cf_alunno", $cf)->get()->toArray();
            //$result=Valutazione_Dettagli::all()->where("cf_alunno", $cf);
            return $result;
        }

        public function seekTeacher(string $cf){
            $result=Valutazione_Dettagli::where("cf_insegnante", $cf)->get()->toArray();
            return $result;
        }
    }
?>
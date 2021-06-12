<?php
    use Illuminate\Routing\Controller;
    use App\Models\Content;
    use App\Models\User;
    use App\Models\Alunno;
    use App\Models\Impiegato;
    use App\Models\Docenti_Classe;
    use App\Models\Classe_Dettagli;

    class ClassPageController extends Controller{
        public function classpage(){
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
                    return view("classpage")->with("user", $user);
                }
                return view("classpage")->with("user", $user)->with("tipo", $tipo);
            }
            else return view("classpage");
        }

        public function seek(int $id){
            $docenti[]=Docenti_Classe::where("id", $id)->get();
            $alunni[]=Classe_Dettagli::where("id_classe", $id)->get();
            $i=0;
            foreach($docenti as $el){
                $result[$i]=$el;
                $i++;
            }
            foreach($alunni as $el){
                $result[$i]=$el;
                $i++;
            }
            return $result;
        }
    }
?>
<?php
    use Illuminate\Routing\Controller;
    use App\Models\Content;
    use App\Models\User;
    use App\Models\Alunno;
    use App\Models\Impiegato;
    use App\Models\Scuola;
    use App\Models\Docente_Classi;
    use App\Models\Alunni_Dettagli;

    class YourSchoolController extends Controller{
        public function yourschool(){
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
                return view("your_school")->with("user", $user)->with("tipo", $tipo)->with("cf", $cf);
            }
            else return redirect("login");
        }

        public function seek(string $cf){
            $docenti=Docente_Classi::where('cf_insegnante', $cf)->get();
            $alunni=Alunni_Dettagli::where('cf', $cf)->get();
            if(count($docenti)>0){
                return $docenti;
            }
            if(count($alunni)>0){
                return $alunni;
            }
        }
    }
?>
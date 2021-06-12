<?php
    use Illuminate\Routing\Controller;
    use App\Models\Content;
    use App\Models\User;
    use App\Models\Alunno;
    use App\Models\Impiegato;
    use App\Models\Scuola;

    class SearchSchoolController extends Controller{
        public function searchschool(){
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
                    return view("searchschool")->with("user", $user);
                }
                return view("searchschool")->with("user", $user)->with("tipo", $tipo);
            }
            else return view("searchschool");
        }

        public function searchid(int $id){
            $result=Scuola::where("Id", $id)->get()->toArray();
            return $result;
        }

        public function searchall(){
            $result=Scuola::all()->toArray();
            return $result;
        }
    }
?>
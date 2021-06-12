<?php
    use Illuminate\Routing\Controller;
    use App\Models\Content;
    use App\Models\User;
    use App\Models\Alunno;
    use App\Models\Impiegato; 

    class ProfileController extends Controller{

        public function profile(){
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
                    return view("profile")->with("user", $user);
                }
                return view("profile")->with("user", $user)->with("tipo", $tipo);
            }
            else return redirect("login");
        }
        

        public function profile_details(string $account){
            $search=User::select("Username", "Nome", "Cognome", "Cf")->where("Username", $account)->first()->toArray();
            $cf=User::select('Cf')->where('Username', $account)->first()->toArray()['Cf'];
            $alunno=Alunno::where('Cf', $cf)->get()->toArray();
            if($alunno!=null){
                $search["tipo"]="alunno";
            }
            $impiegato=Impiegato::where('Cf', $cf)->get()->toArray();
            if($impiegato!=null){
                $search["tipo"]="impiegato";
            }
            return $search;
        }
    }
?>
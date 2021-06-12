<?php
    use Illuminate\Routing\Controller;
    use Illuminate\Http\Request;
    use App\Models\Content;
    use App\Models\User;
    use App\Models\Alunno;
    use App\Models\Impiegato;
    use App\Models\Scuola;
    use App\Models\Scuola_Dettagli;
    use App\Models\Persone_Db;

    class SchoolDetailsController extends Controller{
        public function schooldetails(Request $request){
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
                $id_scuola=$request->input('Id_Scuola');
                $logincf=Persone_Db::select('cf')->where('id_scuola', $id_scuola)->get()->toArray();
                foreach($logincf as $el){
                    if($el['cf']===$cf){
                        $check="check";
                    }
                }
                if(isset($check)){
                    return view("schooldetails")->with("user", $user)->with("tipo", $tipo)->with("logincf", $check);
                }
                else return view("schooldetails")->with("user", $user)->with("tipo", $tipo);
            }
            else return view("schooldetails");
        }

        public function seek(int $id){
            $result=Scuola_dettagli::where("id", $id)->get()->toArray();

            return $result;
        }
    }

?>
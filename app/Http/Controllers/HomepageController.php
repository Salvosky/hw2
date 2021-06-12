<?php
    use Illuminate\Routing\Controller;
    use App\Models\Content;
    use App\Models\User;
    use App\Models\Alunno;
    use App\Models\Impiegato;

    class HomepageController extends Controller{

        public function homepage(){
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
                    return view("homepage")
                    ->with("user", $user);
                }
                return view("homepage")
                ->with("user", $user)
                ->with("tipo", $tipo);
            }
            else return view("homepage");
        }

        public function content(){
            $content=Content::all()->toArray();
            return $content;
        }

        public function holidays(int $year){
            $apikey="fd2cb6c336df135336f58bf02e9b0a92a8ebde3e";
            $curl=curl_init();
            if(isset($year)){
                curl_setopt($curl, CURLOPT_URL, "https://calendarific.com/api/v2/holidays?api_key=".$apikey."&country=IT&year=".$year);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $holidays=curl_exec($curl);
                curl_close($curl);
                return $holidays;
            }
            else{
                $year=2021;
                curl_setopt($curl, CURLOPT_URL, "https://calendarific.com/api/v2/holidays?api_key=".$apikey."&country=IT&year=".$year);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $holidays=curl_exec($curl);
                curl_close($curl);
                return $holidays;
            }
        }
    }
?>
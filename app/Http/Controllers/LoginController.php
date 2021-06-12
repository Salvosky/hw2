<?php

    use Illuminate\Routing\Controller;
    use App\Models\Content;
    use App\Models\User;
    use App\Models\Alunno;
    use App\Models\Impiegato;

    class LoginController extends Controller{

        public function login(){
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
                return redirect("homepage")->with("user", $user)->with("tipo", $tipo);
            }
            else return view("login");
        }

        public function authentification(){
            //Facciamo una query alla tabella connessa alla classe User (nel nostro caso Account)
            //e imponiamo una query in cui ci facciamo ritornare i campi username e password
            //con la clausola where in cui si passa il valore passato dal form
            $user=User::where('username', request('username'))->first();
            
            if(isset($user)){
                if(password_verify(request('password'), $user->Password)){
                    Session::put('username', $user->Username);
                    return redirect('homepage');
                }
            }
            return redirect('login');
        }

        public function logout(){
            Session::flush();
            return redirect('login');
        }
    }
?>
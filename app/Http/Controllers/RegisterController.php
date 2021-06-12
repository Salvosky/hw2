<?php
    use Illuminate\Routing\Controller;
    use App\Models\Content;
    use App\Models\User;
    use App\Models\Alunno;
    use App\Models\Impiegato;

    class RegisterController extends Controller{
        
        /*public function register(){
            $user=session("username");
            if($user==null){
                return view('register');
            }
            else return redirect('homepage')->with("user", $user);
        }*/

        public function register(){
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
            else return view("register");
        }

        public function create(){
            $request=request();

            $usernameCheck=User::select("Username")->where("Username", $request->username)->get();

            print_r($usernameCheck);

            if(count($usernameCheck)===0){
                User::create([
                    'Username'=> $request->username,
                    'Cf'=> $request->cf,
                    'Nome'=> $request->nome,
                    'Cognome'=> $request->cognome,
                    'Password'=> password_hash($request->password, PASSWORD_BCRYPT),
                ]);
                return redirect("login");
            }
            else{
                $error=true;
                return view("register")->with("error", $error);
            }
        }
    }
?>
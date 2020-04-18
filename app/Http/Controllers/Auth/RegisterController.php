<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\FranchiseeRegistration;
use App\Mail\ParentRegistration;

use App\User;
use App\Parents;
use App\Admin;
use App\Writer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:parents');
        $this->middleware('guest:admin');
        $this->middleware('guest:writer');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /*protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }*/


    protected function validator(array $data)
    {

        if($data['flag'] == 'franchisee'){
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255','unique:users'],         
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'verification_code' => 'required|franchisee_registration_code',
            ]);
        }

        if($data['flag'] == 'parents'){
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255','unique:parents'],         
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'verification_code' => 'required|parent_registration_code',
            ]);
        }

    }



    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showParentsRegisterForm()
    {
        return view('auth.register', ['url' => 'parents']);
    }



    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showWriterRegisterForm()
    {
        return view('auth.register', ['url' => 'writer']);
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    protected function create(array $data)
    {

       $enc_base_64 = base64_encode($data['email']);
       $verification_code= strtoupper($enc_base_64);  
       $verification_code= substr($verification_code, 0,10);    
        $userCreate =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'verification_code'=>$verification_code,
        ]);

        /*Mail Send Starts*/
            $objDemo = new \stdClass();
            $objDemo->sub1 = "You are created Franchisee Account Successfully";
            $objDemo->sub2 = 'Please use below credentials to login';
            $objDemo->APP_ROUTE_URL = config('constants.APP_FRANCHISEE_URL');             
            $objDemo->Email =  "Email : ".$data['email'];
            $objDemo->Password =  "Password : ".$data['password'];

            $objDemo->FranchiseeCode =  "Franchisee Code : ".$verification_code." ( This code can be used to create Parent )";


            $objDemo->sender = "Brainobrain Assessment";
            $objDemo->receiver = $data['name'];
            Mail::to($data['email'])->send(new FranchiseeRegistration($objDemo));

        /*Mail Send Ends*/    
        return $userCreate;
    }



    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createParents(Request $request)
    {//dd($request);
        $this->validator($request->all())->validate();
        $key = $request['verification_code'];
        $query = DB::table('users')->where('verification_code',$key)->select('id','verification_code')->get();        
        Parents::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'franchisee_id_fk'=>$query[0]->id,
        ]);

        /*Mail Send Starts*/
            $objDemo = new \stdClass();
            $objDemo->sub1 = "You are created Parent Account Successfully";
            $objDemo->sub2 = 'Please use below credentials to login';
            $objDemo->APP_ROUTE_URL = config('constants.APP_PARENT_URL');
            $objDemo->Email =  "Email : ".$request['email'];
            $objDemo->Password =  "Password : ".$request['password'];

           
            $objDemo->sender = "Brainobrain Assessment";
            $objDemo->receiver = $request['name'];
            Mail::to($request['email'])->send(new ParentRegistration($objDemo));

        /*Mail Send Ends*/ 

        //return $parentCreate;
        return redirect()->intended('login/parents');
    }



    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createAdmin(Request $request)
    {//dd($request);
        $this->validator($request->all())->validate();
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/admin');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createWriter(Request $request)
    {
        $this->validator($request->all())->validate();
        Writer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/writer');
    }
}

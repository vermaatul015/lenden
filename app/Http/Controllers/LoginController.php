<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Auth;
use \Validator;
use \Session;
use \Cookie;
use \Config;
use Redirect;
use \App\Models\User;
use App\Http\Helpers\Helper;

class LoginController extends Controller
{
    public function index(){
		if (\Auth::check()) {
			return \Redirect::route('dashboard');
		}
		return view('login');
	}

    public function doLogin(Request $request) {
		$validator = Validator::make($request->all(),
			[
				'email' => 'required|email',
				'password' => 'required'
			],
			[
				'email.required'      => trans('setup.email_required'),
				'email.email'       => trans('setup.email_format_incorrect'),
				'password.required'  => trans('setup.password_required'),
			]
		);
        $errors = $validator->errors()->all();
        if ($errors) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
			$remember = ($request->input('remember')) ? 1 : 0;
			//user login
			$auth = \Auth::attempt([
					'email'     	=> trim($request->input('email')),
					'password'  	=> trim($request->input('password')),
				]
			); 
			
			if ($auth) { 
				if(\Auth::user()->is_active == 'Y')   {
					if ($remember==1) {
						Cookie::queue('remember', '1', 5400);
						Cookie::queue('user', trim($request->input('email')), 5400);
						Cookie::queue('pass', trim($request->input('password')), 5400);
					} else {
						Cookie::queue('remember', '', 5400);
						Cookie::queue('user', '', 5400);
						Cookie::queue('pass', '', 5400);
					}
					if(\Auth::user()->name){
						Session::put('user',\Auth::user()->name);
						Session::put('user_id',\Auth::user()->id);
					}
					return \Redirect::route('dashboard');
				}else{
					$this->doLogout();
					$request->session()->flash('flash-error',trans('setup.user_inactive'));
					return \Redirect::route('login');
				}
				
			} else {        
				$request->session()->flash('flash-error',trans('setup.invalid_credentials'));
				return \Redirect::route('login');
			}
		}

		
	}

	public function register(Request $request) {
		if($request->isMethod('post')){
			$validator = Validator::make($request->all(),
				[
					'name' => 'required',
					'email' => 'required|email|unique:users,email',
					'password' => 'required|confirmed'
				],
				[
					'name.required'      => trans('setup.name_required'),
					'email.required'      => trans('setup.email_required'),
					'email.email'       => trans('setup.email_format_incorrect'),
					'email.unique'       => trans('setup.email_must_be_unique'),
					'password.required'  => trans('setup.password_required'),
					'password.confirmed'  => trans('setup.password_does_not_match_with_confirm_password'),
				]
			);
			$errors = $validator->errors()->all();
			if ($errors) {
				return Redirect::back()->withErrors($validator)->withInput();
			} else {
				// $remember = ($request->input('remember')) ? 1 : 0;
				//user login
				$user = new User;
				$user->name = $request->name;
				$user->email = $request->email;
				$user->password = bcrypt($request->password);
				if($user->save()){
					$auth = \Auth::attempt([
							'email'     	=> trim($request->input('email')),
							'password'  	=> trim($request->input('password')),
						]
					); 
					
					if ($auth) { 
						if(\Auth::user()->is_active == 'Y')   {
							if(\Auth::user()->name){
								Session::put('user',\Auth::user()->name);
								Session::put('user_id',\Auth::user()->id);
							}
							return \Redirect::route('dashboard');
						}else{
							$this->doLogout();
							$request->session()->flash('flash-error',trans('setup.user_inactive'));
							return \Redirect::route('login');
						}
						
					} else {        
						$request->session()->flash('flash-error',trans('setup.invalid_credentials'));
						return \Redirect::route('login');
					}
				}
				
			}
		}
		return view('register');
		
	}

	public function forgot_password_mail(Request $request) {
		$validator = Validator::make($request->all(),
			[
				'email' => 'required|email'
			],
			[
				'email.required'      => trans('setup.email_required'),
				'email.email'       => trans('setup.email_format_incorrect')
			]
		);
		$errors = $validator->errors()->all();
		if ($errors) {
			return Redirect::back()->withErrors($validator)->withInput();
		} else {
			$user = User::where('email',$request->email)->first();
			if($user){
				if($user->is_active == 'Y')   {
					$token = Helper::customEncryptionDecryption($request->email."forgot_password");
                    $user->password_token  = $token;
                    $user->password_token_date = date("Y-m-d H:i:s");
					$user->save();
                    $subject = trans('setup.password_regeneration');
					$url = route('reset-password',['token'=>$token]);
                    \Mail::send('email_templates.reset_password',
                    [
                        'user'           => $user,
                        'url'   => $url,
                        'base_url'       => url('/')
                    ], function ($m) use ($user, $subject) {                            
                        $m->to($user->email)->subject($subject);
                    });
					$request->session()->flash('flash-success',trans('setup.mail_sent_to_reset_password'));
					return \Redirect::route('login');
				}else{
					$request->session()->flash('flash-error',trans('setup.user_inactive'));
					return \Redirect::route('login');
				}
			}else{
				$request->session()->flash('flash-error',trans('setup.email_not_found'));
				return \Redirect::route('login');
			}
			
		}
		
	}

	public function reset_password(Request $request) {
		if($request->token){
			$user = User::where('password_token',$request->token)->first();
			if($user){
				if(Helper::getTimeDiff($user->password_token_date,date("Y-m-d H:i:s")) < 24){
					if($request->isMethod('post')){
						$validator = Validator::make($request->all(),
							[
								'password' => 'required|confirmed'
							],
							[
								'password.required'  => trans('setup.password_required'),
								'password.confirmed'  => trans('setup.password_does_not_match_with_confirm_password'),
							]
						);
						$errors = $validator->errors()->all();
						if ($errors) {
							return Redirect::back()->withErrors($validator)->withInput();
						} else {
							$user->password_token  = '';
                            $user->password  = bcrypt($request->password);
                            $user->save();
							$request->session()->flash('flash-success',trans('setup.password_updated_success'));
							return \Redirect::route('login');
						}
					}
					return view('reset_password');
				}else{
					$request->session()->flash('flash-error',trans('setup.link_has_been_expired'));
					return \Redirect::route('login');
				}
			}else{
				$request->session()->flash('flash-error',trans('setup.user_not_found'));
					return \Redirect::route('login');
			}
			
		}else{
			$request->session()->flash('flash-error',trans('setup.invalid_token'));
			return \Redirect::route('login');
		}
		
		
		
	}

	public function doLogout()
	{
		\Session::flush();
		\Auth::logout();
		return \Redirect::route('login');
	}
}

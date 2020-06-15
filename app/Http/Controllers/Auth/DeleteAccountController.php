<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator ;
use Hash;


class DeleteAccountController extends Controller
{

    /**
     * Create a new controller instance.
     */


    /**
     * Where to redirect users after delete account.
     *
     * @var string $redirectTo
     */

    protected $redirectTo = '/';

    /**
     * Delete user form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showDeleteAccountForm()
    {
        $user = Auth::User();

        return view('auth.delete_account', compact('user'));
    }

    public function deleteUser(Request $request)
    {
        $user = Auth::User();

        $this->validator($request->all())->validate();

        if (Hash::check($request->get('confirm_password'), $user->password)) {
            $user->delete();
            Auth::logout();
            return redirect($this->redirectTo)->withMessage('Ton compte a bien été supprimé!');
        } else {
            return redirect()->back()->withErrors('Le mot de passe ne correspond pas');
        }
    }

    /**
     * Get a validator for an incoming delete account request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'confirm_password' => 'required|min:7',
        ]);
    }
}

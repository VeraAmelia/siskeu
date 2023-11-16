<?php

namespace App\Http\Controllers;

// namespace App\Http\Controllers; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\User;
use Mail;
use Hash;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showForgetPasswordForm()
    {
        return view('auth.forgetPassword');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'pertanyaan_keamanan' => 'required|exists:users', // Pertanyaan keamanan
        ]);

        // Validasi jawaban pertanyaan keamanan
        $user = User::where('email', $request->email)->first();
        if (!$user || !$user->pertanyaan_keamanan === $request->pertanyaan_keamanan) {
            return back()->withErrors(['pertanyaan_keamanan' => 'Jawaban pertanyaan keamanan tidak benar.'])->withInput();
        }

        $token = Str::random(64);

        DB::table('users')
            ->where('email', $request->email)
            ->update([
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);

        Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('info', 'Sistem telah mengirimkan tautan pengaturan ulang kata sandi Anda melalui email!');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showResetPasswordForm($token)
    {
        return view('auth.forgetPasswordLink', ['token' => $token]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('users')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        // Perbarui kata sandi pengguna
        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        // Hapus token reset yang sudah digunakan
        DB::table('users')
            ->where('email', $request->email)
            ->update([
                'token' => null,
                'created_at' => null
            ]);

        return redirect('/login')->with('ganti', 'Password berhasil dirubah!');
    }
}

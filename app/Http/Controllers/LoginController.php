<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;
// use Auth;
// Aliaskan NoCaptcha dengan nama lengkapnya
use Anhskohbo\NoCaptcha\Facades\NoCaptcha;

// Aliaskan Captcha dengan nama lengkapnya
use Mews\Captcha\Facades\Captcha;


class LoginController extends Controller
{

    public function index()
    {

        $users = User::all();
        return view('FullDashboard.Users.Users', compact('users'));
    }

    public function showLoginForm()
    {
        return view('Login.login');
    }

    public function postlogin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'email' => 'required|email',
            'password' => 'required',
            // 'captcha' => 'required|captcha',
        ]);

        $remember = $request->has('remember'); // Memeriksa apakah kotak "Remember Me" dicentang

        // if (empty($request->name) || empty($request->password) || empty($request->captcha) ) {
        //     return redirect()->back()->with('kosong', 'Isi semua kolom login!');
        // }

        if (empty($request->name) || empty($request->password)  ) {
            return redirect()->back()->with('kosong', 'Isi semua kolom login!');
        }

        $validated = auth()->attempt([
            'name' => $request->name,
            'password' => $request->password,
        ], $remember); // Menggunakan variabel $remember sebagai parameter "remember" pada fungsi attempt

        if ($validated) {
            return redirect()->route('beranda')->with('login', 'Login Berhasil Dilakukan');
        } else {
            return redirect()->back()->with('error', 'Login Gagal, Silakan Ulangi!');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    // public function reloadCaptcha()
    // {
    //     return response()->json(['captcha' => captcha_img('flat')]);
    // }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'password_baru' => 'required|confirmed',
        ]);


        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Password lama tidak sama!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password_baru)
        ]);


        return back()->with("simpan", "Password berhasil dirubah!");
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'level' => 'required',
            'pertanyaan_keamanan' => 'required',
            'password' => 'required|min:6',
        ]);

        // Simpan data
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'pertanyaan_keamanan' => $request->pertanyaan_keamanan,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    public function destroy(string $id)
    {

        User::where('id', $id)->delete();
        return back()->with('hapus', 'Data Berhasil Di Hapus.');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'level' => 'required',             
            'pertanyaan_keamanan' => 'required',             
            'password' => 'nullable|min:6',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->pertanyaan_keamanan = $request->pertanyaan_keamanan;
        $user->level = $request->level;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User berhasil di updated.');
    }
}

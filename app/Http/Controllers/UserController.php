<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);

        $user = User::create($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    public function listadoUsuarios()
    {
        $usuarios = User::all();

        return view('user.listadoUsuarios', compact('usuarios'));
    }

    public function imprimirUsuarios(){
        $usuarios=User::all();
        view()-> share('usuarios',$usuarios);
        $pdf= \PDF::loadView('pdf.listadoUsuarios');
        return $pdf->download('usuarios.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate(User::$rules);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

    public function mostrarPerfil()
    {
        $user = User::find(Auth::id());
        return view('user.mostrarPerfil', compact('user'));
    }

    public function cambiarContrasena()
    {
        $user = User::find(Auth::id());
        return view('user.cambiarContrasena', compact('user'));
    }

    public function actualizarPassword(Request $request)
    {
        $request->validate([
            'oldPassword' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
        ]);


        #Match The Old Password
        if (!Hash::check($request->oldPassword, auth()->user()->password)) {
            return back()->with("error", "La contraseña anterior no coincide");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);
        return back()->with('success', 'La contraseña ha sido cambiada con éxito');
    }

    public function detallesPersonales()
    {
        return view('user.detallesPersonales');
    }

    public function actualizarPerfil(Request $request, User $user)
    {
       
        // request()->validate(User::$rules);

        // $user->update($request->all());

        User::where('id', Auth::id())
            ->update([
                'name' => DB::raw("'$request->name'"),
                'surname' => DB::raw("'$request->surname'"),
                'direccion' => DB::raw("'$request->direccion'"),
                'codigoPostal' => DB::raw("'$request->codigoPostal'"),
                'localidad' => DB::raw("'$request->localidad'"),
                'pais' => DB::raw("'$request->pais'"),
                'telefono' => DB::raw("'$request->telefono'"),
            ]);

        return back()->with('success', 'Perfil guardado correctamente');
    }
}

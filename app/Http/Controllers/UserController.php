<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kader;
use App\Http\Requests\UserRequest;

use PDF;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataPerPage = 5;

        $users = User::paginate($dataPerPage);
        $numRecords = User::count();
        $message = null;

        if(isset($request->field) && isset($request->keyword)) {
            $field = $request->field;
            $keyword = $request->keyword;

            if($field == 'nama') {
                $users = User::whereHas('kader', function($query) use($field, $keyword) {
                    $query->where($field, 'LIKE', '%'.$keyword.'%');
                 });
            
            } else {
                $users = User::where($field, 'LIKE', '%'.$keyword.'%');
            }
            
            $numRecords = $users->get()->count();
            $message = $numRecords." data ditemukan dengan kata kunci \"$keyword\"";
            if($numRecords > 0) $users = $users->paginate($dataPerPage);        
        }  
         
        return view('users.index',compact('users', 'numRecords', 'message'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    public function create()
    {
        $kaders = Kader::all();
        return view('users.create', compact('kaders'));
    }
  
    public function store(UserRequest $request)
    {   
        $request->validate([
            'username' => 'required|unique:users,username',
        ]);
        User::create([
            'username' => $request->username, 
            'password' => Hash::make($request->password), 
            'role'     => $request->role, 
            'kader_id' => $request->kader_id 
            ]);
         
        return redirect()->route('users.index')
                        ->with('success','User created successfully.');
    }
  
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }
  
    public function edit(User $user)
    {
        $kaders = Kader::all();
        return view('users.edit',compact('user', 'kaders'));
    }
  
    public function update(UserRequest $request, User $user)
    {
        // dd(($request->password == $user->password));
        $user->update([
            'username' => $request->username, 
            'password' => ($request->password == $user->password) ? $user->password : Hash::make($request->password), 
            'role'     => $request->role, 
            'kader_id' => $request->kader_id 
            ]);
         
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
   
    public function destroy(User $user)
    {
        $user->delete();
  
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

    public function generatePdf() {
        $users = User::all();
        $pdf = PDF::loadview('laporan.user', ['users' => $users]);
        return $pdf->download('laporan-user');
    } 
}

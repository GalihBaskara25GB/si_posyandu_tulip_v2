<?php
  
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kader;
use App\Models\Kriteria;
use App\Models\Rangking;
  
class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user()->isAdmin()) {
            $user = User::all()->count();
            $kader = Kader::all()->count();
            $kriteria = Kriteria::all()->count();
            return view('dashboard.admin', compact('user', 'kader', 'kriteria'));
        }
        return view('dashboard.user');
    }

    public function rangkingUser(Request $request) {

        $dataPerPage = 5;

        $rangkings = Rangking::orderBy('nilai_preferensi', 'desc')->paginate($dataPerPage);
        $numRecords = Rangking::count();
        $message = null;
        // dd($this->ahp());

        if(isset($request->field) && isset($request->keyword)) {
            $field = $request->field;
            $keyword = $request->keyword;

            if($field == 'nama') {
                $rangkings = Rangking::whereHas('kader', function($query) use($field, $keyword) {
                    $query->where($field, 'LIKE', '%'.$keyword.'%');
                 });
            
            } else {
                $rangkings = Rangking::where($field, 'LIKE', '%'.$keyword.'%');
            }
            
            $numRecords = $rangkings->get()->count();
            $message = $numRecords." data ditemukan dengan kata kunci \"$keyword\"";
            if($numRecords > 0) $rangkings = $rangkings->paginate($dataPerPage);        
        }  
         
        $currentUserRank =  Rangking::all()->first(function($item) {
            if($item->kader_id == Auth::user()->kader->id) {
              return $item;
            }
        });

        return view('rangking.user-rangking',compact('rangkings', 'numRecords', 'message', 'currentUserRank'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function aboutUs() 
    {
        return view('dashboard.aboutUs');
    }
}
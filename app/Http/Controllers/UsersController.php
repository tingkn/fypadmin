<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
class UsersController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        $users = User::query()
            ->when($query, function ($q) use ($query) {
                return $q->where('name', 'like', '%'.$query.'%');
            })
            ->paginate(10);

        return view('adminUser.index', compact('users'));
    }

    
    public function show(User $users)
    {
        return view('adminUser.show',compact('adminUser'));
    } 

    public function destroy($id) 
    {
       $users = User::where('id', $id)->firstorfail()->delete();
       return redirect()->route('adminUser.index')
       ->with('success','User has been deleted successfully');
    }
}
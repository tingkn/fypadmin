<?php
namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
class FormsController extends Controller
{
    // public function index()
    // {
    //     $data['forms'] = Contact::orderBy('id','desc')->paginate(10);
    //     return view('adminForm.index', $data);
    // }

    public function index(Request $request)
    {
        $query = $request->input('search');

        $forms = Contact::query()
            ->when($query, function ($q) use ($query) {
                return $q->where('name', 'like', '%'.$query.'%')
                        ->orWhere('email', 'like', '%'.$query.'%');
            })
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('adminForm.index', compact('forms'));
    }
    
    public function show(Forms $forms)
    {
        return view('adminForm.show',compact('adminForm'));
    } 

    public function destroy($id) 
    {
       $forms = Contact::where('id', $id)->firstorfail()->delete();
       return redirect()->route('adminForm.index')
       ->with('success','Form has been deleted successfully');
    }
}
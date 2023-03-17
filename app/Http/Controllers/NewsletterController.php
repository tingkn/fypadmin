<?php
namespace App\Http\Controllers;
use App\Models\Newsletter;
use Illuminate\Http\Request;
class NewsletterController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        $newsletter = Newsletter::query()
            ->when($query, function ($q) use ($query) {
                return $q->where('email', 'like', '%'.$query.'%');
            })
            ->paginate(10);

        return view('newsletter.index', compact('newsletter'));
    }

    public function show(Newsletter $newsletter)
    {
        return view('newsletter.show',compact('newsletter'));
    } 

    public function destroy($id) 
    {
       $newsletter = Newsletter::where('id', $id)->firstorfail()->delete();
       return redirect()->route('newsletter.index')
       ->with('success','The subscriber has been deleted successfully');
    }
}
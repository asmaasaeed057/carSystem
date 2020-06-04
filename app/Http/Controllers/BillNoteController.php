<?php

namespace App\Http\Controllers;

use App\BillNote;
use Illuminate\Http\Request;

use App\Custom;
use Auth;

class BillNoteController extends Controller
{

    public function callAction($method, $parameters)
    {
        $group = Auth::guard('admin')->user()->group;

        $actionObject = app('request')->route()->getAction();
        $controller = class_basename($actionObject['controller']);
        list($controller, $action) = explode('@', $controller);
        $valid = Custom::permission($group, $controller, $action);
        if ($valid) {
            return parent::callAction($method, $parameters);
        } else {
            return response()->view('admin.errors.403');
        }
    }
    public function index()
    {

        $notes = BillNote::all();
        return view('admin.notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notes.create');
    }

  

    public function store(Request $request)
    {
        BillNote::create($request->all());
        session()->flash('success', "Bill Note created successfully");
        return redirect(route('note.index'));
    }
 
  
    public function edit($id)
    {
        $note = BillNote::find($id);

        return view('admin.notes.edit', compact('note'));
    }


    public function update(Request $request, $id)
    {

        $note = BillNote::find($id);

        $note->update($request->all());

        session()->flash('success', "notes updated successfully");
        return redirect(route('note.index'));
    }

    public function destroy($id)
    {
        $note = BillNote::find($id);
        $note->delete();
        session()->flash('success', "notes deleted successfully");

        return redirect()->route('note.index');
    }
   
}

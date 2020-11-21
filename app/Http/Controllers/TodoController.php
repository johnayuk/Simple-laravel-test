<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use function compact;
use function dd;
use function dump;
use function redirect;
use function view;

class TodoController extends Controller
{

    public function create(Request $request){

        $this->validate($request,[
           "name"=>"required",
           "description"=>"required"
        ]);

        // $userId = Auth::user()->id;
       $todo = new Todo();
       $todo->name = $request->input('name');
       $todo->description = $request->input('description');

       $todo->save();
      return redirect::back()->with('status','working');
    }

    public function destroy(Todo $todo, $id){
        $todo = Todo::find($id);
        $todo->delete();
        return redirect('/')->with('status','deleted');
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('edit',compact('todo','id'));
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
               $this->validate( $request, [
                'name' => 'required',
                'description' => 'required',
               ]) ;
            //    $input = [
            //        'name' => $request ['name'],
            //        'description' => $request['description']
            //    ];
            //    dd($todo);
            $input = $request -> all();
        // $todo->update();
        $todo->fill($input)->save();
  
        return redirect('/')->with('status','updated');
    }
        
        
}


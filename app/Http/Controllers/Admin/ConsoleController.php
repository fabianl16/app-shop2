<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Console;
use File;


class ConsoleController extends Controller
{
    public function index()
    {
    	$consoles = Console::orderBy('name')->paginate(10);
    	return view('admin.consoles.index')->with(compact('consoles')); // listado
    }

    public function create()
    {
    	return view('admin.consoles.create'); // formulario de registro
    }

    public function store(Request $request)
    {
        $this->validate($request, Console::$rules, Console::$messages);

        $console = Console::create($request->only('name', 'description'));

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/consoles';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            
            // update category
            if ($moved) {
                $console->image = $fileName;
                $console->save(); // UPDATE
            }
        }

        return redirect('/admin/consoles');
    }

    public function edit(Console $console)
    {
        return view('admin.consoles.edit')->with(compact('console')); // form de edición
    }

    public function update(Request $request, Console $console)
    {
        $this->validate($request, Console::$rules, Console::$messages);

        $console->update($request->only('name', 'description'));

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/consoles';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            
            // update category
            if ($moved) {
                $previousPath = $path . '/' . $console->image;

                $console->image = $fileName;
                $saved = $console->save(); // UPDATE

                if ($saved)
                    File::delete($previousPath);
            }
        }        

        return redirect('/admin/consoles');
    }

    public function destroy(Console $console)
    {
        $console->delete(); // DELETE
        return back();
    }
}

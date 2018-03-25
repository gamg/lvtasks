<?php

namespace Taskapp\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Taskapp\Http\Controllers\Controller;
use Taskapp\Http\Requests\Category\CreateRequest;
use Taskapp\Http\Requests\Category\UpdateRequest;
use Taskapp\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $header = ['route' => 'categories.store', 'method' => 'POST'];

        $data = [
            'title'  =>  'Crear Nueva Categoría',
            'button' =>  'Agregar'
        ];

        return view('categories.create_or_edit')->with('header', $header)->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $category = new Category();
        $category->create($request->all());

        session()->flash('message', [
            'alert' => 'success',
            'text' => 'Categoría creada correctamente'
        ]);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        if (is_null($category)) {
            return redirect()->route('categories.index');
        }

        return view('tasks.tasks')->with('category_id', $category->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if (is_null($category)) return redirect()->route('categories.index');

        $header = ['route' => ['categories.update', $category->id], 'method' => 'PUT'];

        $data = [
            'title'  =>  'Editando Categoría',
            'button' =>  'Actualizar'
        ];

        return view('categories.create_or_edit')->with('data', $data)
            ->with('category', $category)->with('header', $header);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $category = Category::find($id);
        if (is_null($category)) return redirect()->route('categories.index');

        $category->fill($request->all());
        $category->save();

        session()->flash('message', [
            'alert' => 'success',
            'text' => '¡Bien! categoría editada correctamente.'
        ]);

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $category = Category::find($id);
            if (!is_null($category)) {
                $category->delete();
                return response()->json([
                    'response' => true,
                    'id' => $category->id,
                    'message' => 'Categoría eliminada correctamente',
                ]);
            }
            return response()->json([
                'response' => false,
                'message' => 'Ha ocurrido un error, intente de nuevo.',
            ]);
        }
    }
}

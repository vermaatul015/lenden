<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Labour;
use Illuminate\Support\Facades\Storage;
use Session;

class LabourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $labours = Labour::where('name', 'LIKE', "%$keyword%")
                ->orWhere('is_active', 'LIKE', "%$keyword%")
                ->sortable()->paginate($perPage);
        } else {
            $labours = Labour::sortable()->paginate($perPage);
        }
        $data['page'] = 'Labour';
        $data['labours'] = $labours;
        
        $data['add_new'] = route('labours.create');
        return view('labours.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['page'] = 'Labour';
        $data['action'] = trans('setup.create_module',['module'=>'Labour']);
        $data['model_url'] = route('labours.index');
        return view('labours.create')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required|max:150',
			'is_active' => 'required'
		]);
        $requestData = $request->all();
        
        
        $createData = [];
        $createData['name'] = $requestData['name'];
        $createData['is_active'] = $requestData['is_active'];
        $createData['user_id'] = \Auth::user()->id;

        Labour::create($createData);

        return \Redirect::route('labours.index')->with('flash-success', trans('setup.module_added',['module'=>'Labour']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $labours = Labour::findOrFail($id);
        $data['page'] = 'Labour';
        $data['labours'] = $labours;
        $data['action'] = trans('setup.show_module',['module'=>'Labour']);
        $data['model_url'] = route('labours.index');
        return view('labours.show')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $labours = Labour::findOrFail($id);
        $data['page'] = 'Labour';
        $data['labours'] = $labours;
        $data['action'] = trans('setup.update_module',['module'=>'Labour']);
        $data['model_url'] = route('labours.index');
        return view('labours.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required|max:150',
			'is_active' => 'required'
		]);
        $requestData = $request->all();
        $labours = Labour::findOrFail($id);
        
        
        $createData = [];
        $createData['name'] = $requestData['name'];
        $createData['is_active'] = $requestData['is_active'];

        $labours->update($createData);

        return \Redirect::route('labours.index')->with('flash-success', trans('setup.module_updated',['module'=>'Labour']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Labour::destroy($id);

        return \Redirect::route('labours.index')->with('flash-success',  trans('setup.module_deleted',['module'=>'Labour']));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
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
            $clients = Client::where('name', 'LIKE', "%$keyword%")
                ->orWhere('is_active', 'LIKE', "%$keyword%")
                ->sortable()->paginate($perPage);
        } else {
            $clients = Client::sortable()->paginate($perPage);
        }
        $data['page'] = 'Client';
        $data['clients'] = $clients;
        $data['add_new'] = route('clients.create');
        return view('clients.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['page'] = 'Client';
        $data['action'] = trans('setup.create_module',['module'=>'Client']);
        $data['model_url'] = route('clients.index');
        return view('clients.create')->with('data',$data);
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

        Client::create($createData);

        return \Redirect::route('clients.index')->with('flash-success', trans('setup.module_added',['module'=>'Client']));
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
        $client = Client::findOrFail($id);
        $data['page'] = 'Client';
        $data['client'] = $client;
        $data['action'] = trans('setup.show_module',['module'=>'Client']);
        $data['model_url'] = route('clients.index');
        return view('clients.show')->with('data',$data);
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
        $client = Client::findOrFail($id);
        $data['page'] = 'Client';
        $data['client'] = $client;
        $data['action'] = trans('setup.update_module',['module'=>'Client']);
        $data['model_url'] = route('clients.index');
        return view('clients.edit')->with('data',$data);
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
        $client = Client::findOrFail($id);
        
        
        $createData = [];
        $createData['name'] = $requestData['name'];
$createData['is_active'] = $requestData['is_active'];

        $client->update($createData);

        return \Redirect::route('clients.index')->with('flash-success', trans('setup.module_updated',['module'=>'Client']));
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
        Client::destroy($id);

        return \Redirect::route('clients.index')->with('flash-success',  trans('setup.module_deleted',['module'=>'Client']));
    }
}

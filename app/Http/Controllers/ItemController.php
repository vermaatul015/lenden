<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Client;
use App\Models\ClientItem;
use Illuminate\Support\Facades\Storage;
use Session;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search') ?? '';
        $client = $request->get('client') ?? '';
        $perPage = 25;
        $items = ClientItem::where('user_id',\Auth::user()->id);
        if (!empty($keyword)) {
            $items = $items->where('rate', 'LIKE', "%$keyword%")
                ->orWhere('nos', 'LIKE', "%$keyword%")
                ->orWhere('size', 'LIKE', "%$keyword%");
        }
        if (!empty($client)) {
            $items = $items->where('client_id',"$client");
        }
        $items = $items->sortable()->paginate($perPage);
        
        $data['page'] = 'Item';
        $data['items'] = $items;
        $data['clients'] = ClientItem::select('client_id')->distinct()->where('user_id',\Auth::user()->id)->get();
        $data['add_new'] = route('items.create');
        return view('items.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['page'] = 'Item';
        $data['action'] = trans('setup.create_module',['module'=>'Item']);
        $data['clients'] = Client::where('user_id',\Auth::user()->id)->get();
        $data['model_url'] = route('items.index');
        return view('items.create')->with('data',$data);
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
			'client_id' => 'required',
			'rate' => 'required',
			'nos' => 'required',
			'size' => 'required'
		]);
        $requestData = $request->all();
        
        
        $createData = [];
        $createData['client_id'] = $requestData['client_id'];
        $createData['rate'] = $requestData['rate'];
        $createData['nos'] = $requestData['nos'];
        $createData['size'] = $requestData['size'];
        $createData['user_id'] = \Auth::user()->id;

        ClientItem::create($createData);

        return \Redirect::route('items.index')->with('flash-success', trans('setup.module_added',['module'=>'Item']));
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
        $items = ClientItem::findOrFail($id);
        $data['page'] = 'Item';
        $data['items'] = $items;
        $data['action'] = trans('setup.show_module',['module'=>'Item']);
        $data['model_url'] = route('items.index');
        return view('items.show')->with('data',$data);
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
        $items = ClientItem::findOrFail($id);
        $data['page'] = 'Item';
        $data['items'] = $items;
        $data['action'] = trans('setup.update_module',['module'=>'Item']);
        $data['model_url'] = route('items.index');
        $data['clients'] = Client::where('user_id',\Auth::user()->id)->get();
        return view('items.edit')->with('data',$data);
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
			'client_id' => 'required',
			'rate' => 'required',
			'nos' => 'required',
			'size' => 'required'
		]);
        $requestData = $request->all();
        $items = ClientItem::findOrFail($id);
        
        
        $createData = [];
        $createData['client_id'] = $requestData['client_id'];
        $createData['rate'] = $requestData['rate'];
        $createData['nos'] = $requestData['nos'];
        $createData['size'] = $requestData['size'];

        $items->update($createData);

        return \Redirect::route('items.index')->with('flash-success', trans('setup.module_updated',['module'=>'Item']));
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
        ClientItem::destroy($id);

        return \Redirect::route('items.index')->with('flash-success',  trans('setup.module_deleted',['module'=>'Item']));
    }
}

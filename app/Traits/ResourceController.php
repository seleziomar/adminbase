<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

trait ResourceController{

    protected $model;
    protected $columns;
    protected $route;
    protected $label;
    protected $rules = [];
    protected $obj = null;

    public function index()
    {
        $layout = $this->getLayout();

        return view('admin.resource.index', $layout);
    }

    public function create()
    {
        $layout = array_merge(
            $this->getLayout([
                'method' => 'create',
            ]),
            [
                'fields' => $this->model->getFields()
            ]
        );
        return view('resources.create', $layout);
    }

    public function store()
    {
        $data = $this->getData();

        try{
            $this->model->create($data);
        }catch(\Exception $e){
            return redirect()->back()->withInput()->withErrors(['msg' => $e->getMessage()]);
        }

        return redirect()->route($this->route . '.index')->with('success', 'Dados inseridos com sucesso!');
    }

    public function edit($id)
    {
        $item = $this->model->findOrFail($id);

        $fields = [];

        foreach($this->model->getFields() as $key => $field){

            $fields[$key] = $field;

            if($field['name'] === 'password') continue;

            $value = data_get($item, $field['name'], null);
            $fields[$key]['value'] = $value;

        }

        $layout = array_merge(
            $this->getLayout([
                'item' => $item,
                'method' => 'edit'
            ]),
            [
                'fields' => $fields
            ]
        );

        return view('resources.create', $layout);
    }

    public function update($id)
    {
        $data = $this->getData();

        try{
            $item = $this->model->find($id);
            $item->update($data);
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }

        return redirect()->route($this->route . '.index')->with('success', 'Dados atualizados com sucesso!');

    }

    public function destroy()
    {

    }

    protected function getLayout($extra = [])
    {
        return array_merge(
            [
                'list' => $this->model->get(),
                'columns' => $this->getColumns(),
                'route' => $this->route,
                'label' => $this->label,
            ],
            $extra
        );
    }

    protected function getData(){

        $validation = $this->model->getValidation();
        $columns = array_column($this->model->getFields(), 'name');
        $rules = $validation['rules'];

        if(in_array('password', $columns)){
            if(Route::is($this->route . '.store')){
                $rules['password'] = 'required|min:8|string';
            }else{
                $rules['password'] = 'nullable|min:8|string';
            }

        }

        request()->validate($rules, $validation['messages']);
        $data = request()->only($columns);

        foreach($this->model->getFields() as $col){
            if($col['type'] === 'checkbox'){
                $data[$col['name']] = request($col['name']) ? 1 : 0;
            }
            if(isset($col['is_date']) && $col['is_date']){
                $dt = str_replace('/', '-', $data[$col['name']]);
                $data[$col['name']] = date('Y-m-d', strtotime($dt));
            }
            if(isset($col['only_number']) && $col['only_number']){
                $data[$col['name']] = preg_replace("/[^0-9]/", "", $data[$col['name']]);
            }
        }

        if(isset($data['password']) && strlen($data['password'] > 0)){
            $data['password'] = Hash::make($data['password']);
        }else{
            unset($data['password']);
        }

        return $data;
    }

}

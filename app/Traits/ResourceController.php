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

    public function index()
    {
        $layout = $this->getLayout();

        return view('admin.resource.index', $layout);
    }

    public function create()
    {
        $layout = array_merge(
            $this->getLayout(),
            [
                'fields' => $this->getFields()
            ]
        );
        return view('admin.resource.create', $layout);
    }

    public function store()
    {
        $data = $this->getData();

        try{
            $this->model->create($data);
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }

        return redirect()->route($this->route . '.index')->with('success', 'Dados inseridos com sucesso!');
    }

    public function edit($id)
    {
        $item = $this->model->find($id);

        $fields = [];

        foreach($this->getFields() as $key => $field){

            $fields[$key] = $field;
            if(isset($item[$field['name']]) && $field['name'] != 'password'){
                $fields[$key]['value'] = $item[$field['name']];
            }

        }

        $layout = array_merge(
            $this->getLayout([
                'item' => $item
            ]),
            [
                'fields' => $fields
            ]
        );
        return view('admin.resource.create', $layout);
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
                'label' => $this->label
            ],
            $extra
        );
    }

    protected function getData(){

        $validation = $this->getValidation();
        $columns = array_column($this->getFields(), 'name');
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

        foreach($this->getFields() as $col){
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

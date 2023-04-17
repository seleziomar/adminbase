<?php

namespace App\Traits;

trait ResourceController{

    protected $model;
    protected $columns;
    protected $route;
    protected $label;

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

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }

    protected function getLayout()
    {
        return [
            'list' => $this->model->get(),
            'columns' => $this->getColumns(),
            'route' => $this->route,
            'label' => $this->label
        ];
    }

}

<?php

namespace App\Painel;

class Input {

    public static $name;
    public $label;
    public $placeholder = '';
    public $type = 'text';
    public $mask = null;
    public $value = null;
    public $options = null;
    public $only_number = false;
    public $is_date = false;
    public $only_read_create = false;
    public $only_read_edit = false;

    public static function name($name)
    {
        self::$name = $name;
        return new static();
    }

    public function label($label)
    {
        $this->label = $label;
        return $this;
    }

    public function value($value)
    {
        $this->value = $value;
        return $this;
    }

    public function placeholder($placeholder)
    {
        $this->placeholder = $placeholder;
        return $this;
    }

    public function mask($mask)
    {
        $this->mask = $mask;
        return $this;
    }

    public function options($options)
    {
        $this->options = $options;
        return $this;
    }

    public function only_number()
    {
        $this->only_number = true;
        return $this;
    }

    public function is_date()
    {
        $this->is_date = true;
        return $this;
    }

    public function readonly($on = 'both')
    {
        if($on == 'create') $this->only_read_create = true;
        if($on == 'edit') $this->only_read_edit = true;
        if($on == 'both'){
            $this->only_read_edit = true;
            $this->only_read_create = true;
        }

        return $this;
    }

    public function text($type = 'text')
    {
        $this->type = $type;
        $data = $this->getData();
        $this->reset();
        return $data;
    }

    public function checkbox()
    {
        $this->type = 'checkbox';
        $data = $this->getData();
        $this->reset();
        return $data;
    }

    public function select($data = [])
    {
        $this->type = 'select';
        $this->options = $data;
        $data = $this->getData();
        $this->reset();
        return $data;
    }

    public function divisor()
    {
        $this->type = 'label';
        $data = $this->getData();
        $this->reset();
        return $data;
    }


    public static function render($data)
    {
        $field = ['field' => $data];
        if(in_array($data['type'], ['text', 'number', 'password', 'email'])) return view('inputs.text', $field)->render();

        return view('inputs.' . $data['type'], $field)->render();
    }

    public function getName()
    {
        return self::$name;
    }

    public function getData()
    {
        $data =  [
            'name' => self::$name,
            'label' => $this->label,
            'type' => $this->type,
            'input_mask' => $this->mask,
            'placeholder' => $this->placeholder,
            'value' => $this->value,
            'data' => [],
            'only_number' => $this->only_number,
            'is_date' => $this->is_date,
            'only_read_create' => $this->only_read_create,
            'only_read_edit' => $this->only_read_edit
        ];

        if($this->options) $data['data'] = $this->options;

        return $data;
    }

    public function reset()
    {
        self::$name = null;
        $this->label = null;
        $this->type = 'text';
        $this->mask = null;
        $this->placeholder = '';
        $this->value = null;
        $this->options = null;
        $this->only_number = false;
        $this->is_date = false;
        $this->only_read_create = false;
        $this->only_read_edit = false;
    }


}

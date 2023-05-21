@extends('admin.templates.default')

@section('content')

<!-- Header -->
<div class="header">
    <div class="header-body">
        <div class="row align-items-center">
            <div class="col">

                <!-- Pretitle -->
                <h6 class="header-pretitle">
                    Cadastrar
                </h6>

                <!-- Title -->
                <h1 class="header-title">
                    {{ $label }}
                </h1>

            </div>
        </div> <!-- / .row -->

      </div>
    </div>
</div>

<div class="card">
    <div class="card-body">

        @include('admin.components.flash_messages')

        @if(!isset($item))
        <form method="POST" action="{{ route($route . '.store') }}">
        @elseif(isset($item))
        <form method="POST" action="{{ route($route . '.update', $item->id) }}">
            @method('put')
        @endif
            @csrf
        @foreach ($fields as $field)

            @if($field['type'] == 'text' || $field['type'] == 'number' || $field['type'] == 'password' || $field['type'] == 'email' )
                @include('admin.components.inputs.text', ['field' => $field])
            @elseif ($field['type'] === 'select')
                @include('admin.components.inputs.select', ['field' => $field])
            @elseif ($field['type'] === 'checkbox')
                @include('admin.components.inputs.checkbox', ['field' => $field])
            @endif

        @endforeach
            <button class="btn btn-primary">
                Salvar
            </button>
        </form>
    </div>
</div>

@endsection

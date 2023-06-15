@extends('templates.default')

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

        @include('components.flash_messages')

        @if(!isset($item))
        <form method="POST" action="{{ route($route . '.store') }}">
        @elseif(isset($item))
        <form method="POST" action="{{ route($route . '.update', $item->id) }}">
            @method('put')
        @endif
            @csrf
        @foreach ($fields as $field)
            @php($field['method'] = $method)
            {!! \App\Painel\Input::render($field) !!}

        @endforeach
            <button class="btn btn-primary">
                Salvar
            </button>
        </form>
    </div>
</div>

@endsection

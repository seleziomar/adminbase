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
        <form method="POST" action="{{ route($route . '.store') }}">
            @csrf
        @foreach ($fields as $field)

            @if($field['type'] == 'text')
                @include('admin.components.inputs.text', ['field' => $field])
            @endif

        @endforeach
            <button class="btn btn-primary">
                Salvar
            </button>
        </form>
    </div>
</div>

@endsection

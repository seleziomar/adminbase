@extends('admin.templates.default')

@section('content')

<!-- Header -->
<div class="header">
    <div class="header-body">
        <div class="row align-items-center">
            <div class="col">

                <!-- Pretitle -->
                <h6 class="header-pretitle">
                    Listagem de
                </h6>

                <!-- Title -->
                <h1 class="header-title">
                    {{ $label }}
                </h1>

                </div>
                <div class="col-auto">

                <!-- Button -->
                <a href="{{ route($route . '.create') }}" class="btn btn-primary lift">
                    Cadastrar {{ $label }}
                </a>

            </div>
        </div> <!-- / .row -->

      </div>
    </div>
</div>

<div class="card">
    <div class="card-header">

    </div>
    <div class="table-responsive">
        <table class="table table-sm table-nowrap card-table">
          <thead>
            <tr>
                @foreach ($columns as $column)
                    <th>
                        <a href="#" class="text-muted list-sort" data-sort="orders-order">
                            {{ $column['label'] }}
                        </a>
                    </th>
                @endforeach
            </tr>
          </thead>
            <tbody class="list">

                @foreach ($list as $li)
                    <tr>
                        @foreach ($columns as $column)
                            <td>{{ $li[$column['name']] }}</td>
                        @endforeach
                        <td class="text-end">
                                <a href="{{ route($route . '.edit', $li->id) }}" class="btn btn-sm btn-light">
                                    <i class="fe fe-edit"></i>
                                </a>
                                <a href="{{ route($route . '.destroy', $li->id) }}" class="btn btn-sm btn-danger">
                                    <i class="fe fe-trash"></i>
                                </a>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection

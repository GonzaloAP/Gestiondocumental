@extends('layouts.adminU')

@section('contenido')
    <div class="container">
        <div class="row">
           

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Workflowusuario</div>
                    <div class="panel-body">
                        <a href="{{ url('/workflow-usuario/create') }}" class="btn btn-success btn-sm" title="Add New WorkflowUsuario">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('UsuarioG') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Descripcion</th><th>Fecha</th><th>Id Institucion</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($workflowusuario as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->descripcion }}</td><td>{{ $item->fecha }}</td><td>{{ $item->id_institucion }}</td>
                                        <td>
                                            <a href="{{ url('/workflow-usuario/' . $item->id) }}" title="View WorkflowUsuario"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/workflow-usuario/' . $item->id . '/edit') }}" title="Edit WorkflowUsuario"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('UsuarioG' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete WorkflowUsuario" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $workflowusuario->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.adminU')

@section('contenido')
    <div class="container">
        <div class="row">
           

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Privilegio</div>
                    <div class="panel-body">

                        <?php
                        error_reporting(E_ALL and E_NOTICE);
                        session_start();
                        $a=$_SESSION['privbotones'];?>

                        @foreach($a as $aa)
                            @if($aa->id == 28 and $aa->i == 1)
                        <a href="{{ url('/privilegio/create') }}" class="btn btn-success btn-sm" title="Add New Privilegio">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                                @endif
                            @endforeach

                        <form method="GET" action="{{ url('/privilegio') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
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
                                        <th>#</th><th>Descripcion</th><th>Id Institucion</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($privilegio as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->descripcion }}</td><td>{{ $item->id_institucion }}</td>
                                        <td>
                                            <a href="{{ url('/privilegio/' . $item->id) }}" title="View Privilegio"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/privilegio/' . $item->id . '/edit') }}" title="Edit Privilegio"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/privilegio' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Privilegio" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $privilegio->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

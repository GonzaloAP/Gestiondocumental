@extends('layouts.adminU')

@section('contenido')
    <div class="container">
        <div class="row">
           

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New WorkflowUsuario</div>
                    <div class="panel-body">
                        <a href="{{ url('UsuarioG') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/workflow-usuario') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('GestionDocumental.AsignarWorkflow.form')

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('content')



<div class="container adminpanel myprofile">
    <div class="row">
        <div class="col-xs-12">



            <div class="panel panel-default">
                <div class="panel-header">
                    <h1>Profilo</h1>
                </div>
                <div class="panel-body">

                    @if($errore === 'false')
                        <div class="alert alert-success">
                            Profilo aggiornato con successo!
                        </div>

                        <script>
                            window.setTimeout(function() {
                                window.location.href = '/profilo';
                            }, 5000);
                        </script>
                    @endif

                    {!! Form::open(['route' => 'admin.profilo', 'method' => 'get', 'class' => 'form-horizontal']) !!}

                    <div class="form-group">
                        {{ Form::label('nome', 'Nome', ['class' => 'control-label']) }}
                        {{ Form::text('nome', $info['nome'], array_merge(['class' => 'form-control'])) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('email', 'Email', ['class' => 'control-label']) }}
                        {{ Form::email('email', $info['email'], array_merge(['class' => 'form-control'])) }}
                    </div>

                    <br><br>

                    <div class="form-group @if($errore === 'noncoincidono') has-error @endif">
                        {{ Form::label('newpass', 'Nuova Password (lascia vuoto per non modificare)', ['class' => 'control-label']) }}
                        {{ Form::password('newpass', ['class' => 'form-control']) }}
                        @if($errore === 'noncoincidono')
                            <span class="help-block"><strong>La password inserite non cincidono</strong></span>
                        @endif


                    </div>

                    <div class="form-group @if($errore === 'noncoincidono') has-error @endif">
                        {{ Form::label('confermapass', 'Conferma Password (lascia vuoto per non modificare)', ['class' => 'control-label']) }}
                        {{ Form::password('confermapass', ['class' => 'form-control']) }}
                        @if($errore === 'noncoincidono')
                            <span class="help-block"><strong>La password inserite non cincidono</strong></span>
                        @endif
                    </div>

                    <br><br>

                    <div class="form-group @if($errore === 'errata') has-error @endif">
                        {{ Form::label('oldpass', 'Password attuale (obbligatoria)', ['class' => 'control-label']) }}
                        {{ Form::password('oldpass', ['class' => 'form-control', 'required' ]) }}
                        @if($errore === 'errata')
                            <span class="help-block"><strong>La password inserita non è corretta</strong></span>
                        @endif
                    </div>

                    {{ Form::submit('Modifica', array('class' => 'btn btn-primary')) }}

                    {!! Form::close() !!}

                </div>
            </div>

        </div>
    </div>
</div>
@endsection

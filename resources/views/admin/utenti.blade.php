@extends('layouts.admin')

@section('content')



<div class="container adminpanel">
    <div class="row">
        <div class="col-xs-12">

            @if($update === 'true')
                <div class="alert alert-success">
                    Ruolo aggiornato con successo!
                </div>

                <script>
                    window.setTimeout(function() {
                        window.location.href = '/utenti';
                    }, 7000);
                </script>
            @endif


            <div class="panel panel-default">
                <table class="table table-responsive table-hover tabella-utenti">
                    <tr>
                        <th>NOME</th>
                        <th>EMAIL</th>
                        <th>RUOLO</th>
                    </tr>
                    @foreach ($data as $utente)

                        <tr id="{{ $utente['id'] }}">

                            <td>{{ $utente['nome'] }}</td>
                            <td>{{ $utente['email'] }}</td>
                            <td>

                                {!! Form::open(['route' => 'admin.utenti', 'method' => 'get', 'class' => 'form-horizontal']) !!}

                                {{ Form::hidden('userid', $utente['id']) }}

                                {!! Form::select('ruolo', [
                                    'in_attesa' => 'Da definire',
                                    'admin' => 'Admin',
                                    'torneo' => 'Torneo',
                                    'associazione' => 'Associazione',
                                    'festival' => 'Festival',
                                    'trk' => 'TRK'],
                                    $utente['ruolo'], array('class' => 'form-control'))
                                !!}

                                {{ Form::submit('Salva', array('class' => 'btn btn-primary')) }}

                                {!! Form::close() !!}

                            </td>

                        </tr>

                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('content')

<div class="container adminpanel">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <table class="table table-responsive table-hover">
                    <tr>
                        <th></th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ruolo</th>
                        <th></th>
                    </tr>
                    @foreach ($data as $utente)

                        <tr id="{{ $utente['id'] }}">
                            {!! Form::open(['action' => ['UtentiController@cambiaRuolo', 'method' => 'get', 'prova=ciao']]) !!}

                                <td>{{ $utente['nome'] }}</td>
                                <td>{{ $utente['email'] }}</td>
                                <td>
                                    {!! Form::select('ruolo', [
                                        'in_attesa' => 'Da definire',
                                        'admin' => 'Admin',
                                        'torneo' => 'Torneo',
                                        'associazione' => 'Associazione',
                                        'festival' => 'Festival',
                                        'trk' => 'TRK'],
                                        $utente['ruolo'])
                                    !!}
                                </td>
                                <td>
                                    {{ Form::submit('Salva', array('class' => 'btn btn-primary')) }}

                                </td>
                            {!! Form::close() !!}
                        </tr>

                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

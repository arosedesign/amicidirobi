@extends('layouts.admin')

@section('content')



<div class="container adminpanel festival">
    <div class="row">
        <div class="col-xs-12">

            @if($update === 'true')
                <div class="alert alert-success">
                    Modifica effettuata con successo!
                </div>

                <script>
                    window.setTimeout(function() {
                        window.location.href = '/festival';
                    }, 5000);
                </script>
            @elseif($update === 'false')
                <div class="alert alert-danger">
                    Attenzione! Non è stato possibile effettuare la modifica
                </div>

                <script>
                    window.setTimeout(function() {
                        window.location.href = '/festival';
                    }, 5000);
                </script>
            @endif


            <div class="panel panel-default">
                <div class="panel-header">
                    <h1>Tanta Robba Free Music Festival editor</h1>
                </div>
                <div class="panel-body">

                    <table class="table table-responsive table-hover tabella-modifica">

                        @foreach( $data as $campo)
                            <tr>
                                <td class="titolo"><h2>{{ $campo['campo'] }}</h2></td>
                                <td class="valore">
                                    <div class="contenuto">
                                        @if ( $campo['tipo'] === 'immagine' && !empty($campo['valore']))
                                            <img src="{{asset('uploads/' . $campo['valore'] )}}" >
                                        @elseif ( $campo['tipo'] === 'testo')
                                            <p>{!! $campo['valore']  !!}</p>
                                        @endif
                                    </div>
                                    {!! Form::open(['action' => 'FestivalController@PulisciValore', 'method' => 'post', 'class' => 'cancella form-horizontal']) !!}
                                    {{ Form::hidden('numero', $campo['id'] ) }}
                                    {{ Form::button('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
                                    {!! Form::close() !!}

                                </td>
                                <td class="modifica">
                                    <h4>MODIFICA:</h4>
                                    @if ( $campo['tipo'] === 'immagine')

                                        {!! Form::open(['action' => 'FestivalController@UpdateImg', 'method' => 'post', 'files' => true, 'class' => 'form-horizontal']) !!}
                                        {{ Form::hidden('nome', $campo['campo'] ) }}
                                        {{Form::file('immagine',['class' => 'btn btn-info'])}}
                                        {{ Form::submit('Salva', array('class' => 'salva btn btn-primary')) }}
                                        {!! Form::close() !!}

                                    @elseif ( $campo['tipo'] === 'testo')
                                        {!! Form::open(['action' => 'FestivalController@UpdateTesto', 'method' => 'post', 'class' => 'form-horizontal']) !!}
                                        {{ Form::hidden('nome', $campo['campo'] ) }}
                                        {{Form::textarea('testo',$campo['valore'],array('class' => 'form-control summernote', 'id' => 'prova'))}}
                                        {{ Form::submit('Salva', array('class' => 'salva btn btn-primary')) }}
                                        {!! Form::close() !!}
                                    @endif
                                </td>

                            </tr>

                        @endforeach


                    </table>


                 </div>
            </div>

        </div>
    </div>
</div>
@endsection

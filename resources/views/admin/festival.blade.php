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
                    }, 7000);
                </script>
            @elseif($update === 'error')
                <div class="alert alert-danger">
                    {{ $errore }}
                </div>

                <script>
                    window.setTimeout(function() {
                        window.location.href = '/festival';
                    }, 7000);
                </script>
            @endif

            @if(!empty($esito))

                @if($esito['successi'] != 0 && $esito['successi'] != 1 )
                    <div class="alert alert-success">
                        {{ $esito['successi'] }} elementi caricati con successo!
                     </div>
                @elseif($esito['successi'] === 1)
                    <div class="alert alert-success">
                        {{ $esito['successi'] }} elemento caricato con successo!
                    </div>
                @endif

                @foreach( $esito['img'] as $key)

                     @if($key['upload'] === false)
                         <div class="alert alert-danger">
                             Non è stato possibile caricare {{ $key['nome'] }}.<br>
                            {{ $key['errore'] }}
                        </div>
                    @endif

                @endforeach

                <script>
                    window.setTimeout(function() {
                        window.location.href = '/festival';
                    }, 15000);
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
                                            <img src="{{asset('uploads/thumb/' . $campo['valore'] )}}" >
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
                                        {{Form::file('immagine[]',['class' => 'btn btn-info'])}}
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

                        <tr>
                            <td class="titolo"><h2>Homepage gallery</h2></td>
                            <td class="valore">
                                @foreach( $gallery as $img)
                                    <div class="gal-thumb" id="{{$img['id']}}">
                                        <img src="{{asset('uploads/thumb/' . $img['valore'] )}}" >
                                        <div class="remove-galimg">
                                            {!! Form::open(['action' => 'FestivalController@CancellaImgDaGal', 'method' => 'post', 'class' => 'cancella form-horizontal']) !!}
                                            {{ Form::hidden('numero', $img['id'] ) }}
                                            {{ Form::hidden('img', $img['valore'] ) }}
                                            {{ Form::button('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                @endforeach
                            </td>
                            <td class="modifica">
                                {!! Form::open(['action' => 'FestivalController@UpdateGallery', 'method' => 'post', 'files' => true, 'class' => 'uploadgallery form-horizontal']) !!}
                                {{ Form::hidden('nome', 'homepage' ) }}
                                {{Form::file('immagine[]',['id' => 'homepage', 'class' => 'inputfile', 'multiple' => true])}}
                                {!! Html::decode(Form::label('homepage','<figure><svg xmlns="http://www.w3.org/2000/svg" height="34" viewBox="0 0 20 17" width="40"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span>Aggiungi</span>', array('class' => 'labelupload'))) !!}
                                {{ Form::submit('Salva', array('class' => 'salva btn btn-primary')) }}
                                {!! Form::close() !!}
                            </td>

                        </tr>


                    </table>


                 </div>
            </div>

        </div>
    </div>
</div>
@endsection

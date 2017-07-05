@extends('layouts.admin')

@section('content')

<div class="container adminpanel homeadmin">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="box_link">
                        <a href="/utenti">Utenti</a>
                    </div>
                    <div class="box_link">
                        <a href="/">Torneo</a>
                    </div>
                    <div class="box_link">
                        <a href="/festival">Festival</a>
                    </div>
                    <div class="box_link">
                        <a href="/">TRK</a>
                    </div>
                    <div class="box_link">
                        <a href="/">Associazione</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

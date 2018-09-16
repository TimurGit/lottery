@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Лоттерея</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>

                    @endif
                    <p>
                        <button class="btn btn-primary get-prize">
                            Получить приз
                        </button>
                    </p>
                    <p class="prize-info">

                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

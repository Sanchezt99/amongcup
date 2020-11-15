@extends('layouts.app')

@section('content')

<div class="container align-items-center justify-content-center">

    <div class="card crb">
        <div class="card-body text-center">
            <div class="row">
                <div class="col-sm">
                    <a type="button btn" class="btn btn-outline-success" href="{{ route('hall.show', ['id'=>1]) }}">THE SKELD</a>
                </div>
                <div class="col-sm">
                    <a type="button btn" class="btn btn-outline-success" href="{{ route('hall.show', ['id'=>2]) }}">MIRA HQ</a>
                </div>
                <div class="col-sm">
                    <a type="button btn" class="btn btn-outline-success" href="{{ route('hall.show', ['id'=>3]) }}">OPOLUS</a>
                </div>
                <div class="col-sm">
                    <a type="button btn" class="btn btn-outline-success" href="{{ route('hall.show', ['id'=>4]) }}">FUNADO</a>
                </div>
            </div>
            <div class="row mt-lg-3">
                <div class="col-sm">
                    <a type="button btn" class="btn btn-outline-success" href="{{ route('leaderboard.show') }}">LEADER BOARD</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

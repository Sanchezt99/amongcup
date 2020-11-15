@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card crbF">

        @isset($data['participants'])
        
        <div class="card-body text-center noP">
            <label class="in"> LEADERBOARD </label>
            
            <div class="card-header noP">
                <div class="row">
                    <div class="col-sm noP">
                        <p> NAME </p>
                    </div>
                    <div class="col-sm noP">
                        <p> POINTS </p>
                    </div>
                </div>
            </div>
            @foreach ($data['participants'] as $participant)

            <div class="row">
                <div class="col-sm noP">
                    <p> {{ $participant->getName() }} </p>
                </div>
                <div class="col-sm noP">
                    <p> {{ $participant->getPoints() }} </p>
                </div>
            </div>
            @endforeach

        </div>
        @endisset
    </div>
</div>


@endsection

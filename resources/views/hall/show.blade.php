@extends('layouts.app')

@section('content')

<div class="container">

    @isset($data['name'], $data['hall'], $data['crew'])

    <div class="card crbF">

        <div class="card-body text-center">

            <label> {{ $data['name'] }} </label>

            <form method="post" action="{{ route('hall.update') }}">
                @csrf

                <input type="hidden" name="hall_id" id="hall_id" value={{ $data['hall'] }}>

                <input type="number" class="form-control in" id="crewmates" placeholder="Remaining crewmates" min="2" name="remainingcrewmates">

                <div class="form-row">
                    <div class="form-group in col-md-4">
                        <select id="impostor1" class="form-control" name="impostor1">
                            <option selected disabled>Impostor 1</option>
                            @foreach ($data['crew'] as $crewmate)
                                <option value="{{ $crewmate->getId()}}">{{ $crewmate->getName() }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group in col-md-4">
                        <select id="impostor2" class="form-control" name="impostor2">
                            <option selected disabled>Impostor 2</option>
                            @foreach ($data['crew'] as $crewmate)
                                <option value="{{ $crewmate->getId()}}">{{ $crewmate->getName() }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <fieldset class="form-group">
                    <div class="row">
                        <div class="col-sm-10 in">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="wintype" id="gridRadios2"
                                    value="1" checked>
                                <label class="form-check-label" for="gridRadios2">
                                    Normal
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="wintype" id="gridRadios2"
                                    value="2">
                                <label class="form-check-label" for="gridRadios2">
                                    Tasks win
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="wintype" id="gridRadios1"
                                    value="3">
                                <label class="form-check-label" for="gridRadios1">
                                    Sabotage win
                                </label>
                            </div>    
                        </div>
                    </div>
                </fieldset>

                <input type="password" class="form-control in" id="password" placeholder="Password" name="password">
                <button type="submit" class="btn btn-primary in">Next match</button>
            </form>

        </div>

    </div>


    <div class="card crbF">
        <div class="card-body text-center noP">

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

            @foreach ($data['crew'] as $crewmate)
            <div class="row">
                <div class="col-sm noP">
                    <p> {{ $crewmate->getName() }} </p>
                </div>
                <div class="col-sm noP">
                    <p> {{ $crewmate->getPoints() }} </p>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <div class="card crbF">

        <div class="card-body text-center noP">

            <label> NEW CREWMATE </label>

            <form method="post" action={{ route('crew.store') }}>
                @csrf

                <input type="text" class="form-control in" name="name" placeholder="Name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input type="hidden" name="hall_id" id="hall_id" value={{ $data['hall'] }}>

                <button type="submit" class="btn btn-primary in">Add</button>
            </form>

        </div>
    </div>
    @endisset
</div>


@endsection

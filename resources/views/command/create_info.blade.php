@extends('layouts.app')
@section('title') Ստեղծել հրաման @endsection
@section('content')
    <form action="{{route('command.store_info')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="id" class="form-label">Հրամանի համար` {{ $command->number }}</label>
            <input type="text" id="id" class="form-control" readonly name="id"  value="{{ $id }}">
        </div>
        <div class="form-group">
            <label for="for_user" class="form-label">Ո՞ւմ համար է հրամանը</label>
            <input type="text" id="for_user" class="form-control" readonly name="for_user"
                   value="{{ $command->for_user }}">
        </div>
        <div class="mt-3 mb-3 row">
            <div class="col-md-3">
                <label for="first_name" class="form-label">Անուն</label>
                <input type="text" name="first_name" class="form-control" placeholder="Արսեն">
            </div>
            <div class="col-md-3">
                <label for="surname" class="form-label">Հայրանուն</label>
                <input type="text" name="surname" class="form-control" placeholder="Արսենի">
            </div>
            <div class="col-md-3">
                <label for="last_name" class="form-label">Ազգանուն</label>
                <input type="text" name="last_name" class="form-control" placeholder="Արսենյան">
            </div>
            <div class="col-md-3">
                <label for="passport_number" class="form-label">Անձը հաստատող փաստաթուղթ</label>
                <input type="text" name="passport_number" class="form-control" placeholder="AR000000">
            </div>
        </div>

        <button class="btn btn-primary" style="margin-top: 15px">Պահպանել</button>
    </form>
@endsection

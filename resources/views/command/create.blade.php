@extends('layouts.app')
@section('title') Ստեղծել հրաման @endsection
@section('content')
    <form action="{{route('command.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="number" class="form-label">Հրամանի համար</label>
            <input type="text" class="form-control" name="number" placeholder="1" value="{{ old('number') }}">
        </div>

        <div class="form-group">
            <label for="for_user" class="form-label">Ում համար է հրամանը</label>
            <select name="for_user" class="form-control">
                <option selected disabled>--Ընտրել ցանկցի--</option>
                <option value="student">Ուսանող</option>
                <option value="employee">Աշխատող</option>
            </select>
        </div>

        <div class="form-group">
            <label for="type" class="form-label">Հրամանի տեսակը</label>
            <select name="type" class="form-control">
                <option selected disabled>--Ընտրել ցանկցի--</option>
                <option value="Ընդունել Ուսանող">Ընդունել Ուսանող</option>
                <option value="Ազատել Ուսանող">Ազատել Ուսանող</option>
                <option value="Ազատել Ուսանող">Տարկետում Տրամադրել</option>
                <option value="Ազատել Ուսանող">Տարկետումից վերադարձնել</option>
                <option value="Ընդունել Աշխատակից">Ընդունել Աշխատակից</option>
                <option value="Ազատել Աշխատակից">Ազատել Աշխատակից</option>
                <option value="Ժամաբաշխվածություն">Ժամաբաշխվածություն</option>
                <option value="Արձակուրդ">Արձակուրդ</option>
                <option value="Վերադարձ Արձակուրդ">Վերադարձ Արձակուրդ</option>
                <option value="Ֆիզարձակուրդ">Ֆիզարձակուրդ</option>
                <option value="Վերադարձ ֆիզարձակուրդ">Վերադարձ Ֆիզարձակուրդ</option>
            </select>
        </div>

        <div class="form-group">
            <label for="date" class="form-label">Ամսաթիվ</label>
            <input type="date" class="form-control" name="date" value="{{ old('date') }}">
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Բովանդակություն</label>
            <textarea name="description" class="form-control" cols="30" rows="5">{{ old('description') }}</textarea>
        </div>

        <button class="btn btn-primary" style="margin-top: 15px">Պահպանել</button>
    </form>
@endsection

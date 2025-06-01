@extends('layouts.app')
@section('title') Հրամաններ @endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-haver">
                <thead>
                    <tr>
                        <th>Հրաման №</th>
                        <th>Հրամանի տեսակ</th>
                        <th>Ավելին</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commands as $command)
                        <tr>
                            <td>N-{{ $command->number }}</td>
                            <td>{{ $command->type }}</td>
                            <td>
                                <a href="{{ route('command.create_info', $command->id) }}" class="btn btn-primary btn-sm">Կցել տվյալներ / մեկ</a>
                                <a href="#" class="btn btn-warning btn-sm">Տեսնել</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>
    </div>
@endsection
{{--

    Ստեղծել հրամանը այնուհետև մտնելով հրամանի մեջ կարողանանք ստեղծել օգտվողների ովքեր պատկանում են այդ հրամանին

--}}

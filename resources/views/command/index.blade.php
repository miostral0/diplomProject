@extends('layouts.app')
@section('title', 'Հրամաններ')

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover">
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
                            <a href="{{ route('command.show', $command->id) }}" class="btn btn-secondary btn-sm ms-2">Տեսնել</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> 
    </div>
</div>
@endsection

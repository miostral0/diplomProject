@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto px-4 py-8">

    @if($commands->isEmpty())
        <p class="text-gray-600 text-lg">Չկան հրամաններ ցուցադրման համար։</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($commands as $command)
                <a href="{{ route('command.show', $command->id) }}" class="block bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-200">
                    <h2 class="text-xl font-semibold text-blue-600 mb-2">
                        Հրաման №{{ $command->number }}
                    </h2>
                    <p class="text-gray-700 font-medium mb-1">{{ $command->type }}</p>
                    <p class="text-gray-500 text-sm mb-3">{{ $command->date->format('Y-m-d') }}</p>
                    <p class="text-gray-600 line-clamp-3">{{ $command->description }}</p>
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection

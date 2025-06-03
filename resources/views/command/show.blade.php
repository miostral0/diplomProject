@extends('layouts.app')
@section('title', 'Հրամանի Մանրամասն')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white shadow-md rounded p-6 border border-gray-200">
        <h2 class="text-2xl font-bold mb-4">Հրամանի Մանրամասն</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="text-sm text-gray-600">Հրաման №:</p>
                <p class="text-lg font-semibold">N-{{ $command->number }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-600">Տեսակ:</p>
                <p class="text-lg font-semibold">{{ $command->type }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-600">Ամսաթիվ:</p>
                <p class="text-lg font-semibold">{{ $command->date }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-600">Նկարագրություն:</p>
                <p class="text-lg font-semibold">{{ $command->description }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-600">Ստեղծող օգտատեր:</p>
                <p class="text-lg font-semibold">{{ $command->user->name ?? '—' }}</p>
            </div>
        </div>

        {{-- Students --}}
        @if ($command->for_user === 'student' && $command->students->count())
            <div class="mt-8">
                <h3 class="text-xl font-semibold mb-2">Ուսանողներ ({{ $command->students->count() }})</h3>
                <ul class="list-disc list-inside text-gray-700">
                    @foreach ($command->students as $student)
                        <li class="mb-2 flex justify-between items-center">
                            <div>
                                {{ $student->last_name }} {{ $student->first_name }} {{ $student->surname }}
                                <br>
                                <span class="text-sm text-gray-500">
                                    Անձը հաստատող փաստաթուղթ՝ {{ $student->passport_number ?? '—' }}
                                </span><br>
                                <span class="text-sm text-gray-500">
                                    Անձնական գործի համարը՝ {{ $student->personal_matter_number ?? '—' }}
                                </span>
                            </div>
                            <form method="POST" action="{{ route('command.removeStudent', [$command->id, $student->id]) }}" onsubmit="return confirm('Վստա՞հ եք, որ ցանկանում եք հեռացնել այս ուսանողին հրամանից։')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ml-4 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold py-1 px-3 rounded">
                                    Հեռացնել
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Employees --}}
        @if ($command->for_user === 'employee' && $command->employees->count())
            <div class="mt-8">
                <h3 class="text-xl font-semibold mb-2">Աշխատակիցներ ({{ $command->employees->count() }})</h3>
                <ul class="list-disc list-inside text-gray-700">
                    @foreach ($command->employees as $employee)
                        <li class="mb-2 flex justify-between items-center">
                            <div>
                                {{ $employee->last_name }} {{ $employee->first_name }} {{ $employee->surname }}
                                <br>
                                <span class="text-sm text-gray-500"></span><br>
                            </div>
                            <form method="POST" action="{{ route('command.removeEmployee', [$command->id, $employee->id]) }}" onsubmit="return confirm('Վստա՞հ եք, որ ցանկանում եք հեռացնել այս աշխատակցին հրամանից։')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ml-4 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold py-1 px-3 rounded">
                                    Հեռացնել
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mt-6 flex items-center gap-4">
            <a href="{{ route('command.index') }}" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded">
                ← Վերադառնալ ցուցակին
            </a>

            <!-- Delete button -->
            <form method="POST" action="{{ route('command.destroy', $command->id) }}" onsubmit="return confirm('Վստա՞հ եք, որ ցանկանում եք հեռացնել հրամանը։')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">
                    Ջնջել հրամանը
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

<?php

namespace App\Http\Controllers;

use App\Models\Command;
use App\Models\Employee;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandController extends Controller
{
    
    public function index()
    {
        $commands = Command::query()->paginate(10);
        return view('command.index', compact('commands'));

    }

    public function create() {
        return view('command.create');
    }

    public function create_info($id)
    {
        $command = Command::findOrFail($id);
        return view('command.create_info', compact('command', 'id'));
    }

    public function store(Request $request)
    {
        $data= $request->except('_token');

        $command = Command::create([
            'number' => $data['number'],
            'user_id' => Auth::user()->id,
            'type' => $data['type'],
            'date' => $data['date'],
            'for_user' => $data['for_user'],
            'description' => $data['description'],
        ]);
        if($command) {
            return back()->with('success', 'Տվյալները պահպանվել են');
        }
    }

    public function store_info(Request $request)
    {
{
    $validated = $request->validate([
        'command_id' => 'required|integer|exists:commands,id',
        'for_user' => 'required|string|in:student,employee',
        'first_name' => 'required|string|max:255',
        'last_name' => 'nullable|string|max:255',
        'surname' => 'nullable|string|max:255',
    ]);

    if ($validated['for_user'] == 'student') {
        Student::create([
            'command_id' => $validated['command_id'],
            'first_name' => $validated['first_name']?? null,
            'last_name' => $validated['last_name']?? null,
            'surname' => $validated['surname']?? null,
        ]);
    } elseif ($validated['for_user'] == 'employee') {
        Employee::create([
            'command_id' => $validated['command_id'],
            'first_name' => $validated['first_name']?? null,
            'last_name' => $validated['last_name']?? null,
            'surname' => $validated['surname']?? null,
        ]);
    } else {
        return redirect()->back()->with('fail', 'Տվյալները չեն պահպանվել');
    }

    return redirect()->back()->with('success', 'Տվյալները պահպանվել են');
}

        $data = $request->except('_token');
        if($data['for_user'] == 'student') {
            Student::create([
                'command_id' => $data['id'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'surname' => $data['surname']
            ]);
        } else if($data['for_user'] == 'employee') {
            Employee::create([
                'command_id' => $data['command_id'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'surname' => $data['surname']
            ]);
        } else {
            return redirect()->back()->with('fail', 'Տվյալները չեն պահպանվել');
        }

        return redirect()->back()->with('success', 'Տվյալները պահպանվել են');

    }
}
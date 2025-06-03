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
        $commands = Command::paginate(10);
        return view('command.index', compact('commands'));
    }

    public function create()
    {
        return view('command.create');
    }

    public function create_info($id)
    {
        $command = Command::findOrFail($id);
        return view('command.create_info', compact('command'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'date' => 'required|date',
            'for_user' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $command = Command::create([
            'number' => $data['number'],
            'user_id' => Auth::id(),
            'type' => $data['type'],
            'date' => $data['date'],
            'for_user' => $data['for_user'] ?? null,
            'description' => $data['description'] ?? null,
        ]);

        return back()->with('success', 'Տվյալները պահպանվել են');
    }

    public function store_info(Request $request)
    {
        $validated = $request->validate([
            'command_id' => 'required|integer|exists:commands,id',
            'for_user' => 'required|string|in:student,employee',
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'surname' => 'nullable|string|max:255',
            'passport_number' => 'nullable|string|max:255',
            'personal_matter_number' => 'nullable|string|max:255',
        ]);
    
        if ($validated['for_user'] === 'student') {
            Student::create([
                'command_id' => $validated['command_id'],
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'] ?? null,
                'surname' => $validated['surname'] ?? null,
                'passport_number' => $request->input('passport_number'),  // add these two
                'personal_matter_number' => $request->input('personal_matter_number'),
            ]);
        } elseif ($validated['for_user'] === 'employee') {
            Employee::create([
                'command_id' => $validated['command_id'],
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'] ?? null,
                'surname' => $validated['surname'] ?? null,
                'passport_number' => $request->input('passport_number'),  // add these two
                'personal_matter_number' => $request->input('personal_matter_number'),
            ]);
        } else {
            return redirect()->back()->with('fail', 'Տվյալները չեն պահպանվել');
        }
    
        return redirect()->back()->with('success', 'Տվյալները պահպանվել են');
    }

    public function removeStudent(Command $command, Student $student)
    {
        if ($student->command_id === $command->id) {
            $student->command_id = null;
            $student->save();
        }
    
        return redirect()->route('command.show', $command->id)->with('success', 'Ուսանողը հեռացվեց հրամանից։');
    }
    
    public function removeEmployee(Command $command, Employee $employee)
    {
        if ($employee->command_id === $command->id) {
            $employee->command_id = null;
            $employee->save();
        }
    
        return redirect()->route('command.show', $command->id)->with('success', 'Աշխատակիցը հեռացվեց հրամանից։');
    }
    

    public function destroy(Command $command)
    {
        $command->delete();
        return redirect()->route('command.index')->with('success', 'Հրամանը հաջողությամբ ջնջվեց։');
    }
 
    public function show($id)
    {
        $command = Command::with(['students', 'employees'])->findOrFail($id);

        return view('command.show', compact('command'));
    }
}


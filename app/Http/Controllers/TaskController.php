<?php

namespace App\Http\Controllers;

use App\Events\TaskEvent;
use App\Mail\TaskMail;
use App\Prioritiy;
use App\Task;
use App\TaskType;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Nexmo\Response;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $taskTypes = TaskType::all();
        $priorities = Prioritiy::all();
        $users = User::all();
        return view('tasks.create', compact('taskTypes', 'priorities', 'users'));
    }

    public function store(Request $request)
    {
        $task = new Task();
        $this->dataInsert($request, $task);
        $task->save();

        $data = $this->composeEmailData($task);
        Event::fire(new TaskEvent($data));
        return redirect()->back();
    }

    public function show($id)
    {
        $task = Task::findOrfail($id);
        return view('tasks.detail', compact('task'));

    }

    function edit($id)
    {
        $task = Task::findOrfail($id);
//        dd( $task->assignedTo->email);
        $taskTypes = TaskType::all();
        $priorities = Prioritiy::all();
        $users = User::all();
        $date = explode(" ", $task->due_date);
        $setReminder=$task->set_reminder!==null?explode(" ", $task->due_date):[];
        return view('tasks.edit', compact('taskTypes', 'priorities', 'users', 'task', 'date','setReminder'));
    }

    function update(Request $request, $id)
    {
        $task = Task::findOrfail($id);
        $this->dataInsert($request, $task);
        $task->update();

        if (Auth::user()->id === $task->assigned_id) {
            $sendEmail = $task->user->email;
        } else {
            $sendEmail = $task->assignedTo->email;
        }
        $data = $this->composeEmailData($task, $sendEmail);
        Event::fire(new TaskEvent($data));

        return redirect()->route('task.index');
    }

    /**
     * @param Request $request
     * @param $task
     */
    private function dataInsert(Request $request, $task): void
    {
        $task->task_type_id = $request->input('task_type');
        $task->company = $request->input('company');
        $task->user_id = $request->input('contact');
        $task->subject = $request->input('subject');
        $task->assigned_id = $request->input('assigned_to');
        $task->due_date = $this->composeDateTime($request->input('due_date'), $request->input('due_time'));
        $task->set_reminder = $this->composeDateTime($request->input('set_reminder_date'), $request->input('set_reminder_time'));
        $task->priority_id = $request->input('prioritiy');
        $task->created_user_id = $task->id !== null && $task->id !== 0 ? $task->created_user_id : Auth::user()->id;
    }

    /**
     * @param $task
     * @return array
     */
    private function composeEmailData($task, $editMail = ""): array
    {
        $data = [
            'id' => $task->id,
            'assigned_to' => $task->assignedTo->name,
            'assigned_email' => $task->assignedTo->email,
            'subject' => $task->subject,
            'due_date' => $task->due_date,
            'prioritiy' => $task->priority->name,
            'task_type' => $task->tasksType->type_name,
            'company' => $task->company,
            'contact' => $task->contactUser->name,
            'created_by' => $task->user->name,
            'send_email' => $editMail == "" ? $task->assignedTo->email : $editMail,

        ];
        return $data;
    }

    private function composeDateTime($date, $time)
    {
        if ($date != "" && $time != "") {
            $combineDateTime = $date . " " . $time;
            return $combineDateTime;
        }
        return null;

    }
}

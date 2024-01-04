<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\TaskRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TaskController extends Controller
{
    private $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function index()
    {
        $tasks = $this->taskRepository->getAllTasks();

        return view('admin.tasks.index', ['tasks' =>  $tasks]);
    }

    public function create()
    {
        return view('admin.tasks.create');
    }

    public function edit(Request $request)
    {
        $taskId = $request->route('taskId');

        $task = $this->taskRepository->getTaskById($taskId);

        if (empty($task)) {
            return back();
        }

        return view('admin.tasks.edit', ['task' => $task]);
    }


    public function show(Request $request)
    {
        $taskId = $request->route('taskId');

        $task = $this->taskRepository->getTaskById($taskId);

        if (empty($task)) {
            return back();
        }

        return view('admin.tasks.show', ['task' => $task]);
    }
    public function update(Request $request)
    {
        $taskId = $request->route('taskId');

        $taskDetails = [
            'title' => $request->title,
            'description' => $request->description
        ];

        if (isset($request->is_completed)) {
            $taskDetails['is_completed'] = true;
        } else {
            $taskDetails['is_completed'] = false;
        }

        $this->taskRepository->updateTask($taskId, $taskDetails);

        return redirect()->router('tasks.index');
    }

    public function destroy(Request $request)
    {
        $taskId = $request->route('taskId');

        $this->taskRepository->deleteTask($taskId);

        return back();
    }
}

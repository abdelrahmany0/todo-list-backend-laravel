<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(): JsonResponse
    {
        return Response()->json(Task::all());
    }

    public function store(StoreTaskRequest $request): JsonResponse
    {
        $data = $request->validated();
        $task = new Task;
        $task->name = $data["name"];
        $task->description = $data["description"];
        $task->save();
        return Response()->json(["error" => false, "message" => "Task created successfully"]);
    }

    public function show($id): JsonResponse
    {
        $task = Task::find($id);
        if ($task){
            return Response()->json(["error" => false, "task" => $task]);
        } else {
            return Response()->json(["error" => true, "message" => "The given data was invalid!"]);
        }
    }
    public function update(UpdateTaskRequest $request, $id): JsonResponse
    {
        $data = $request->validated();
        $task = Task::find($data["id"]);
        if ($task["id"] == $id){
            Task::where('id', $data["id"])
                ->update([
                    'name'          => $request['name']??$task->name,
                    'description'   => $request['description']??$task->description,
                ]);
            return Response()->json(["error" => false, "message" => "Task updated successfully"]);
        } else {
            return Response()->json(["error" => true, "message" => "The given data was invalid!"]);
        }
    }

    public function destroy($id): JsonResponse
    {
        $task = Task::find($id);
        if ($task){
            $task->delete();
            return Response()->json(["error" => false, "message" => "Deleted Successfully"]);
        } else {
            return Response()->json(["error" => true, "message" => "The given data was invalid!"]);
        }
    }

}

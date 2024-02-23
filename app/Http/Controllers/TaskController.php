<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Auth;
class TaskController extends Controller
{
    //
    public function Task(Request $request){
        return view('Task');
    }
    public function AddTaskAction(Request $request){
        try{
            $alldata = json_decode($request->input('data'));
        $user_id = Auth::id();
        foreach ($alldata as $item) {
            $taskdata=new Task();
            $taskdata->title=$item->title;
            $taskdata->description=$item->description;
            $taskdata->status=$item->status;
            $taskdata->user_id=$user_id;
            $savedata= $taskdata->save();
        }
        return response()->json(['status'=>"200"]);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage(),'status' => "501"]); 
        }
    }
    public function AddTask(Request $request){
        return view('AddTask');
    }
    public function UpdateTaskStatus(Request $request){
        $taskId = $request->input('taskId');
        $newStatus = $request->input('newStatus');
        $task = Task::find($taskId);
        if ($task) {
            $task->status = $newStatus;
            $task->save();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false, 'message' => 'Task not found'], 404);
    }
    public function DeleteTask(Request $request){
        $taskId = $request->input('taskId');
        $task = Task::find($taskId);
        if ($task) {
            $task->delete();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false, 'message' => 'Task not found'], 404);
    }
    public function GetTask(Request $request, $taskId){
        $task = Task::find($taskId);
        if ($task) {
            return response()->json(['status' => true,'getTask' => $task]);
        }
        return response()->json(['status' => false, 'message' => 'Task not found'], 404);
    }
    public function UpdateTask(Request $request){
        try{
            $data = json_decode($request->input('data'));
            $taskid = $request->input('taskid');
            foreach ($data as $item){
                $title = $item->title;
                $description = $item->description;
                $status = $item->status;
                $updatedata= Task::Where('id',$taskid)->update(["title" => $title,"description" => $description,"status" => $status]);
            }
            $getalldata = Task::Where('user_id',Auth::id())->orderBy('id', 'DESC')->get();
            return response()->json(['status' => true,'getalldata'=> $getalldata]);
        }catch(Exception $e){
        return response()->json(['status' => false, 'error' => $e->getMessage()], 404);
        }

    }
}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="row">
                <h1 class="">Tasks List</h1>
            </div>
            <div class="col-lg-12">

                <!-- /.panel-heading -->

                <table class="table table-bordere">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Subject</th>
                        <th>Due Date</th>
                        <th>Priority</th>
                        <th>Task Type</th>
                        <th>Company</th>
                        <th>Created By</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{$task->id}}</td>
                            <td>{{$task->subject}}</td>
                            <td>{{$task->due_date}}</td>
                            <td>{{$task->priority->name}}</td>
                            <td>{{$task->tasksType->type_name}}</td>
                            <td>{{$task->company}}</td>
                            {{--<td>{{$task->user->name}}</td>--}}
                            <td>{{$task->assignedTo->name}}</td>
                            <td>
                                @if(\Illuminate\Support\Facades\Auth::user()->id==$task->created_user_id || \Illuminate\Support\Facades\Auth::user()->id==$task->assigned_id )
                                    <a href="{{url('/task/edit',$task->id)}}">Edit</a>
                                @endif
                                <a href="{{url('/task/detail',$task->id)}}">View</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                <!-- /.panel-body -->
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->

        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

@endsection



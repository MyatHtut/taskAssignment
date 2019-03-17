@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>
                Add Task
            </h1>
        </div>

        <form action="{{route('task.update',$task->id)}}" class="form" method="post">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-3">
                    <label class="">Task Type</label> <span style="color: red">*</span>
                </div>
                <div class="col-md-8">
                    @component('controls.select')
                        @slot('name','task_type')
                        @slot('id','task_type')
                        @slot('req','required')
                        @slot('datas')
                            <option value="" class="font"> Select Task Type</option>
                            @foreach($taskTypes as $taskType)
                                <option value="{{ $taskType->id }}"
                                        @if($task->task_type_id==$taskType->id)selected="selected"@endif>{{ $taskType->type_name }}</option>
                            @endforeach
                        @endslot
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="">Company</label> <span style="color: red">*</span>
                </div>
                <div class="col-md-8">
                    @component('controls.textbox')
                        @slot('name','company')
                        @slot('placeholder','company name')
                        @slot('req','required')
                        @slot('value',$task->company)
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="">Contact</label> <span style="color: red">*</span>
                </div>
                <div class="col-md-8">
                    @component('controls.select')
                        @slot('name','contact')
                        @slot('id','contact')
                        @slot('req','required')
                        @slot('datas')
                            <option value="" class="font"> Select Contact</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}"
                                        @if($task->user_id==$user->id)selected="selected"@endif>{{ $user->name }}</option>
                            @endforeach
                        @endslot
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="">Subject/Objective</label> <span style="color: red">*</span>
                </div>
                <div class="col-md-8">
                    @component('controls.textbox')
                        @slot('name','subject')
                        @slot('placeholder','Enter Subject')
                        @slot('req','required')
                        @slot('value',$task->subject)
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="">Assigned To</label> <span style="color: red">*</span>
                </div>
                <div class="col-md-8">
                    @component('controls.select')
                        @slot('name','assigned_to')
                        @slot('id','assigned_to')
                        @slot('req','required')
                        @slot('datas')
                            <option value="" class="font"> Select Assigned To</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}"
                                        @if($task->assigned_id==$user->id)selected="selected"@endif>{{ $user->name }}</option>
                            @endforeach
                        @endslot
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="">Due Date</label> <span style="color: red">*</span>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="date" class="form-control" id="inputSuccess5" name="due_date"
                               placeholder="Start Date" required="required" value="{{$date[0]}}"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="time" class=" date form-control" id="inputSuccess1" name="due_time"
                               placeholder="Start Date" required="required" value="{{$date[1]}}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="">Set Reminder</label>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="date" class=" date form-control" id="set_reminder_date" name="set_reminder_date"
                               placeholder="Start Date" value="{{isset($setReminder[0])?$setReminder[0]:""}}"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="time" class=" date form-control" id="set_reminder_time" name="set_reminder_time"
                               placeholder="Start Date" value="{{isset($setReminder[1])?$setReminder[1]:""}}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="">Priority</label> <span style="color: red">*</span>
                </div>
                <div class="col-md-8">
                    @component('controls.select')
                        @slot('name','prioritiy')
                        @slot('id','prioritiy')

                        @slot('datas')
                            <option value="" class="font"> Select Priority Type</option>
                            @foreach($priorities as $priority)
                                <option value="{{ $priority->id }}"
                                        @if($task->priority_id==$priority->id)selected="selected"@endif>{{ $priority->name }}</option>
                            @endforeach
                        @endslot
                    @endcomponent
                </div>
            </div>
            <button class="btn btn-success">Add Task</button>
        </form>
    </div>
@endsection


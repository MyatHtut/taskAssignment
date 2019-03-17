@extends('layouts.app')
@section('content')

    <div class="container-fluid" style="margin: 5px;">
        <div class="row">
            <h4 style="color: #1b4b72">HELLO {{$task->assignedTo->name}}</h4>
        </div>
        <div class="row">
            <h5>A new Task( {{$task->company}} - {{$task->subject}} ) is assigned to you</h5>
        </div>
        <div class="row" style="background-color: #1d68a7">
            <h2 style="padding: 1px;color: white"> Task Detail</h2>
        </div>
        <div class="row" style="padding-top: 20px;">
            <div class="col-md-2">
                <label class="">Subject/Objective</label>
            </div>
            <div class="col-md-5">
                <label class="">{{$task->subject}}</label>
            </div>
        </div>
        <div class="row" style="padding-top: 5px;">
            <div class="col-md-2">
                <label class="">Due Date</label>
            </div>
            <div class="col-md-5">
                <label class="">{{$task->due_date}}</label>
            </div>
        </div>
        <div class="row" style="padding-top: 5px;">
            <div class="col-md-2">
                <label class="">Priority</label>
            </div>
            <div class="col-md-5">
                <label class="">{{$task->priority->name}}</label>
            </div>
        </div>
        <div class="row" style="padding-top: 5px;">
            <div class="col-md-2">
                <label class="">Task Type</label>
            </div>
            <div class="col-md-5">
                <label class="">{{$task->tasksType->task_name}}</label>
            </div>
        </div>
        <div class="row" style="padding-top: 5px;">
            <div class="col-md-2">
                <label class="">Company</label>
            </div>
            <div class="col-md-5">
                <label class="">{{$task->company}}</label>
            </div>
        </div>
        <div class="row" style="padding-top: 5px;">
            <div class="col-md-2">
                <label class="">Contact</label>
            </div>
            <div class="col-md-5">
                <label class="">{{$task->contactUser->name}}</label>
            </div>
        </div>
        <div class="row" style="padding-top: 5px;">
            <div class="col-md-2">
                <label class="">Created By</label>
            </div>
            <div class="col-md-5">
                <label class="">{{$task->user->name}}</label>
            </div>
        </div>
        @if(\Illuminate\Support\Facades\Auth::user()->id==$task->created_user_id || \Illuminate\Support\Facades\Auth::user()->id==$task->assigned_id )
            <div class="row">
                <a href="{{url('/task/edit',$task['id'])}}" class="btn btn-danger" style="margin-top:20px ">Edit</a>
            </div>
        @endif

    </div>
@endsection

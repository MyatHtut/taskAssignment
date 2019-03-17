<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css"
          rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
</head>
<body>


<div class="container-fluid" style="margin: 5px;">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"><img src="http://www.eurocham-cambodia.org/images/members/logos/f2942-ben-line-agencies-logo-(no-letters)-1.jpg" alt="" style="max-width: 150px"></div>
        <div class="col-md-4"></div>
    </div>

    <div class="row">
        <h4 style="color: #1b4b72">HELLO {{$task['assigned_to']}}</h4>
    </div>
    <div class="row">
        <h5>A new Task( {{$task['company']}} - {{$task['subject']}} ) is assigned to you</h5>
    </div>
    <div class="row" style="background-color: #1d68a7">
        <h2 style="padding: 1px"> Task Detail</h2>
    </div>
    <div class="row" style="padding-top: 20px;">
        <div class="col-md-2">
            <label class="">Subject/Objective</label>
        </div>
        <div class="col-md-5">
            <label class="">{{$task['subject']}}</label>
        </div>
    </div>
    <div class="row" style="padding-top: 5px;">
        <div class="col-md-2">
            <label class="">Due Date</label>
        </div>
        <div class="col-md-5">
            <label class="">{{$task['due_date']}}</label>
        </div>
    </div>
    <div class="row" style="padding-top: 5px;">
        <div class="col-md-2">
            <label class="">Priority</label>
        </div>
        <div class="col-md-5">
            <label class="">{{$task['prioritiy']}}</label>
        </div>
    </div>
    <div class="row" style="padding-top: 5px;">
        <div class="col-md-2">
            <label class="">Task Type</label>
        </div>
        <div class="col-md-5">
            <label class="">{{$task['task_type']}}</label>
        </div>
    </div>
    <div class="row" style="padding-top: 5px;">
        <div class="col-md-2">
            <label class="">Company</label>
        </div>
        <div class="col-md-5">
            <label class="">{{$task['company']}}</label>
        </div>
    </div>
    <div class="row" style="padding-top: 5px;">
        <div class="col-md-2">
            <label class="">Contact</label>
        </div>
        <div class="col-md-5">
            <label class="">{{$task['contact']}}</label>
        </div>
    </div>
    <div class="row" style="padding-top: 5px;">
        <div class="col-md-2">
            <label class="">Created By</label>
        </div>
        <div class="col-md-5">
            <label class="">{{$task['created_by']}}</label>
        </div>
    </div>
    <div class="row">
        <a href="{{url('/task/detail',$task['id'])}}" class="btn btn-danger" style="margin-top:20px ">View Tasks</a>
    </div>
    <div class="row" style="padding-top: 5px;">
        <div class="col-md-12">
            <label class="text-muted">Regards,</label>
        </div>
        <div class="col-md-12">
            <label class="">BEN LINE AGENCIES</label>
        </div>
    </div>
</div>
</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>fēdan - the feedback system</title>
    {{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}
    {{ HTML::style('packages/font-awesome/css/font-awesome.min.css') }}
    {{ HTML::style('css/src/main.css')}}
    {{ HTML::style('js/rateit/src/rateit.css')}}


</head>
<body class="feedback-form">
<div class="container panel-default">
    {{ Form::open(array('url'=>'feedback/feedback','class'=>'form-horizontal col-sm-6','method' => 'post')) }}

        <div class="form-group"><label>What were you trying to do?</label><textarea name="doing" class="form-control required"></textarea></div>
        <div class="form-group"><input type="checkbox" value="yes" name="work" id="work"/>
        <label for="work">tick this box if it did not work as expected?</label></div>
        <div class="form-group"><label>What happened?</label><textarea name="happened" class="form-control required"></textarea></div>
        <div class="form-group"><button type="submit" class="btn btn-default pull-left">Submit</button></div>
        <input type="hidden" value="{{$page}}" name="page" />
        <input type="hidden" value="{{$user}}" name="user" />
        <div class="form-group"><label>What is your overall impression ? (optional)</label>
            <input type="range" min="0" max="7" value="0" step="1" id="rating" name="rating">
            <div class="rateit" data-rateit-backingfld="#rating"></div></div>
    {{Form::close()}}

    <p>Kindly submitted on {{ date('d M Y  H:i ', $today) }} by {{$user}}</p>
    <p>This system helps us keep track of any issues that have occurred and feed them directly into the next release.</p>

</div>
<script src="{{ URL::asset('js/jquery.min.js') }}" type="text/javascript" ></script>
<script src="{{ URL::asset('js/rateit/src/jquery.rateit.min.js') }}" type="text/javascript" ></script>
</body>
</html>
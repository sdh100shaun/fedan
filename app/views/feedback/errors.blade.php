<?php
/**
 * Created by PhpStorm.
 * User: shaunhare
 * Date: 01/12/2013
 * Time: 02:31
 */?>
<h2>Oops an error occurred.</h2>
@if ($errors->has('happened'))
@foreach ($errors->get('happened', '<p class="error-message">:message</p>') as $happened_error)
{{ $happened_error }}
@endforeach
@endif
@if(Session::has('message'))
    <p class="alert">{{ Session::get('message') }}</p>

@endif
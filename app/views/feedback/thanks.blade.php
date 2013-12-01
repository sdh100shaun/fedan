<?php
/**
 * Created by PhpStorm.
 * User: shaunhare
 * Date: 01/12/2013
 * Time: 02:31
 */?>

<?php echo View::make('partials.header'); ?>
<body class="feedback-form">
<div class="well">
    <h2> Thanks </h2>
    @if(Session::has('message'))
    <p class="alert alert-success"><i class="fa fa-comment-o"></i> {{ Session::get('message') }} your feedback has been submitted </p>
    <a href="/feedback/{{Session::get('message')}}" >Submit more feedback</a>
    @endif
</div>
<?php echo View::make('partials.footer'); ?>

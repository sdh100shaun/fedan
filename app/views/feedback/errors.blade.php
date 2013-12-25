<?php
/**
 * Created by PhpStorm.
 * User: shaunhare
 * Date: 01/12/2013
 * Time: 02:31
 */
echo View::make('partials.header');?>

    <div class="well">
        <h3><i class="fa fa-warning" ></i> Oops an error occurred.</h3>
        <div class="alert alert-danger">
        <ul>
        @if ($errors->has('happened'))
        @foreach ($errors->get('happened', '<li class="error-message">:message</li>') as $happened_error)
        {{ $happened_error }}
        @endforeach
        @endif

        @if ($errors->has('doing'))
        @foreach ($errors->get('doing', '<li class="error-message">:message</li>') as $doing_error)
        {{ $doing_error }}
        @endforeach
        @endif
        </ul>
        </div>
        <p><a href="/feedback/{{$user}}">Try again </a></p>
    </div>
<?php echo View::make('partials.footer'); ?>
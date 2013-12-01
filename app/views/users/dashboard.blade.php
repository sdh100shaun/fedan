<?php
/**
 * Created by PhpStorm.
 * User: shaunhare
 * Date: 30/11/2013
 * Time: 15:15
 */ ?>
<section>
    <header><h2>Feedback Results</h2></header>
</section>
<div class="table-responsive">
    <table class="table table-bordered table-hover tablesorter">
        <thead>
        <tr>
            <th>Page <i class="fa fa-sort"></i></th>
            <th>What were you trying to do? <i class="fa fa-sort"></i></th>
            <th>What happened? <i class="fa fa-sort"></i></th>
            <th>Rating <i class="fa fa-sort"></i></th>
            <th> User <i class="fa fa-sort"></i></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($feedback as $item)
        <tr>
            <td>{{$item->page}}</td>
            <td>{{$item->doing}}</td>
            <td>{{$item->happened}}</td>
            <td>{{$item->rating}}</td>
            <td>{{$item->user}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

</div>
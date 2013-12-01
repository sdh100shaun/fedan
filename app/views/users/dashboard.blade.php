<?php
/**
 * Created by PhpStorm.
 * User: shaunhare
 * Date: 30/11/2013
 * Time: 15:15
 */ ?>
<div class="table-responsive">
    <table class="table table-bordered table-hover tablesorter">
        <thead>
        <tr>
            <th>Page <i class="fa fa-sort"></i></th>
            <th>What were you trying to do? <i class="fa fa-sort"></i></th>
            <th>What happened? <i class="fa fa-sort"></i></th>
            <th>Did it work? <i class="fa fa-sort"></i></th>
            <th> User <i class="fa fa-sort"></i></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($feedback as $item)
        <tr>
            <td>{{$item->url}}</td>
            <td>1265</td>
            <td>32.3%</td>
            <td>$321.33</td>
            <td>$321.33</td>
        </tr>
        @endforeach
        </tbody>
    </table>

</div>
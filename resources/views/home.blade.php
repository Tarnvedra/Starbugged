@extends('layouts/app')

@section('content')






       @include('include/sidebar')

     <div class="main">
        <div class="row pl-3">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Bug ID</th>
                    <th>Product </th>
                    <th>OS</th>
                    <th>Risk</th>
                    <th>Synopsis </th>
                    <th>Assignment</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td><a href="">#00001</a></td>
                    <td>Starbugged</td>
                    <td>W</td>
                    <td>Medium</td>
                    <td>Bug</td>
                    <td>A.N.Other</td>
                    <td>10/6/2020</td>
                    <td>09.47</td>
                    <td>In Progress</td>
                </tr>
                <tr>
                    <td><a href="">#00002</a></td>
                    <td>Starbugged</td>
                    <td>W</td>
                    <td>Low</td>
                    <td>Bug</td>
                    <td>J.N.Other</td>
                    <td>11/6/2020</td>
                    <td>19.47</td>
                    <td>In Progress</td>
                </tr>
                <tr>
                    <td><a href="">#00003</a></td>
                    <td>Warehouse</td>
                    <td>W</td>
                    <td>Low</td>
                    <td>Bug</td>
                    <td>K.N.Other</td>
                    <td>1/7/2020</td>
                    <td>20.47</td>
                    <td>In Progress</td>
                </tr>
                <tr>
                    <td><a href="">#00004</a></td>
                    <td>Motoring</td>
                    <td>W</td>
                    <td>Low</td>
                    <td>Bug</td>
                    <td>S.N.Other</td>
                    <td>11/6/2020</td>
                    <td>19.47</td>
                    <td>In Progress</td>
                </tr>
                <tr>
                    <td><a href="">#00005</a></td>
                    <td>Starbugged</td>
                    <td>W</td>
                    <td>Low</td>
                    <td>Issue</td>
                    <td>J.N.Other</td>
                    <td>11/6/2020</td>
                    <td>6.25</td>
                    <td>In Progress</td>
                </tr>
                <tr>
                    <td><a href="">#00006</a></td>
                    <td>Starbugged</td>
                    <td>W</td>
                    <td>Low</td>
                    <td>Bug</td>
                    <td>J.N.Other</td>
                    <td>11/6/2020</td>
                    <td>8.59</td>
                    <td>Resolved</td>
                </tr>
            </table>

</div>
<div>
@endsection

@extends('app')

@section('content')

    <section id="messages">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel-body">
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading">{{ trans('interface.statistics') }}</div>

                            <!-- Table -->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>{{ trans('interface.page') }}</th>
                                    <th>{{ trans('interface.visit') }}</th>
                                    <th>{{ trans('interface.visit_unique') }}</th>
                                </tr>
                                </thead>
                                @foreach($statistics as $statistic)

                                    <tbody>
                                    <tr>
                                        <td>{{$statistic->page}}</td>
                                        <td>{{$statistic->total}}</td>
                                        <td>{{$statistic->unique_visitors}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

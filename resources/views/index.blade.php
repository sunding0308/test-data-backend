<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>首页</title>

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
        <link href="{{ asset('css/show.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="row">
            <div class="header">MOTORTEST Labs</div>
            <div class="col-md-12">

                <div class="ibox">

                    <div class="ibox-content playlist-list">

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>设备</th>
                                <th>日期</th>
                                <th>类型</th>
                                <th>操作</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($tests as $test)
                            <tr>
                                <td>{{ $test->device }}</td>
                                <td>{{ $test->date }}</td>
                                <td>{{ $test->type }}</td>
                                <td>
                                    <a href="{{ route('tests.show', $test->id) }}" class="btn btn-normal btn-m">详情</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>

                        </table>

                        <div class="row">
                            <div class="col-5">
                                <div class="dataTables_info">
                                    @if ($tests->count()>0)
                                        显示 {{ $tests->firstItem() }} - {{ $tests->lastItem() }} 共 {{ $tests->total() }} 测试
                                    @else
                                        无测试数据
                                    @endif
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="dataTables_paginate paging_simple_numbers">
                                    {{ $tests->appends(request()->input())->links() }}
                                </div>
                            </div>
                        </div>

                    </div><!-- .ibox-content -->

                </div><!-- .ibox -->

            </div><!-- .col* -->

        </div><!-- .row -->
    </body>
</html>

<!doctype html>
<html lang="en">
    <head>
        <title>首页</title>
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="row">

            <div class="col-md-12">

                <div class="ibox">

                    <div class="ibox-content playlist-list">

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>设备</th>
                                <th>日期</th>
                                <th>类型</th>
                                <th>周期</th>
                                <th>档位</th>
                                <th>操作</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($tests as $test)
                            <tr>
                                <td>{{ $test->device }}</td>
                                <td>{{ $test->date }}</td>
                                <td>{{ $test->type }}</td>
                                <td>{{ $test->cycle }}</td>
                                <td>{{ $test->level }}</td>
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
                                        显示 {{ $tests->firstItem() }} 到 {{ $tests->lastItem() }} 共有 {{ $tests->total() }} 测试数据
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

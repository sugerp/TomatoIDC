@extends('admin.themes.default.layouts.app')

@section('content')
    @include('admin.themes.default.layouts.header')
@endsection

@section('container-fluid')
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h3 class="mb-0">添加商品配置</h3>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="post" id="add-form" action="{{action('GoodController@goodConfigureAddAction')}}">
                        <input type="hidden" value="{{$type}}" name="type">
                        {{csrf_field()}}
                        <h6 class="heading-small text-muted mb-4">根据服务器插件不同需要填写内容不同，若配置不正确，可能会出现问题</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">配置标题</label>
                                        <input type="text" class="form-control form-control-alternative"
                                               placeholder="配置标题" value="{{old('title')}}" name="title">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">默认开通时长</label>
                                        <input type="text" class="form-control form-control-alternative"
                                               placeholder="默认开通时长（可为空）" value="{{old('time')}}" name="time">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="row">
                                @if(!empty($input))
                                    @foreach($input as $key=>$value)
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label"
                                                       for="input-username">{{$value}}</label>
                                                <input type="text" class="form-control form-control-alternative"
                                                       placeholder="根据服务器插件配置-可为空" value="{{old($key)}}" name="{{$key}}">
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @include('admin.themes.default.layouts.errors')
                        <input type="submit" class="btn btn-primary" value="保存">
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

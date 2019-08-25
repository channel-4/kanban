@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">リスト作成</div>
                <div class="panel-body">
                    @include('common.errors')
                    <form action="{{ url('/list/new')}}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                                <label for="title">リスト名</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="例) 未着手のタスク">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="container-fluid col-sm-offset-2 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                <i class="glyphicon glyphicon-plus"></i> 作成</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
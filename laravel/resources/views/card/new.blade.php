@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">カード作成</div>
                <div class="panel-body">
                    @include('common.errors')
                    <form action="/list/{{ $list_id }}/card/new" method="post" class="form-horizontal">
                        {{ csrf_field() }}
      
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                                <p>リスト名： <strong>{{ $list_title }}</strong></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                                <label for="title">タイトル</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="例) 本を読む">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                                <label for="memo">メモ</label>
                                <textarea name="memo" id="memo" rows="3" class="form-control" placeholder="例) 60ページまで"></textarea>
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
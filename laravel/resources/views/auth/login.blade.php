@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ログイン ※Googleアカウントが必要になります</div>

                <div class="panel-body">
                    <a href="/login/google" class="btn btn-primary btn-lg btn-block" role="button">
                        <i class="fa fa-google"></i> | Googleアカウントでログイン
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

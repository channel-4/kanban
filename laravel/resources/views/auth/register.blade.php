@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ログイン ※Googleアカウントが必要になります</div>

                <div class="panel-body">
                    <div class="col-md-4 col-md-offset-3">
                        <a href="/login/google" class="btn btn-primary btn-lg" role="button">
                            <i class="fa fa-google"></i> | Googleアカウントでログイン
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

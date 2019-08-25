@if (count($errors) > 0)
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-danger">
        <div class="panel-heading"><strong>送信内容をご確認ください</strong></div>
        <div class="panel-body warning-list">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif
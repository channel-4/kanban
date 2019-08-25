@extends('layouts.app')

@section('content')
<div class="container all-kanban">
    @foreach ($lists as $list)
        <div class="col-sm-6 col-md-3">
            <div class="panel panel-primary each-kanban">
                <div class="panel-heading">
                    {{ $list->title }}
                </div>
                <div class="panel-body">
                    {{-- TODO ここに各タスクが入る --}}
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
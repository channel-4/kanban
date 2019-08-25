@extends('layouts.app')

@section('content')
@include('common.flash')
<div class="container all-kanban">
    @foreach ($lists as $list)
        <div class="col-sm-6 col-md-3">
            <div class="panel panel-primary each-kanban">
                <div class="panel-heading">
                    {{ $list->title }}
                    <div class="link-area">
                        <a href="/list/edit/{{ $list->id }}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="/list/delete/{{ $list->id }}"
                            onclick="event.preventDefault();
                                     document.getElementById('destroy-form').submit();">
                            <i class="fa fa-trash"></i>
                        </a>

                        <form id="destroy-form" action="/list/delete/{{ $list->id }}" method="post" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
                <div class="panel-body">
                    {{-- TODO ここに各タスクが入る --}}
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
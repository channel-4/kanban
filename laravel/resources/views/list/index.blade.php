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
                <div class="panel-body all-card">
                    <div class="add-card">
                        <a class="btn btn-default btn-sm" href="/list/{{ $list->id }}/card/new" role="button">
                            <i class="fa fa-plus-square"></i> カードを追加
                        </a>
                    </div>
                    @foreach ($list->cards as $card)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ $card->title }}
                        </div>
                        <div class="panel-body">
                        {{ $card->memo }}
                    </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
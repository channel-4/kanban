@extends('layouts.app')

@section('content')
@include('common.flash')
<div class="container all-kanban">
    @if (count($lists) == 0)
      <div class="col-sm-6 col-md-5">
          <div class="panel panel-default">
              <div class="panel-heading lint-add-info">
                    リストが登録されていません
                    <a href="/list/new" class="btn btn-default btn-sm pull-right" role="button">
                        <i class="fa fa-plus-square"></i> 追加はこちら
                    </a>
              </div>
          </div>
      </div>
    @endif
    @foreach ($lists as $list)
        <div class="col-sm-6 col-md-4 col-inline-box" style="clear: both;">
            <div class="panel panel-primary each-kanban">
                <div class="panel-heading">
                    <div class="list-title">{{ $list->title }}</div>
                    <div class="link-area">
                        <a href="/list/edit/{{ $list->id }}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="/list/delete/{{ $list->id }}"
                            onclick="event.preventDefault();
                                     document.getElementById('list{{ $list->id }}-destroy-form').submit();">
                            <i class="fa fa-trash"></i>
                        </a>

                        <form id="list{{ $list->id }}-destroy-form" action="/list/delete/{{ $list->id }}" method="post" style="display: none;">
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
                        <div class="panel-heading card-title collapsed" data-toggle="collapse" data-target="#card{{$card->id}}">
                            {{ $card->title }}<i class="fa fa-bars pull-right"></i>
                        </div>
                        <div class="panel-body panel-collapse collapse card-memo" id="card{{ $card->id }}">
                            {{ $card->memo }}<br>
                            <a class="btn btn-default btn-xs card-edit" href="list/{{ $list->id }}/card/edit/{{ $card->id }}">
                                <i class="fa fa-edit"></i> 編集
                            </a>
                            
                            <a href="/card/delete/{{ $card->id }}" class="btn btn-default btn-xs card-edit"
                               onclick="event.preventDefault(); document.getElementById('card{{ $card->id }}-destroy-form').submit();">
                                <i class="fa fa-trash"></i> 削除
                            </a>
                            <form id="card{{ $card->id }}-destroy-form" action="/card/delete/{{ $card->id }}" method="post" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
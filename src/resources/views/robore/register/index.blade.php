@extends('robore.layout.layout--forms')
@section('title', $title ?? '新規登録')
@section('content')
  @component('store.component._p-index')
    @slot('body')
      @livewire('user.broker')
    @endslot
  @endcomponent
@endsection

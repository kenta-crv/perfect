@extends('customer.layout.layout--customer')
@section('title', $title ?? '顧客')
@section('content')
  @component('admin.component._p-index')
    @slot('title')

    @endslot

    @slot('action')
    @endslot

    @slot('body')

      <livewire:customer.home/>
      <livewire:customer.confirmation/>
    @endslot
  @endcomponent
@endsection

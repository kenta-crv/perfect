@extends('store.layouts.layout--store')
@section('title', $title ?? 'ポータルサイト設定')
@section('content')
@component('admin.component._p-index')
    @slot('title')
    	{{--  <div class="c-image c-image--user"></div>  --}}
        ポータルサイト（広告出稿）設定
    @endslot
    @slot('action')

    @endslot
    @slot('body')
    <div class="c-contianer-box">
        <div class="box-description">
          <div class="box-title">
            <p>	ポータルサイト選択　：　店舗管理者のみの機能です。</p>
            <p class="header_3">どのポータルサイトを接続して、広告を出稿するかを設定します。</p>
          </div>
        </div>
        <div class="c-checkbox">
            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
            <label for="vehicle1">SUUMO</label><br>
        </div><br/>
        <div class="foot_3">
            <div class="p-login__buttonArea">
                <button type="submit" class="c-button c-button--full c-button--thinBlue">保存</button>
            </div>
        </div>
      </div>
    @endslot
@endcomponent
@endsection

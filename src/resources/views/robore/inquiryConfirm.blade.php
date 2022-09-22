@extends('robore.layout.layout--forms')
@section('title', $title ?? '新規登録')
@section('content')
  @component('store.component._p-index')
    @slot('body')
    @php($prefectures = config('prefecture.PREFECTURE'))
      <div class="c-contianer-box_4 w-per-18">
        <div class="box-data">
          <div class="container-table ">
            <p class="register-label">
              お問い合わせ確認
              <hr class="register-label-horizontal">
            </p>
              </div><br/>


                <form method="post" action="{{ route('confirmInquiry') }}">
                  @csrf
                  <div class="display-inline--flex width-full mgn-t-6">
                    <ul class="mgn-ato">
                      <li class="mgn-t-2">
                        <div class="display-inline--flex">
                          <div class="lft-bx min-wgt-2">
                            宅建業免許番号
                          </div>
                          <div class="rgt-bx mgn-l-20">
                            <span>
                              {{ $inputRequest['license'] }}
                            </span>
                            <input placeholder="" type="text" hidden class="hp-input" value="{{ $inputRequest['license'] }}" name="license"   >
                          </div>
                        </div>

                      </li>
                      <li class="mgn-t-3">
                        <div class="display-inline--flex">
                          <div class="lft-bx min-wgt-2">
                            会社名・屋号
                          </div>
                          <div class="rgt-bx mgn-l-20">
                            <span>
                              {{ $inputRequest['company_name'] }}
                            </span>
                            <input placeholder="" type="text" hidden class="hp-input" value="{{ $inputRequest['company_name'] }}" name="company_name"   >
                          </div>
                        </div>
                      </li>
                      <li class="mgn-t-3">
                        <div class="display-inline--flex">
                          <div class="lft-bx min-wgt-2">
                            電話番号
                          </div>
                          <div class="rgt-bx mgn-l-20">
                            <span>
                              {{ $inputRequest['tel'] }}
                            </span>
                            <input placeholder="" type="text" hidden class="hp-input" value="{{ $inputRequest['tel'] }}" name="tel"   >
                          </div>
                        </div>
                      </li>
                      <li class="mgn-t-3">
                        <div class="display-inline--flex">
                          <div class="lft-bx min-wgt-2">
                            都道府県
                          </div>
                          <div class="rgt-bx mgn-l-20">
                            <span>
                              @if($inputRequest['prefecture'])
                              {{ $prefectures[$inputRequest['prefecture']] }}
                              @endif
                            </span>
                            <input placeholder="" type="text" hidden class="hp-input" value="{{ $inputRequest['prefecture'] }}" name="prefecture"   >
                          </div>
                        </div>
                      </li>
                      <li class="mgn-t-3">
                        <div class="display-inline--flex">
                          <div class="lft-bx min-wgt-2">
                            ご担当者様名
                          </div>
                          <div class="rgt-bx mgn-l-20">
                            <span>
                              {{ $inputRequest['last_name'] }} {{$inputRequest['first_name'] }}
                            </span>
                            <input placeholder="姓 名" hidden class="no-radius hp-input"  value="{{ $inputRequest['first_name'] }}" name="first_name"  type="text" class="hp-input" >
                            <input placeholder="姓 名" hidden class="no-radius hp-input"  value="{{ $inputRequest['last_name'] }}" name="last_name"  type="text" class="hp-input" >                          </div>
                        </div>
                      </li>
                      <li class="mgn-t-3">
                        <div class="display-inline--flex">
                          <div class="lft-bx min-wgt-2">
                            メールアドレス
                          </div>
                          <div class="rgt-bx mgn-l-20">
                            <span>
                              {{ $inputRequest['email'] }}
                            </span>
                            <input placeholder="" type="text" hidden class="hp-input" value="{{ $inputRequest['email'] }}" name="email"   >
                          </div>
                        </div>
                      </li>
                      <li class="mgn-t-3">
                        <div class="display-inline--flex">
                          <div class="lft-bx min-wgt-2">
                            お問合せ内容
                          </div>
                          <div class="rgt-bx mgn-l-20">
                            <span>
                              {{ $inputRequest['body'] }}
                            </span>
                            <input placeholder="" type="text" hidden class="hp-input" value="{{ $inputRequest['body'] }}" name="body"   >
                          </div>
                        </div>
                      </li>
                    </ul>

                  </div>
                  <div class="p-login__buttonArea mgn-t-7">
                    <button class="c-button_10 margin-top--10 c-button-sm c-button--thinBlue btn-right-white-2">
                      お問い合わせする
                    </button>
                  </div>
                </form>
          </div>
    </div>
    @endslot
  @endcomponent
@endsection

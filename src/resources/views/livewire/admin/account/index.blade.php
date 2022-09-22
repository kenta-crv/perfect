<div>

  @if ($create_modal)
    @include('livewire.admin.account.create')
  @elseif($update_modal)
    @include('livewire.admin.account.edit')
  @elseif($delete_modal)
    @include('livewire.admin.account.delete')
  @endif
  <div class="c-main-box active-cont">

    <div class="c-main-body ">
      <div class="setting-right">

        <div class="mgn-l-ato">

          {{-- <i
            wire:click="add"
            class="c-icn-add " id="create-icon">
            
          </i>

          <span for="create-icon" class="">ユーザーを追加</span> --}}
          <a href="{{route ('admin.account.create')}}" class="c-icn-add margin-space--1" id="create_acc"></a>
          <label for="create_acc" class="span_mightyzack">ユーザーを追加</label>
        </div>
      </div>
      <div class="c-list-tbl">
        {{ session('message') ?? '' }}
        <table>
            <tr>
              <th class="brd-tlr-2" >
                <div class="display-inline--flex width-full">
                  <span class="mgn-t-1">ユーザー名</span>
                  <div class="sorting mgn-l-ato">
                    <span class="c-icn-polygon-up"></span>
                    <span class="c-icn-polygon-down-active"></span>
                  </div>
                </div>
              </th>
              <th >
                <div class="display-inline--flex width-full">
                  <span class="mgn-t-1">ロール権限</span>
                  <div class="sorting mgn-l-ato">
                    <span class="c-icn-polygon-up"></span>
                    <span class="c-icn-polygon-down-active"></span>
                  </div>
                </div>
              </th>
              <th >
                <div class="display-inline--flex width-full">
                  <span class="mgn-t-1">メールアドレス</span>
                  <div class="sorting mgn-l-ato">
                    <span class="c-icn-polygon-up"></span>
                    <span class="c-icn-polygon-down-active"></span>
                  </div>
                </div>
              </th>
              <th >
                <div class="display-inline--flex width-full">
                  <span class="mgn-t-1">登録年月日</span>
                  <div class="sorting mgn-l-ato">
                    <span class="c-icn-polygon-up"></span>
                    <span class="c-icn-polygon-down-active"></span>
                  </div>
                </div>
              </th>
              <th >
                <div class="display-inline--flex width-full">
                  <span class="mgn-t-1">最終アクセス</span>
                  <div class="sorting mgn-l-ato">
                    <span class="c-icn-polygon-up"></span>
                    <span class="c-icn-polygon-down-active"></span>
                  </div>
                </div>
              </th>
              <th  class="brd-trr">
                <div class="display-inline--flex width-full">
                  <span class="mgn-t-1"> 編集と削除</span>
                  <div class="sorting mgn-l-ato">
                  </div>
                </div>
              </th>
            </tr>
            @foreach($accounts as $account)
            <tr>
              <td class="txt-alg-l"><span class="account-txt">{{ $account->last_name . $account->first_name}}</span></td>
              <td class="txt-alg-l"><span class="account-txt">
                @foreach(config('const.role') as $key => $value)
                  @if($key == $account->role)
                    {{ $value }}
                  @endif
                @endforeach
              </span></td>
              <td class="txt-alg-l"><span class="account-txt">{{ $account->email }}</span></td>
              <td class="txt-alg-r"><span class="account-txt">{{ $account->created_at }}</span></td>
              <td class="txt-alg-r"><span class="account-txt">{{ $account->last_access_datetime }}</span></td>
              <td class="txt-alg-l ">
                {{--  <form action="{{ route('admin.mypage.index')}}" method="POST">  --}}
                  {{--  <input type="hidden" name="id" value="{{ $account->id }}" />  --}}
                  <div class="display_inline pdg-2">
                  <a type="submit"class="c-button mgn-r-2 c_button_adjust" href="{{url('admin/account/edit/'. $account->id)}}" >編集</a>
                {{--  </form>  --}}
                <form action="{{ route('admin.account.delete')}}" method="POST">
                  <input type="hidden" name="id" value="{{ $account->id }}" />
                  @csrf
                  <button type="submit" class="c-button c-button--full c-button--account" onclick="return confirm('本当に削除していいんですか？')">削除</button>
                </div>

                </form>
            </td>
              </td>
            </tr>
            @endforeach
        </table>
      </div>

    </div>
</div>
</div>

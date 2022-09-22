<div>
    <div class="c-contianer-box">
      <div class="a-page-title">
        <span class="title__t2"><strong>—</strong>マイページ</span>
      </div>
        <div class="box-description">
          <div class="box-title_mypage">
            <li class="p-list__item">
                <div class="p-list__item__label">
                  <div class="p-login__buttonArea">
                    <button type="button" wire:click="OpenEditAdminInformation()" class="c-button c-button--full_mypage">編集</button>
                  </div>
                </div>
            </li>
            <li class="p-list__item">
              <table class="tbl_mypage">
                <tr>
                  <th class="tbl_color">お名前</th>
                  <th>佐竹 義之</th>
                </tr>
                <tr>
                  <td class="tbl_color">メールアドレス</td>
                  <td class="content_higlight">satake.y@plenty.co.jp</td>
                </tr>
                <tr>
                  <td class="tbl_color">パスワード</td>
                  <td class="content_higlight">パスワードの変更</td>
                </tr>
                <tr>
                  <td class="tbl_color">ロール権限</td>
                  <td>管理者</td>
                </tr>
              </table>
            </li>
          </div>
        </div>
      </div>
      @include('modals.editAdmin')
</div>

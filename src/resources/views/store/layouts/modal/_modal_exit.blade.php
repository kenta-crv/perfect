<section class="remodal remodal_800" data-remodal-id="modal_exit">
  <section class="p-modal">
    <div class="p-modal__buttonArea p-buttonArea">
      <button data-remodal-action="close" class="remodal-close"></button>
    </div>
    <div class="p-modal--head">
      <div class="p-modal--head--text">
        <p class="c-title nickname">
          本当に退会しますか？
        </p>
      </div>
    </div>
    <div class="p-modal--body">
      <p class="cnt">
        退会手続きをされますと<br />全てのサービスがご利用できなくなります。<br />
        再度事利用いただくにはID登録が必要となります。<br />
        本当に退会してよろしいですか？
      </p>
      <div class="c-exit">
        <form action="{{ route('web.user.deleteUser') }}" method="POST">
          @csrf
          <input type="hidden" name="user_id" value="{{ $user->id }}">
          <input class="c-button__line--gray" type="submit" value="退会する">
        </form>
      </div>
    </div>
  </section>
</section>

<!----Insert Sitio Modal---->
<div class="modal fade editAdminInfo" wire:ignore.self tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <form wire:submit.prevent="update">
            <input type="hidden" name="user_id">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">Edit Information</h4>
            </div>
            <div class="modal-body">
                <div class="c-input c-input--full">
                    <input type="text" wire:model="edit_name" placeholder="お名前"><br/>
                </div>
                <div class="c-input c-input--full">
                    <input type="text" wire:model="edit_email" placeholder="メールアドレス">
                </div><br/>
                <div class="c-input c-input--full">
                    <input type="password" wire:model="edit_password" placeholder="パスワード">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link btn-sm waves-effect action-btn">SAVE CHANGES</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
        </form>
    </div>
</div>
<!----End Insert Sitio Modal---->
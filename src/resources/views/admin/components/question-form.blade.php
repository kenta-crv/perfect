<div class="p-questionForm">
	<li>
		<div class="p-questionForm__head js-button-toggle">
			<h3 class="p-questionForm__head__title"><span>Q</span><strong>{{ $seq }}</strong></h3>
      <input type="hidden" name="quizId" value="{{ $quizId }}">
		</div>
		<div class="p-questionForm__body js-target-toggle">
			<div class="l-12 l-12--gap24">
			  <div class="l-12__6">
			    <ul class="p-list {{ $class ?? '' }}">
			      <li class="p-list__item">
			        <div class="p-list__item__label">
			          <span class="required"></span>カテゴリー
			        </div>
			        <div class="p-list__item__data">
			        <div class="l-12 l-12--gap8">
			          <div class="c-input c-input--full c-input--select__iconSelect c-input--select">
			            <select>
			              <option value="">4択形式画像問題</option>
			              <option value="">ox解答問題</option>
			              <option value="">動画問題</option>
			              <option value="">テキスト問題</option>
			            </select>
			          </div>
			        </div>
			      </li>

			      <li class="p-list__item">
			        <div class="p-list__item__label">
			          <span class="required"></span>動画アップ
			        </div>
			        <div class="p-list__item__data">
			        <div class="l-12 l-12--gap8">
			          <div class="c-input c-input--full">
				          <div class="l-12__6">
				            <div class="c-input c-input--radio">
				              <input id="gender_men" name="gender" type="radio" value="1" checked="checked">
				              <label for="gender_men">あり</label>
				            </div>
				          </div>
				          <span class="unit_min"></span>
				          <div class="l-12__6">
				            <div class="c-input c-input--radio">
				              <input id="gender_women" name="gender" type="radio" value="2">
				              <label for="gender_women">なし</label>
				            </div>
				          </div>
			          </div>
			        </div>
			      </li>

			      <li class="p-list__item">
			        <div class="p-list__item__label">
			          <span class="required"></span>動画リンク
			        </div>
			        <div class="p-list__item__data">
			        <div class="l-12 l-12--gap8">
			          <div class="c-input c-input--full">
			            <input type="text" class="c-input--link" placeholder="">
			          </div>
			        </div>
						</li>
						<li class="p-list__item">
			        <div class="p-list__item__label">
			          <span class="required"></span>問題内容
			        </div>
			        <div class="p-list__item__data">
			        <div class="l-12">
			          <textarea placeholder="問題内容の記入をお願いします" rows="5" maxlength="500" name="pr" cols="50" style=""></textarea>
			        </div>
			      </li>

			      <li class="p-list__item">
			        <div class="p-list__item__label">
			          <span class="required"></span>問題画像
			        </div>
			        <ul class="p-list__item__fileList">
				        <li class="reply">
					        <div class="p-list__item__data">
						        <div class="c-input c-input--file c-input--file--four">
											<label for="postImage__main_01" id="main-image" class="c-image c-image--round imageUpload" style="">
											<input id="postImage__main_01" accept="image/*" enctype="multipart/form-data" class="file_img_preview" name="photo_file[]" type="file">
											<input name="" type="hidden" value="">
											</label>
		          			</div>
					        </div>
				        </li>
				        <li class="reply">
					        <div class="p-list__item__data">
						        <div class="c-input c-input--file c-input--file--four">
											<label for="postImage__main_02" id="main-image" class="c-image c-image--round imageUpload" style="">
											<input id="postImage__main_02" accept="image/*" enctype="multipart/form-data" class="file_img_preview" name="photo_file[]" type="file">
											<input name="" type="hidden" value="">
											</label>
		          			</div>
					        </div>
				        </li>
				        <li class="reply">
					        <div class="p-list__item__data">
						        <div class="c-input c-input--file c-input--file--four">
											<label for="postImage__main_03" id="main-image" class="c-image c-image--round imageUpload" style="">
											<input id="postImage__main_03" accept="image/*" enctype="multipart/form-data" class="file_img_preview" name="photo_file[]" type="file">
											<input name="" type="hidden" value="">
											</label>
		          			</div>
					        </div>
				        </li>
				        <li class="reply">
					        <div class="p-list__item__data">
						        <div class="c-input c-input--file c-input--file--four">
											<label for="postImage__main_04" id="main-image" class="c-image c-image--round imageUpload" style="">
											<input id="postImage__main_04" accept="image/*" enctype="multipart/form-data" class="file_img_preview" name="photo_file[]" type="file">
											<input name="" type="hidden" value="">
											</label>
		          			</div>
					        </div>
				        </li>
			        </ul>
						</li>

						<li class="p-list__item">
			        <div class="p-list__item__label">
			          <span class="required"></span>問題テキスト
			        </div>
			        <ul class="p-list__item__textList">
				        <li class="reply">
					        <div class="p-list__item__data">
					        	<div class="l-12 l-12--gap8">
					          	<div class="c-input c-input--full">
					            	<input type="text">
					          	</div>
					        	</div>
					        </div>
				        </li>
				        <li class="second">
					        <div class="p-list__item__data">
					        	<div class="l-12 l-12--gap8">
					          	<div class="c-input c-input--full">
					            	<input type="text">
					          	</div>
					        	</div>
					        </div>
				        </li>
								<li class="third">
					        <div class="p-list__item__data">
					        	<div class="l-12 l-12--gap8">
					          	<div class="c-input c-input--full">
					            	<input type="text">
					          	</div>
					        	</div>
					        </div>
				        </li>
								<li class="fourth">
					        <div class="p-list__item__data">
					        	<div class="l-12 l-12--gap8">
					          	<div class="c-input c-input--full">
					            	<input type="text">
					          	</div>
					        	</div>
					        </div>
				        </li>
			        </ul>
			      </li>

			    </ul>
			  </div>



			  <div class="l-12__6">
			    <ul class="p-list {{ $class ?? '' }}">
			      <li class="p-list__item">
			        <div class="p-list__item__label">
			          <span class="required"></span>解答解説
			        </div>
			        <div class="p-list__item__data">
			        <div class="l-12">
			          <textarea placeholder="回答解説の記入をお願いします" rows="5" maxlength="500" name="pr" cols="50" style=""></textarea>
			        </div>
			      </li>
						<li class="p-list__item">
			        <div class="p-list__item__label">
			          <span class="required"></span>解答結果
			        </div>
			        <div class="p-list__item__data">
			        <div class="l-12 l-12--gap8">
			          <div class="c-input c-input--full">
				          <div class="l-12__6">
				            <div class="c-input c-input--radio">
				              <input id="reply" name="answer" type="radio" value="1" checked="checked">
				              <label for="reply">1</label>
				            </div>
				          </div>
				          <span class="unit_min"></span>
				          <div class="l-12__6">
				            <div class="c-input c-input--radio">
				              <input id="second" name="answer" type="radio" value="2">
				              <label for="second">2</label>
				            </div>
				          </div>
				          <span class="unit_min"></span>
				          <div class="l-12__6">
				            <div class="c-input c-input--radio">
				              <input id="third" name="answer" type="radio" value="3">
				              <label for="third">3</label>
				            </div>
				          </div>
				          <span class="unit_min"></span>
				          <div class="l-12__6">
				            <div class="c-input c-input--radio">
				              <input id="fourth" name="answer" type="radio" value="4">
				              <label for="fourth">4</label>
				            </div>
				          </div>
			          </div>
			        </div>
			      </li>
			    </ul>
			  </div>
			</div>
		</div>
	</li>
</div>


<script>
	$(function(){
	  $('.p-questionForm > li').click(function(){
	    $(this).find('.p-questionForm > li').slideToggle();
	    $(this).toggleClass("js-show");
	  });
	});

  $(document).ready(function() {
    $(".btn-success").click(function(){
        var lsthmtl = $(".clone").html();
        $(".increment").after(lsthmtl);
    });
    $("body").on("click",".btn-danger",function(){
        $(this).parents(".hdtuto control-group lst").remove();
    });
  });
</script>

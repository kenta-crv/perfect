
//名前空間
const AceAnimationFunc = {
  intervalId : false,
  animationPlay:function(view,quizid,questionseq,answer, _callbackfunc){


    switch (view){
      case 'display':
        console.log('display');
        window.scrollTo(0,0);
        $('.p-problem').animate({ scrollTop: top }, 1);

        AceSoundEffect.bgmPlay('q'+questionseq);

        var n = 1;//nの初期値を1とする
        var s = $(".questiontext").text();
        var len = s.length;
        $(".questiontext").text('');

        var tl = gsap.timeline();
        tl.fromTo(".l_main", {scaleX: 2,scaleY: 2}, {duration: 0.3, scaleX: 1,scaleY: 1,ease:Back.easeOut});
        tl.fromTo(".c-textarea", {scaleX: 2,scaleY: 2,alpha:0}, {duration: 0.3, scaleX: 1,scaleY: 1,alpha:1,ease:Back.easeOut,
          onStart:function(){AceSoundEffect.sePlay('question');},
          onComplete:function(){
            var titleId = setInterval(function(){
              $(".questiontext").text(s.slice(0,n));
              if(n < len){
                n++;
              } else{
                clearInterval(titleId);
                s=null;
              }
            },50);
            AceAnimationFunc.intervalId = titleId;
            AceSoundEffect.acterPlay('q'+questionseq);

          },
        },"-=0.2");
        tl.fromTo(".q-image", {scaleX: 3,scaleY: 3,alpha:0}, {duration: 0.3, scaleX: 1,scaleY: 1,alpha:1,ease:Back.easeOut},"-=0.2");
        tl.fromTo($('.p-choice__list li:eq(0)'), {x: 100,alpha:0}, {duration: 0.3, x: 0,alpha:1,ease:Back.easeOut});
        tl.fromTo($('.p-choice__list li:eq(1)'), {x: -100,alpha:0}, {duration: 0.3, x: 0,alpha:1,ease:Back.easeOut},"-=0.2");
        tl.fromTo($('.p-choice__list li:eq(2)'), {x: 100,alpha:0}, {duration: 0.3, x: 0,alpha:1,ease:Back.easeOut},"-=0.2");
        tl.fromTo($('.p-choice__list li:eq(3)'), {x: -100,alpha:0}, {duration: 0.3, x: 0,alpha:1,ease:Back.easeOut},"-=0.2");
        tl.fromTo($('.timeWatch'), {scaleX: 3,scaleY: 3,alpha:0}, {duration: 0.1, scaleX: 1,scaleY: 1,alpha:1,ease:Back.easeOut,onComplete:function(){
            _callbackfunc();
          }});
        break;
      case 'answer':
        var tl = gsap.timeline();

        tl.fromTo(".p-problem", {scaleX: 3,scaleY: 3,alpha:0}, {duration: 0.3, scaleX: 1,scaleY: 1,alpha:1,ease:Back.easeOut},"-=0.2");
        AceSoundEffect.bgmPlay('q'+questionseq);

        if(answer == true){
          AceSoundEffect.sePlay('correct');
        }else{
          AceSoundEffect.sePlay('un_correct');
        }
        break;
      case 'finish':
        AceSoundEffect.bgmPause();
        AceSoundEffect.bgmPlay('q-musicC');

        var tl = gsap.timeline();
        tl.fromTo(".p-problem", {alpha:0}, {duration: 0.3, alpha:1});
        //tl.fromTo(".p-commentary--head", {scaleX: 2,scaleY: 2,alpha:0}, {duration: 0.5, scaleX: 1,scaleY: 1,alpha:1,ease:Back.easeOut});
        tl.fromTo(".l-container__sp", {alpha:0}, {duration: 0.5, alpha:1});
        tl.fromTo(".result", {alpha:0}, {duration: 0.5, alpha:1});
        tl.fromTo(".p-commentary--body", {alpha:0}, {duration: 0.5, alpha:1});
        tl.fromTo(".p-commentary--foot", {alpha:0}, {duration: 0.5, alpha:1,onComplete:function(){
          _callbackfunc();
        }});

        break;

      case 'displayMovie':
        window.scrollTo(0,0);
        $('.p-problem').animate({ scrollTop: top }, 1);
        $('.playvolume').css('display','none');
        AceSoundEffect.bgmPause();
        break;

      case 'answerMovie':
        window.scrollTo(0,0);
        $('.p-problem').animate({ scrollTop: top }, 1);
        $('.playvolume').css('display','none');
        AceSoundEffect.bgmPause();
        break;

      case 'startMovie':
        $('.playvolume').css('display','none');
        AceSoundEffect.bgmPause();
        break;

      case 'endMovie':
        $('.playvolume').css('display','none');
        AceSoundEffect.bgmPause();
        break;

    }

    //debug
    // console.log('View：'+view);
    // console.log('Quizid：'+quizid);
    // console.log('Questionseq：'+questionseq);
    // console.log('Answer：'+answer);
  },
  pauseCurrentTitle : function(){
    if(this.intervalId){
      clearInterval(this.intervalId);
    }
  }
}

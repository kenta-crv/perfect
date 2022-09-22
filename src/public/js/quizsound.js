//名前空間
const AceSoundEffect = {
  //properties
  bgmfile:{files:[]},
  sefile:{files:[]},
  acterfilelist:{files:[]},
  selectbgmname:'q-musicB',
  mutebool:true,
  //Method
  init:function(bgmfilejson,sefilejson,acterfilelist){
    if(bgmfilejson){
      this.bgmfile = bgmfilejson;
    }else{
      this.bgmfile = this.bgmfile;
    }

    if(sefilejson){
      this.sefile = sefilejson;
    }else{
      this.sefile = this.sefile;
    }

    if(acterfilelist){
      this.acterfilelist = acterfilelist;
    }else{
      this.acterfilelist = this.acterfilelist;
    }

  },
  loadFile:function(){
    //BGMファイル
    if(this.bgmfile.files.length){
      for(var i=0;i<this.bgmfile.files.length;i++){
        this.bgmfile.files[i].HowlObj = new Howl({
          src: this.bgmfile.files[i].soundpath,
          html5: true,
          volume:this.bgmfile.files[i].volume,
          loop: this.bgmfile.files[i].loop
        });
      }
    }


    //SEファイル
    if(this.sefile.files.length) {
      for (var i = 0; i < this.sefile.files.length; i++) {
        this.sefile.files[i].HowlObj = new Howl({
          src: this.sefile.files[i].soundpath,
          html5: true,
          volume: this.sefile.files[i].volume,
          loop: this.sefile.files[i].loop
        });
      }
    }

    //問題読み上げ
    if(this.acterfilelist.files.length) {
      for (var i = 0; i < this.acterfilelist.files.length; i++) {
        this.acterfilelist.files[i].HowlObj = new Howl({
          src: this.acterfilelist.files[i].soundpath,
          html5: true,
          volume: this.acterfilelist.files[i].volume,
          loop: this.acterfilelist.files[i].loop
        });
      }
    }
  },
  bgmPlay:function(name){
    const target = this.bgmfile.files.find((bgm) => {
      return (bgm.name === name);
    });

    if(!target){
      console.log('BGMが見つかりませんでした');
    }else{

      //BGMSwitcher
      if(this.selectbgmname && this.selectbgmname !== name){
        const pevtarget = this.bgmfile.files.find((bgm) => {
          return (bgm.name === this.selectbgmname);
        });

        if(!pevtarget){
          console.log('BGMが見つかりませんでした');
        }else {
          pevtarget.HowlObj.stop();
        }
      }

      if(!target.HowlObj.playing()){
        target.HowlObj.play();
        this.selectbgmname = name;
      }

    }

  },
  bgmPause:function(){
    const target = this.bgmfile.files.find((bgm) => {
      return (bgm.name === this.selectbgmname);
    });

    if(!target){
      console.log('BGMが見つかりませんでした');
    }else{
      target.HowlObj.pause();
    }

  },
  sePlay:function(name){
    const target = this.sefile.files.find((se) => {
      return (se.name === name);
    });

    if(!target){
      console.log('SEが見つかりませんでした');
    }else {
      target.HowlObj.play();
    }

  },
  acterPlay:function(name){
    const target = this.acterfilelist.files.find((se) => {
      return (se.name === name);
    });

    if(!target){
      console.log('音声が見つかりませんでした');
    }else {
      target.HowlObj.play();
    }

  },
  audioClear:function(){
    this.acterfilelist.files.forEach((se) => {
      se.HowlObj.pause();
    });

  },
  mute:function(boolean){
    Howler.mute(boolean);
    this.mutebool = boolean;
  }

}

<template>
  <div class="qa-wrap" v-if="!!answer">
    <div class="question">
      <span class="-head">?</span>
      <span class="-tip">问：</span>
      <span class="-words">{{question}}</span>
    </div>
    <div class="answer">
      <span class="-head" :style="styleObj" ></span>
      <span class="-tip" >答：</span>
      <span class="-words">{{answer}}</span>
    </div>
  </div>

</template>

<script>
export default {
  data () {
    return {
      
    }
  },
  computed:{
    styleObj(){
      return {
        // background:'url('+this.userinfo.headimgurl+') no-repeat center center',
        background:'url('+this.userinfo.headimgurl+') center center / contain no-repeat',
      }
    }
  },
  props:['question','answer','headimg','userinfo']
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang='less' scoped>
.qa-wrap{
  width: 100%;
  padding: 5px 10px;
  box-sizing: border-box;
  /*background-color: #f7f7ee;*/
  border-bottom: solid 1px #f8f8f8;
  font-size: 13px;
  color: #999;
  word-break: break-all;
  text-align: justify;
  .question{
    display: flex;
    /*align-items: center;*/
    padding: 5px 0;
    .-head{
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #f3c38a;
      height: 30px;
      width: 30px;
      min-width: 30px;
      margin: 0 5px;
      border-radius: 100%;
      color: #fff;
    }
    .-tip{
      min-width: 35px;
      margin-top: 5px;
    }
    .-words{
      margin-top: 5px;
    }
  }
  .answer{
    display: flex;
    /*align-items: center;*/
    padding: 0 0 5px 0;
    .-head{
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #64d;
      height: 30px;
      width: 30px;
      min-width: 30px;
      margin: 0 5px;
      border-radius: 100%;
      
    }
    .-tip{
      min-width: 35px;
      margin-top: 5px;
    }
    .-words{
      margin-top: 5px;
    }
  }
}
</style>

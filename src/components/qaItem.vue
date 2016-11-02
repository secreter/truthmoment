<template>
  <div class="qa-wrap">
    <div class="question">
      <span class="-head">?</span>
      <span class="-tip">问：</span>
      <span class="-words">{{question}}</span>
    </div>
    <div class="answer">
      <span class="-head"></span>
      <span class="-tip">答：</span>
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
  props:['question','answer']
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang='less' scoped>
.qa-wrap{
  width: 100%;
  padding: 10px;
  background-color: #f8f8f8;
  border-bottom: solid 1px #eee;
  .question{
    display: flex;
    align-items: center;
    padding: 5px 0;
    .-head{
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #64d;
      height: 30px;
      width: 30px;
      margin: 0 5px;
      border-radius: 100%;
    }
    .-tip{

    }
    .-words{

    }
  }
  .answer{
    display: flex;
    align-items: center;
    padding: 5px 0;
    .-head{
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #64d;
      height: 30px;
      width: 30px;
      margin: 0 5px;
      border-radius: 100%;
    }
    .-tip{

    }
    .-words{
      
    }
  }
}
</style>

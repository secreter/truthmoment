<template>
  <div class="wrap">
    <div class="reply-wrap" v-for="(item,index) in items">
      <div class="question">
        <div class="-left">
          <span class="-head">?</span>
          <span class="-tip">问：</span>
          <span class="-words">{{item.question}}</span>
        </div>
        <div class="-right" v-if="!item.answer">
          <btn class="-btn -b1" size="small" @click.native="showInput(index)">回复</btn>
        </div>
      </div>
      <div class="answer" v-if="!!item.answer">
        <div class="-up">
          <span class="-head"></span>
          <span class="-tip">答：</span>
          <span class="-words">{{item.answer}}</span>
        </div>
        <div class="-down" v-if="!answerInuptShow[index]">
          <btn class="-btn -b2" size="small" @click.native="del(item,index)">删除</btn>
          <btn class="-btn -b3" size="small"  @click.native="showInput(index)">编辑</btn>
        </div>
      </div>
      <div class="text-input" v-if="answerInuptShow[index]">
        <div class="-up">
          <textarea required class="-input" v-model="answerArr[index]"></textarea>
        </div>
        <div class="-down">
          <btn class="-btn -b4" size="small" @click.native="update(item,answerArr[index],index)">确定</btn>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
import {update_item} from '../api/request'
import { Button } from 'mint-ui'
export default {
  data () {
    return {
      db: {},
      answerArr:[],
      answerInuptShow:[]
    }
  },
  props: ['items'],
  mounted(){
    this.init()
  },
  // props:['question','answer'],
  components: {
    btn: Button
  },
  methods: {
    init(){
      
    },
    update(item,answer,index){
      // let obj={
      //   id:'',
      //   parentid:'',
      //   question:'',
      //   answer:'',
      //   ip:'',
      //   time:'',
      // }
      if(!answer||!answer.toString().trim())
        return
      this.items[index]['answer']=answer
      update_item(item.id,answer)
      .then((result) => {
        console.log(result)
      })
      .catch((e) => {
        console.error(e)
      })
      if(index!==undefined){
        this.hideInput(index)
      }
    },
    del(item,index){
      this.items[index]['answer']=''
      update_item(item.id,'')
      .then((result) => {
        console.log(result)
      })
      .catch((e) => {
        console.error(e)
      })
    },
    showInput(index){
      this.answerInuptShow.splice(index,1,true)
    },
    hideInput(index){
      this.answerInuptShow.splice(index,1,false)
      console.log(index)
    }

  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang='less' scoped>
.reply-wrap{
  width: 100%;
  padding: 10px;
  background-color: #f8f8f8;
  border-bottom: solid 1px #eee;
  box-sizing: border-box;
  .question{
    display: flex;
    align-items: center;
    padding: 5px 0;
    justify-content: space-between;
    .-left{
      display: flex;
      align-items: center;
    }
    .-head{
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #f3c38a;
      height: 30px;
      width: 30px;
      margin: 0 5px;
      border-radius: 100%;
      color: #fff;
    }
    .-tip{

    }
    .-words{

    }
    .-b1{
      background-color: #5aa8dd;
    }
  }
  .answer{
    display: flex;
    padding: 5px 0;
    flex-direction: column;
    .-up{
      display: flex;
      flex-direction: row;
      align-items: center;
    }
    .-down{
      display: flex;
      justify-content: flex-end;
    }
    .-head{
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #f3c38a;
      height: 30px;
      width: 30px;
      margin: 0 5px;
      border-radius: 100%;
    }
    .-tip{

    }
    .-words{
      
    }
    .-b2{
      background-color: #f54237;
    }
    .-b3{
      background-color: #ffe957;
    }

  }
  .text-input{
    display: flex;
    padding: 5px 0;
    flex-direction: column;
    .-up{
      display: flex;
      flex-direction: row;
      align-items: center;
      .-input{
        width: 100%;
        margin: 10px;
        height: 50px;
        padding: 5px 10px;
      }
    }
    .-down{
      display: flex;
      justify-content: flex-end;
    }
    .-b4{
      background-color: #5aa8dd;
    }
  }
  .-btn{
    padding: 0 5px;
    font-size: 14px;
    height: 30px;
    border-radius: 2px;
    align-self: flex-end;
    margin-left: 5px;
    color: #fff;
  }

}
</style>

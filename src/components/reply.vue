<template>
  <div class="wrap">
    <div class="reply-wrap" v-for="(item,index) in dataArr">
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
          <btn class="-btn -b2" size="small" @click.native="del(item)">删除</btn>
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
import IndexDB from '../api/IndexDB'
import { Button } from 'mint-ui'
export default {
  data () {
    return {
      db: {},
      dataArr: [],
      answerArr:[],
      answerInuptShow:[]
    }
  },
  mounted(){
    this.init()
  },
  // props:['question','answer'],
  components: {
    btn: Button
  },
  methods: {
    init(){
      let dbObj=new IndexDB()
      let vm=this
      vm.dataArr.length=0
      dbObj.open("truthMoment",1,"qa_data","userid")
      .then((db) => {
        vm.db=db
        let store = vm.db.transaction(["qa_data"],"readonly").objectStore("qa_data")
        //在当前对象仓库里面建立一个读取光标（cursor）
        let cursor = store.openCursor()
        cursor.onsuccess = function(e) {
          var res = e.target.result;
          if(res) {
            // console.log("Key", res.key);
            // console.log("Data", res.value);
            console.log(vm.dataArr)

            vm.dataArr.push(res.value)
            res.continue()
          }
        }
      })
      .catch((e) => {
        console.warn(e)
      })
    },
    update(item,answer,index){
      // let obj={
      //   userid:this.userid++,
      //   nickname:'',
      //   sex:'',
      //   question:this.question,
      //   answer:''
      // }
      if(!answer||!answer.toString().trim())
        return
      let store = this.db.transaction(["qa_data"],"readwrite").objectStore("qa_data")
      item.answer=answer
      let request = store.put(item)
      request.onerror = function(e) {
           console.error("Error",e.target.error.name);
      }
      request.onsuccess = function(e) {
          console.log("数据修改成功！");
      }
      if(index!==undefined){
        this.hideInput(index)
      }
    },
    del(item){
      let store = this.db.transaction(["qa_data"],"readwrite").objectStore("qa_data")
      item.answer=''
      let request = store.put(item)
      request.onerror = function(e) {
           console.error("Error",e.target.error.name);
      }
      request.onsuccess = function(e) {
          console.log("评论删除成功！");
      }
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

<template>
  <div id="app">
    <tab-container v-model="active">
      <tab-container-item id="tab-container1">
        <head-img></head-img>
        <qa-item v-for="n in 5"></qa-item> 
        <div class="btn-wrap">
          <span class="btn" @click="page2">我要提问</span>
          <span class="btn" @click="page3">挑战真心话</span>
          
          <!-- <btn class="btns" size="small" color="#ffe957" type="primary" @click.native="page2">我要提问</btn>
          <btn class="btns" size="small" type="primary" @click.native="page2">加入真心话</btn> -->

        </div>
        <Subscribe></Subscribe>
      </tab-container-item>
      <tab-container-item id="tab-container2">
        <mt-header class="headbar" title="真心话大拷问">
          <btn slot="left" icon="back" @click.native="page1">
          </btn>
        </mt-header> 
        <ask></ask>
        <Subscribe></Subscribe>
      </tab-container-item>
      <tab-container-item id="tab-container3">
        <mt-header  title="挑战真心话">
          <btn slot="left" icon="back" @click.native="page1">
          </btn>
        </mt-header>
      </tab-container-item>
    </tab-container>
    
  </div>
</template>

<script>
import HeadImg from './components/HeadImg'
import QaItem from './components/qaItem'
import Subscribe from './components/Subscribe'
import Ask from './components/Ask'
import { Button, Cell, Popup, TabContainer, TabContainerItem, Badge ,Header   } from 'mint-ui'

export default {
  data(){
    return {
      active: 'tab-container1'
    }
  },
  name: 'app',
  components: {
    Btn: Button, 
    Cell, 
    Popup, 
    TabContainer, 
    TabContainerItem,
    HeadImg,
    QaItem,
    Badge,
    Subscribe,
    'mt-header': Header,
    Ask
  },
  methods:{
    page1(){
      this.active = 'tab-container1'
    },
    page2(){
      this.active = 'tab-container2'
    },
    page3(){
      this.active = 'tab-container3'
    }
  }
}
</script>

<style>
.headbar{
  color: #fff !important;
}
.btn-wrap{
  background-color: #eee;
  padding: 15px;
}
.btns{
  width: 100%;
  margin: 5px 0;
  background-color: #ffe957;
  color: #fff;
}
.btn{
  display: flex;
  background-color: #ffe957;
  justify-content: center;
  align-items: center;
  padding: 5px 10px;
  margin: 5px 0;
  box-shadow: 0 0 1px rgba(0,0,0,0.2);
  /*color: #fff;*/

}
.btn:active{
  opacity: 0.8;
}
</style>

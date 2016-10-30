<template>
  <div id="app">
    <tab-container v-model="active">
      <tab-container-item id="tab-container1">
        <head-img></head-img>
        <cell v-for="n in 10" title="tab-container 1">n</cell>
      </tab-container-item>
      <tab-container-item id="tab-container2">sds
        <cell v-for="n in 5" title="tab-container 2">2</cell>
      </tab-container-item>
      <tab-container-item id="tab-container3">
        <cell v-for="n in 7" title="tab-container 3"></cell>
      </tab-container-item>
    </tab-container>
    <btn @click.native="page2">dssd</btn>
  </div>
</template>

<script>
import HeadImg from './components/HeadImg'
import { Button, Cell, Popup, TabContainer, TabContainerItem  } from 'mint-ui'

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
    HeadImg
  },
  methods:{
    page2(){
      console.log(this)
      this.active = 'tab-container2'
    }
  }
}
</script>

<style>

</style>

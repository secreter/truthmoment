import Vue from 'vue'
import App from './App'
import css from './index.less'

/* eslint-disable no-new */
var vm=new Vue({
  el: '#app',
  template: '<App/>',
  components: { App }
})

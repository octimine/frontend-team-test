import Vue from 'vue'
import App from './App'
import router from './router'

require('./includes')

/* eslint-disable no-new */
new Vue({
  router,
  el: '#app',
  template: '<App/>',
  components: { App }
})

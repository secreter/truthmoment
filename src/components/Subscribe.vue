<template>
	<div class="subscribe" @click="go">
    <span>关注南开一梦发现更多有趣<badge type="error">9</badge></span>
    <span>👉</span>
  </div>
</template>
<script>
import { Badge   } from 'mint-ui'
export default{
	data(){
		return {

		}
	},
	components: {
		Badge
	},
	methods: {
		go(){
			location.href="http://mp.weixin.qq.com/s?__biz=MzIzNjE4NDI5Nw==&mid=2650650183&idx=1&sn=d23fdadc0380cb40399c525479e56cb8#rd"
		}
	}
}
</script>
<style lang='less'>
	.subscribe{
		padding: 15px 10px;
		margin-top: 10px;
		display: flex;
		justify-content: space-between;
		border-top:solid 1px #eee;
		border-bottom:solid 1px #eee;
		font-size: 13px;
		color: #999;
	}
</style>
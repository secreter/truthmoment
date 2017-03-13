<template>
	<div class="subscribe" >
    <span>@<a class="-link" @click="go">“ 南开一梦 ”</a>出品 |<a class="-link" @click="go2tv">免流量电视</a><!-- <badge type="error">9</badge> --></span>
    <!-- <span>👉</span> -->
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
		},
		go2tv(){
			location.href="http://item.redream.cn/mobile_tv/#/"
		}
	}
}
</script>
<style lang='less'>
	.subscribe{
		padding: 15px 10px;
		margin-top: 10px;
		display: flex;
		justify-content: center;
		border-top:solid 1px #eee;
		border-bottom:solid 1px #eee;
		font-size: 12px;
		color: #999;
		.-link{
			color:#0066cc;
			text-decoration: underline;
		}
	}
</style>
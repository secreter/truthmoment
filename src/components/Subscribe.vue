<template>
	<div class="subscribe">
    <span>关注redream实时查看回复<badge type="error">9</badge></span>
    <span>></span>
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
	}
}
</script>
<style lang='less'>
	.subscribe{
		padding: 15px 10px;
		display: flex;
		justify-content: space-between;
		border-top:solid 1px #eee;
		border-bottom:solid 1px #eee;
	}
</style>
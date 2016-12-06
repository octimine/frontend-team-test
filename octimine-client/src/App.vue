
<template>
    <div id="app">
        <MfHeader></MfHeader>

		<router-view></router-view>
    </div>
</template>

<script>
import MfHeader from './components/header.vue'

export default {
  components: { MfHeader }
}

</script>


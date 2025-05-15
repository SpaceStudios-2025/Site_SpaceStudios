<script setup>
  import MenuDashboard from '@/components/Admin/MenuDashboard.vue';
</script>

<template>
  <div>
    <MenuDashboard/>
    <!-- <NewsDashboard/> -->
    <router-view v-slot="{ Component }">
      <component :is="Component" @sendInfo="handleInfo"/>
    </router-view>
  </div>
</template>
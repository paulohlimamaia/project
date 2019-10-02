<template>
  <div class="dashboard-editor-container">
    <el-button type="primary" icon="el-icon-download" @click="exportLayout">
      Exportar
    </el-button>
  </div>
</template>

<script>
export default {
  methods: {
    exportLayout(){
      console.log('teste');
    },
  },
};
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
  .dashboard-editor-container {
    text-align: center;
    padding-top: 100px;
  }
</style>

<template>
  <div class="dashboard-editor-container">
    <el-upload
      :data="fileData"
      :multiple="false"
      class="file-uploader"
      drag
      action="http://localhost:8000/api/files"
      :on-success="handleSuccess"
    >
      <i class="el-icon-upload" />
      <div class="el-upload__text">
        Arraste ou <em>clique para realizar o upload</em>
      </div>
    </el-upload>
  </div>
</template>

<script>
export default {
  data() {
    return {
      fileData: {},
    };
  },
  methods: {
    emitInput(val) {
      this.$emit('input', val);
    },
    handleSuccess(response){
      if(response.message === "success"){
        this.$router.push('/files');
      }
    },
  },
};
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
  .dashboard-editor-container {
    text-align: center;
    padding-top: 100px;
  }

  input[type='file']{
    display: none;
  }
</style>

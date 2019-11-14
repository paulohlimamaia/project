<template>
<!-- action="http://ssintegra.moraesdigital.com/api/files" -->
  <div class="dashboard-editor-container">
    <el-upload
      :data="fileData"
      :multiple="false"
      class="file-uploader"
      drag
      action="http://ssintegra.moraesdigital.com/api/files"
      :on-success="handleSuccess"
      :on-error="handleError"
    >
      <i class="el-icon-upload" />
      <div class="el-upload__text">
        Arraste ou <em>clique para upload de <strong>arquivo</strong> de Receita</em>
      </div>
      <div slot="tip" class="el-upload__tip">Arquivo de dados (.BAL)</div>
    </el-upload>

    <br><br><br>

    <el-upload
      :data="fileData"
      :multiple="false"
      class="file-uploader"
      drag
      action="http://ssintegra.moraesdigital.com/api/files/receitas"
      :on-success="handleSuccess"
      :on-error="handleError"
    >
      <i class="el-icon-upload" />
      <div class="el-upload__text">
        Arraste ou <em>clique para upload de <strong>layout</strong> de Receita</em>
      </div>
      <div slot="tip" class="el-upload__tip">Arquivo template para exportação (.IMPT)</div>
    </el-upload>
    
  </div>
</template>

<script>
import { Message } from 'element-ui';

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
      if (response.message === 'success'){
        this.$router.push('/receitas/lista');
      }
    },
    handleError(error){
      Message({
          message: 'Tipo de Arquivo Inválido!',
          type: 'error',
          duration: 5 * 1000,
      });
    }
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

<template>
  <div>
    <div style="text-align:center;justify-content:center;padding-top:100px;">

      <h3>Selecione um Exercício e um Layout de Exportação</h3>

      <el-select v-model="exercicio" placeholder="Exercício"
      no-data-text="Carregue um arquivo de Receita">
        <el-option
          v-for="exercicio in exercicios"
          :key="exercicio"
          :label="exercicio"
          :value="exercicio"
        />
      </el-select>

      <el-select v-model="layout" placeholder="Layout"
      no-data-text="Carregue um layout de Receita">
        <el-option
          v-for="layout in layouts"
          :key="layout.cod"
          :label="layout.name"
          :value="layout.id"
        />
      </el-select>

      </div>

      <div style="text-align:center;justify-content:center;padding-top:20px;">
        <el-button
          @click="limpar()"
        >Limpar</el-button>

        <el-button
          type="primary"
          :loading="loadingGerar"
          @click="handleGerar()"
        >Gerar</el-button>
      </div>

      <el-dialog
      title="Arquivo"
      :visible.sync="dialogArquivo">
        <el-input
          type="textarea"
          :rows="30"
          :readonly="true"
          v-model="filecontent">
        </el-input>

        <br>

        <div style="text-align:right;padding-top:15px">
          <el-button
            type="primary"
            @click="downloadFile()"
          >Download</el-button>
        </div>
      </el-dialog>
  </div>
</template>

<script>
import http from '@/utils/request';
import { Message } from 'element-ui';

export default {
  data(){
    return {
      loadingGerar: false,
      dialogArquivo: false,
      filecontent: '',
      filename: '',
      exercicio: '',
      exercicios: [],
      layout: '',
      layouts: [],
    }
  },
  mounted(){
    let self = this;


    http.get('exportacoes/receitas').then(function(response) {
      response.data.forEach(element => {
          self.exercicios.push(element);
      });
    });

    http.get('exportacoes/layouts?tipo=RECEITA').then(function(response) {
      response.data.forEach(element => {
          self.layouts.push(element);
      });
    });
  },
  methods: {
    limpar(){
      const self = this;
      self.year = '';
      self.month = '';
    },
    handleGerar(){
      let self = this;

      if(!self.exercicio){
          Message({
              message: 'Selecione um Exercício!',
              type: 'error',
              duration: 5 * 1000,
          });
      } else if(!self.layout){
          Message({
              message: 'Selecione um Layout!',
              type: 'error',
              duration: 5 * 1000,
          });
      } else {
        self.loadingGerar = true;

        let form = {
            exercicio: self.exercicio,
            layout: self.layout
        };

        http.post('exportacoes/receitas', form).then(function(response){
          self.loadingGerar = false;
          self.filecontent = response.file;
          self.filename = response.filename;
          self.dialogArquivo = true;
        });
      }
    },
    downloadFile(){
      let self = this
      var element = document.createElement('a');
      element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(self.filecontent));
      element.setAttribute('download', self.filename);

      element.style.display = 'none';
      document.body.appendChild(element);

      element.click();

      document.body.removeChild(element);
    }
  }
};
</script>

<style>
  h3{
    color: gray;
  }
</style>

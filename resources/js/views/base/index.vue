<template>
  <div>

    <div style="text-align:center;justify-content:center;padding-top:50px;">
      <el-select v-model="funcao" placeholder="Função" @change="getSubFuncoes">
        <el-option
          v-for="funcao in funcoes"
          :key="funcao.value"
          :label="funcao.value"
          :value="funcao.value"
        />
      </el-select>

      <el-select v-model="subfuncao" placeholder="SubFunção" @change="getFuncoes">
        <el-option
          v-for="subfuncao in subfuncoes"
          :key="subfuncao.value"
          :label="subfuncao.value"
          :value="subfuncao.value"
        />
      </el-select>

      <el-select v-model="exercicio" placeholder="Exercicio">
        <el-option
          v-for="exercicio in exercicios"
          :key="exercicio.value"
          :label="exercicio.value"
          :value="exercicio.value"
        />
      </el-select>

    </div>

    <div style="text-align:center;justify-content:center;padding-top:50px;">
      <el-button
        type="primary"
        :loading="loading"
        @click="handleConsulta()"
      >Consultar</el-button>

      <el-button
        :loading="loading"
        @click="limpar()"
      >Limpar Consulta</el-button>
    </div>

    <br>

    <el-table
      v-show="loaded"

      :data="sim302"
      height="675"
      style="width: 100%"
    >
      <el-table-column
        prop="tpdocument"
        label="tpdocument"
        width="105%"
      />

      <el-table-column
        prop="cdtcmce"
        label="cdtcmce"
        width="105%"
      />

      <el-table-column
        prop="dtverorca"
        label="dtverorca"
        width="105%"
      />

      <el-table-column
        prop="cdorgao"
        label="cdorgao"
        width="105%"
      />

      <el-table-column
        prop="cdunidade"
        label="cdunidade"
        width="105%"
      />

      <el-table-column
        prop="cdfuncao"
        label="cdfuncao"
        width="105%"
      />

      <el-table-column
        prop="cdsubfunc"
        label="cdsubfunc"
        width="105%"
      />

      <el-table-column
        prop="cdprograma"
        label="cdprograma"
        width="105%"
      />

      <el-table-column
        prop="cdproj1"
        label="cdproj1"
        width="105%"
      />

      <el-table-column
        prop="cdproj2"
        label="cdproj2"
        width="105%"
      />

      <el-table-column
        prop="cdsubproj"
        label="cdsubproj"
        width="105%"
      />

      <el-table-column
        prop="cdcedporca"
        label="cdcedporca"
        width="105%"
      />

      <el-table-column
        prop="tpfore_sim"
        label="tpfore_sim"
        width="105%"
      />

      <el-table-column
        prop="cdfont_sim"
        label="cdfont_sim"
        width="105%"
      />

      <el-table-column
        prop="dtrefedocu"
        label="dtrefedocu"
        width="105%"
      />

      <el-table-column
        prop="tpbalatcm"
        label="tpbalatcm"
        width="105%"
      />

      <el-table-column
        prop="vlprevorca"
        label="vlprevorca"
        width="105%"
      />

      <el-table-column
        prop="vlsuplemes"
        label="vlsuplemes"
        width="105%"
      />

      <el-table-column
        prop="vlsupletot"
        label="vlsupletot"
        width="105%"
      />

      <el-table-column
        prop="vlanulmes"
        label="vlanulmes"
        width="105%"
      />

      <el-table-column
        prop="vlanultot"
        label="vlanultot"
        width="105%"
      />

      <el-table-column
        prop="vlsubtrmes"
        label="vlsubtrmes"
        width="105%"
      />

      <el-table-column
        prop="vlsubtrtot"
        label="vlsubtrtot"
        width="105%"
      />

      <el-table-column
        prop="vlacresmes"
        label="vlacresmes"
        width="105%"
      />

      <el-table-column
        prop="vlacrestot"
        label="vlacrestot"
        width="105%"
      />

      <el-table-column
        prop="saldodota"
        label="saldodota"
        width="105%"
      />

      <el-table-column
        prop="vlempemes"
        label="vlempemes"
        width="105%"
      />

      <el-table-column
        prop="vlempetot"
        label="vlempetot"
        width="105%"
      />

      <el-table-column
        prop="vlaempmes"
        label="vlaempmes"
        width="105%"
      />

      <el-table-column
        prop="vlaemptot"
        label="vlaemptot"
        width="105%"
      />

      <el-table-column
        prop="empeapag"
        label="empeapag"
        width="105%"
      />

      <el-table-column
        prop="vlliqmes"
        label="vlliqmes"
        width="105%"
      />

      <el-table-column
        prop="vlliqtot"
        label="vlliqtot"
        width="105%"
      />

      <el-table-column
        prop="vlaliqmes"
        label="vlaliqmes"
        width="105%"
      />

      <el-table-column
        prop="vlaliqtot"
        label="vlaliqtot"
        width="105%"
      />

      <el-table-column
        prop="vlpagmes"
        label="vlpagmes"
        width="105%"
      />

      <el-table-column
        prop="vlpagtot"
        label="vlpagtot"
        width="105%"
      />

      <el-table-column
        prop="vlapagmes"
        label="vlapagmes"
        width="105%"
      />

      <el-table-column
        prop="vlapagtot"
        label="vlapagtot"
        width="105%"
      />

      <el-table-column
        prop="vlsubftmes"
        label="vlsubftmes"
        width="105%"
      />

      <el-table-column
        prop="vlsubfttot"
        label="vlsubfttot"
        width="105%"
      />

      <el-table-column
        prop="vlacrftmes"
        label="vlacrftmes"
        width="105%"
      />

      <el-table-column
        prop="vlacrfttot"
        label="vlacrfttot"
        width="105%"
      />

      <el-table-column
        prop="nuregi"
        label="nuregi"
        width="105%"
      />

      <el-table-column
        prop="dtenvio"
        label="dtenvio"
        width="105%"
      />

      <el-table-column
        prop="regimpor"
        label="regimpor"
        width="105%"
      />

    </el-table>
  </div>
</template>

<script>
import http from '@/utils/request';
import { Message } from 'element-ui';

export default {
  data(){
    return {
      sim302: '',
      loading: false,
      loaded: false,
      funcoes: [],
      subfuncoes: [],
      exercicios: [],
      funcao: '',
      subfuncao: '',
      exercicio: '',
    };
  },
  mounted(){
    const self = this;
    self.getData();
  },
  methods: {

    getData(){
      const self = this;

      http.get('sim/302/funcoes').then(function(response){
        response.data.forEach(funcao => {
          self.funcoes.push({ value: funcao });
        });
      });

      http.get('sim/302/subfuncoes').then(function(response){
        response.data.forEach(subfuncao => {
          self.subfuncoes.push({ value: subfuncao });
        });
      });

      http.get('sim/302/exercicios').then(function(response){
        response.data.forEach(exercicio => {
          self.exercicios.push({ value: exercicio });
        });
      });
    },

    getSubFuncoes(){
      const self = this;
      self.subfuncoes = [];

      http.get(`sim/302/subfuncoes/${self.funcao}`).then(function(response){
        response.data.forEach(subfuncao => {
          self.subfuncoes.push({ value: subfuncao });
        });
      });
    },

    getFuncoes(){
      const self = this;
      self.funcoes = [];

      http.get(`sim/302/funcoes/${self.subfuncao}`).then(function(response){
        response.data.forEach(funcao => {
          self.funcoes.push({ value: funcao });
        });
      });
    },

    limpar(){
      const self = this;

      self.funcao = '';
      self.subfuncao = '';
      self.exercicio = '';

      self.getData();
    },

    handleConsulta(){
      const self = this;

      var error = false;

      if (!self.funcao){
        error = true;
        Message({
          message: 'Selecione uma Função!',
          type: 'error',
          duration: 2 * 1000,
        });
      } else if (!self.subfuncao){
        error = true;
        Message({
          message: 'Selecione uma SubFunção!',
          type: 'error',
          duration: 2 * 1000,
        });
      } else if (!self.exercicio){
        error = true;
        Message({
          message: 'Selecione um Exercicio!',
          type: 'error',
          duration: 2 * 1000,
        });
      }

      if (!error){
        self.loading = true;

        const request = {
          'funcao': self.funcao,
          'subfuncao': self.subfuncao,
          'exercicio': self.exercicio,
        };

        http.post('sim/302', request).then(function(response){
          self.sim302 = response.data;
          self.loading = false;
          self.loaded = true;
        });
      }
    },
  },
};
</script>

<style>

</style>

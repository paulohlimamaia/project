<template>
  <div>
    <div style="text-align:center;justify-content:center;padding-top:100px;">

      <h3>Selecione um Exercício</h3>

      <el-select v-model="year" placeholder="Ano">
        <el-option
          v-for="year in years"
          :key="year"
          :label="year"
          :value="year"
        />
      </el-select>

      <el-select v-model="month" placeholder="Mês">
        <el-option
          v-for="month in months"
          :key="month"
          :label="month"
          :value="month"
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
  </div>
</template>

<script>
import http from '@/utils/request';

export default {
  data(){
    return {
      loadingGerar: false,
      years: [],
      year: '',
      month: '', 
      months: [
        '01',
        '02',
        '03',
        '04',
        '05',
        '06',
        '07',
        '08',
        '09',
        '10',
        '11',
        '12'
      ],
    }
  },
  mounted(){
    let self = this;

    let currentYear = new Date().getFullYear();
    let startYear = 2000;  
    while ( startYear <= currentYear ) {
        self.years.push(startYear++);
    } 
  },
  methods: {
    limpar(){
      const self = this;
      self.year = '';
      self.month = '';
    },
    handleGerar(){
      let self = this;
      self.loadingGerar = true;

      console.log('teste');
    }
  }
};
</script>

<style>
  h3{
    color: gray;
  }
</style>

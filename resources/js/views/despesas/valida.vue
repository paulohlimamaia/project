<template>
  <div style="text-align:center;">
    
    <i v-show="loading" class="el-icon-loading" style="font-size:100px;margin-top:100px"/>

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

    <br><br><br><br>

    <span slot="footer" class="dialog-footer">
        <el-button @click="$router.push('/despesas/lista');">Cancelar</el-button>
        <el-button type="danger" @click="$router.push('/despesas/lista');">Invalidar</el-button>
        <el-button type="success" @click="$router.push('/despesas/lista');">Validar</el-button>
    </span>
  </div>
</template>

<script>
import http from '@/utils/request';
import { Message } from 'element-ui';

export default {
  data(){
    return {
      sim302: '',
      loading: true,
      loaded: false,
    };
  },
  mounted(){
    const self = this;
    self.getData();
  },
  methods: {

    getData(){
        let self = this;
        self.loaded = false;

        http.get(`/files/${self.$route.query.file}/sim302/${self.$route.query.ref}`).then(function(response){
            self.sim302 = response.data;
            self.loading = false;
            self.loaded = true;
        });
    },
  },
};
</script>

<style>

</style>

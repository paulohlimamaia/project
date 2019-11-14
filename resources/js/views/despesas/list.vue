<template>
  <div>
    <el-table
      :data="files"
      height="250"
      style="width: 100%"
    >
      <el-table-column
        prop="filename"
        label="Arquivo"
        width="500%"
      />
      <el-table-column
        prop="type"
        label="Tipo"
      />
      <el-table-column
        prop="updated_at"
        label="Data de Upload"
      />
      <el-table-column
        label="Operações"
      >
        <template slot-scope="scope">
          <el-button
            v-if="!scope.row.processado"
            size="mini"
            type="primary"
            :loading="loadingProcessar"
            @click="handleSelect(scope.row)"
          >Processar</el-button>
          <el-button
            v-else
            size="mini"
            type="success"
            :loading="loadingValidar"
            @click="handleValidar(scope.row)"
          >Validar</el-button>
          <el-button
            size="mini"
            type="danger"
            :loading="loadingDeletar"
            @click="handleDelete(scope.row)"
          >Deletar</el-button>
        </template>
      </el-table-column>
    </el-table>

    <el-dialog
      title="Selecione um Exercício"
      :visible.sync="selectDialogVisible"
    >
      <div style="text-align:center;justify-content:center;">

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
          :loading="loadingProcessar"
          @click="handleProcessar()"
        >Processar</el-button>
      </div>
    </el-dialog>

    <br>

    <div v-if="dialogDbfVisible">

      <el-table
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

      <span slot="footer" class="dialog-footer">
        <el-button @click="dialogDbfVisible = false">Cancelar</el-button>
        <el-button type="danger" @click="dialogDbfVisible = false">Invalidar</el-button>
        <el-button type="success" @click="dialogDbfVisible = false">Validar</el-button>
      </span>
    </div>

  </div>
</template>

<script>
import http from '@/utils/request';

export default {
  data(){
    return {
      pagination: '',
      files: '',
      sim302: [],
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
      fileSelected: '',
      loadingProcessar: false,
      loadingValidar: false,
      loadingDeletar: false,
      dialogDbfVisible: false,
      selectDialogVisible: false,
      type: ['DBF'],
    };
  },
  mounted(){
    const self = this;
    http.get('files?type=DBF').then(function(response){
      self.pagination = response.data;
      self.files = response.data.data;
    });

    let currentYear = new Date().getFullYear();
    let startYear = startYear || 2000;  
    while ( startYear <= currentYear ) {
        self.years.push(startYear++);
    } 
  },
  methods: {
    handleDelete(file){
      const self = this;

      if (confirm('Você tem certeza disso?')){
        self.loadingDeletar = true;
        http.get(`/files/${file.id_file}/delete`).then(function(response){
          self.files.forEach(function(file, index) {
            if (file.id_file === response.data.id_file){
              self.loadingDeletar = false;
              self.files.splice(index, 1);
            }
          });
        });
      }
    },

    handleSelect(file){
      let self = this;
      self.fileSelected = file;
      self.selectDialogVisible = true;
    },

    handleProcessar(){
      let self = this
      self.loadingProcessar = true;
      http.get(`/files/${self.fileSelected.id_file}/processar?ref=${self.year + self.month}`).then(function(response){
        // self.files.forEach(file => {
        //   if (file.id_file === response.data){
        //     file.processado = true;
        //   }
        // });
        self.loadingProcessar = false;
        self.selectDialogVisible = false;
        self.$router.push({ path: `/despesas/valida?file=${self.fileSelected.id_file}&ref=${self.year + self.month}`})
      }).catch(function(err){
        console.log(err);
        self.loadingProcessar = false;
        self.loadingValidar = false;
        self.selectDialogVisible = false;
      });
    },

    limpar(){
      const self = this;
      self.year = '';
      self.month = '';
    },

    handleValidar(file){
      this.$router.push({ path: `/despesas/valida?file=${file.id_file}`})
    },
  },
};
</script>

<style>

</style>

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
        prop="created_at"
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
            @click="handleProcessar(scope.row)"
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
      title="Balanços"
      :visible.sync="dialogBalVisible"
    >

      <el-table
        :data="balancos"
        height="500"
      >
        <el-table-column
          prop="codigo_especificacao_fonte"
          label="Especificação"
          width="115%"
        />
        <el-table-column
          prop="codigo_grupo_fonte"
          label="Grupo"
          width="100%"
        />
        <el-table-column
          prop="codigo_municipio"
          label="Município"
          width="100%"
        />
        <el-table-column
          prop="data_referencia_documentacao"
          label="Referência"
          width="100%"
        />
        <el-table-column
          prop="exercicio_orcamento"
          label="Exercício"
          width="100%"
        />
        <el-table-column
          prop="tipo_balancete"
          label="Balancete"
          width="100%"
        />
        <el-table-column
          prop="tipo_documento"
          label="Documento"
          width="100%"
        />
        <el-table-column
          prop="valor_anulacoes_mes_atual"
          label="Anulações do mês"
          width="100%"
        >
          <template slot-scope="scope">
            <span>
              R$ {{ scope.row.valor_anulacoes_mes_atual }}
            </span>
          </template>
        </el-table-column>
        <el-table-column
          prop="valor_anulacoes_mes_passados"
          label="Anulações passadas"
          width="100%"
        >
          <template slot-scope="scope">
            <span>
              R$ {{ scope.row.valor_anulacoes_mes_passados }}
            </span>
          </template>
        </el-table-column>
        <el-table-column
          prop="valor_arrecadacao_mes_atual"
          label="Arrecadações do mês"
          width="120%"
        >
          <template slot-scope="scope">
            <span>
              R$ {{ scope.row.valor_arrecadacao_mes_atual }}
            </span>
          </template>
        </el-table-column>
        <el-table-column
          prop="valor_arrecadacao_mes_passados"
          label="Arrecadações passadas"
          width="120%"
        >
          <template slot-scope="scope">
            <span>
              R$ {{ scope.row.valor_arrecadacao_mes_passados }}
            </span>
          </template>
        </el-table-column>
        <el-table-column
          prop="valor_previsto_orcamento"
          label="Valor Previsto"
          width="120%"
        >
          <template slot-scope="scope">
            <span>
              R$ {{ scope.row.valor_previsto_orcamento }}
            </span>
          </template>
        </el-table-column>
      </el-table>

      <span slot="footer" class="dialog-footer">
        <el-button @click="dialogBalVisible = false">Cancelar</el-button>
        <el-button type="danger" @click="dialogBalVisible = false">Invalidar</el-button>
        <el-button type="success" @click="dialogBalVisible = false">Validar</el-button>
      </span>
    </el-dialog>
  </div>
</template>

<script>
import http from '@/utils/request';

export default {
  data(){
    return {
      pagination: '',
      files: '',
      balancos: [],
      impts: [],
      loadingProcessar: false,
      loadingValidar: false,
      loadingDeletar: false,
      dialogBalVisible: false,
      dialogImptVisible: false,
      type: ['BAL'],
    };
  },
  mounted(){
    const self = this;
    http.get('files?type=BAL').then(function(response){
      self.pagination = response.data;
      self.files = response.data.data;
    });
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

    handleProcessar(file){
      const self = this;
      self.loadingProcessar = true;
      http.get(`/files/${file.id_file}/processar`).then(function(response){
        self.files.forEach(file => {
          if (file.id_file === response.data){
            file.processado = true;
            self.loadingProcessar = false;
          }
        });
      }).catch(function(err){
        console.log(err);
        self.loadingProcessar = false;
        self.loadingValidar = false;
      });
    },

    handleValidar(file){
      const self = this;
      self.loadingValidar = true;
      if (file.type === 'BAL'){
        http.get(`/files/${file.id_file}/balancos`).then(function(response){
          self.balancos = response.data;
          self.loadingValidar = false;
          self.dialogBalVisible = true;
        });
      }
    },
  },
};
</script>

<style>

</style>

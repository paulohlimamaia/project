<template>
  <div>

        <el-dialog title="Cadastrar Correlação" :visible.sync="dialogCadastrar">

            <div style="text-align:center;justify-content:center;padding-top:50px;">

                <div>
                    <el-select v-model="origem" placeholder="Origem" style="width:250px;" 
                    no-data-text="Carregue um arquivo de Receita">
                        <el-option
                        v-for="origem in origens"
                        :key="origem.value"
                        :label="origem.value"
                        :value="origem.value"
                        />
                    </el-select>

                    <el-input v-model="origemDescricao" placeholder="Descrição" style="width:250px;"></el-input>
                </div>

                <br>

                <div>
                    <el-select v-model="destino" placeholder="Destino" style="width:250px;"
                    no-data-text="Carregue um layout de Receita">
                        <el-option
                        v-for="destino in destinos"
                        :key="destino.value"
                        :label="destino.value"
                        :value="destino.value"
                        />
                    </el-select>

                    <el-input v-model="destinoDescricao" placeholder="Descrição" style="width:250px;"></el-input>
                </div>

            </div>

            <div style="text-align:center;justify-content:center;padding-top:50px;">
                <el-button
                    :loading="loading"
                    @click="limpar()"
                >Limpar</el-button>

                <el-button
                    type="primary"
                    :loading="loading"
                    @click="handleCadastro()"
                >Relacionar</el-button>
            </div>
            
        </el-dialog>

        <el-dialog
            title="Editar Correlação"
            :visible.sync="dialogEditar"
        >
            <div style="text-align:center;justify-content:center;padding-top:50px;">
            
                <div>
                    <el-select v-model="origemEditar" placeholder="Origem">
                        <el-option
                        v-for="origem in origens"
                        :key="origem.value"
                        :label="origem.value"
                        :value="origem.value"
                        />
                    </el-select>

                    <el-input v-model="origemDescricaoEditar" placeholder="Descrição" style="width:250px;"></el-input>
                </div>

                <br>

                <div>
                    <el-select v-model="destinoEditar" placeholder="Destino">
                        <el-option
                        v-for="destino in destinos"
                        :key="destino.value"
                        :label="destino.value"
                        :value="destino.value"
                        />
                    </el-select>

                    <el-input v-model="destinoDescricaoEditar" placeholder="Descrição" style="width:250px;"></el-input>
                </div>

            </div>

            <span slot="footer" class="dialog-footer">
                <el-button @click="dialogEditar = false">Cancelar</el-button>
                <el-button type="success" :loading="loadingAtualizar" @click="handleAtualizar">Atualizar</el-button>
            </span>
        </el-dialog>

        <div style="text-align:center;justify-content:center;padding-top:50px;">
            <el-row justify="center" align="middle">
                <el-col :span="4"><div class="grid-content"></div></el-col>
                <el-col :span="4"><div class="grid-content"></div></el-col>
                <el-col :span="4">
                    <div class="grid-content">
                        <el-input v-model="pesquisa.origem" placeholder="Código na Origem" style="width:300px;" @change="getData()">
                            <el-button @click="getData()" slot="append" icon="el-icon-search"></el-button>
                        </el-input>

                        <br><br>

                        <el-input v-model="pesquisa.origemDescricao" placeholder="Descrição na Origem" style="width:300px;" @change="getData()">
                            <el-button @click="getData()" slot="append" icon="el-icon-search"></el-button>
                        </el-input>
                    </div>
                </el-col>

                <el-col :span="4">
                    <div class="grid-content">
                        <el-input v-model="pesquisa.destino" placeholder="Código no Destino" style="width:300px;" @change="getData()">
                            <el-button @click="getData()" slot="append" icon="el-icon-search"></el-button>
                        </el-input>

                        <br><br>

                        <el-input v-model="pesquisa.destinoDescricao" placeholder="Descrição no Destino" style="width:300px;" @change="getData()">
                            <el-button @click="getData()" slot="append" icon="el-icon-search"></el-button>
                        </el-input>
                    </div>
                </el-col>
                <el-col :span="4"><div class="grid-content">
                    <el-button
                        type="primary"
                        :loading="loading"
                        icon="el-icon-plus"
                        @click="dialogCadastrar = true"
                    >Nova Correlação</el-button>

                    <br><br>

                    <el-button
                        :loading="loading"
                        @click="limparPesquisa()"
                    >Limpar</el-button>
                </div></el-col>
                <el-col :span="4"><div class="grid-content"></div></el-col>
            </el-row>
        </div>

        <div style="padding-top:50px;">

            <el-table
                :data="correlacoes"
                empty-text="Nenhuma Correlação Cadastrada"
            >
                <el-table-column
                    prop="origem"
                    label="Origem"
                />

                <el-table-column
                    prop="origem_descri"
                    label="Descrição na Origem"
                />

                <el-table-column
                    prop="destino"
                    label="Destino"
                />

                <el-table-column
                    prop="destino_descri"
                    label="Descrição no Destino"
                />

                <el-table-column
                    prop="created_at"
                    label="Data de Criação"
                />

                <el-table-column
                    label="Operações"
                >
                    <template slot-scope="scope">
                    <el-button
                        size="mini"
                        type="primary"
                        :loading="loadingEditar"
                        @click="handleEditar(scope.row)"
                    >Editar</el-button>
                    <el-button
                        size="mini"
                        type="danger"
                        :loading="loadingDeletar"
                        @click="handleDelete(scope.row)"
                    >Deletar</el-button>
                    </template>
                </el-table-column>
            </el-table>

        </div>
  </div>
</template>

<script>
import http from '@/utils/request';
import { Message } from 'element-ui';

export default {
    data(){
        return {
            dialogEditar: false,
            dialogCadastrar: false,
            loadingEditar: false,
            loadingAtualizar: false,
            loadingDeletar: false,
            loading: false,
            destinos: [],
            origens: [],
            origem: '',
            origemDescricao: '',
            destinoDescricao: '',
            destino: '',
            origemEditar: '',
            origemDescricaoEditar: '',
            destinoDescricaoEditar: '',
            destinoEditar: '',
            idEditar: '',
            correlacoes: [],
            pagination: [],
            pesquisa: {
                origem: '',
                destino: '',
                origemDescricao: '',
                destinoDescricao: ''
            },
        };
    },
    mounted(){
        const self = this;
        self.getData();
    },
    methods: {
        getData(){
            const self = this;

            http.get('correlacoes/origens/receita').then(function(response){
                self.origens = [];
                response.data.forEach(origem => {
                    self.origens.push({ value: origem });
                });
            });

            http.get('correlacoes/destinos?type=RECEITA').then(function(response){
                self.destinos = [];
                response.data.forEach(destino => {
                    self.destinos.push({ value: destino });
                });
            });

            http.get(`correlacoes?type=RECEITA
            &origem=${self.pesquisa.origem}
            &destino=${self.pesquisa.destino}
            &origemdescricao=${self.pesquisa.origemDescricao}
            &destinodescricao=${self.pesquisa.destinoDescricao}`).then(function(response){
                self.loadingDeletar = false;
                self.loading = false;
                self.pagination = response.data;
                self.correlacoes = response.data.data;
            });
        },

        handleCadastro(){
            let self = this

            if(!self.origem){
                Message({
                    message: 'Selecione um Código de Origem!',
                    type: 'error',
                    duration: 5 * 1000,
                });
            } else if(!self.destino){
                Message({
                    message: 'Selecione um Código de Destino!',
                    type: 'error',
                    duration: 5 * 1000,
                });
            } else if(!self.origemDescricao || !self.destinoDescricao){
                Message({
                    message: 'Digite uma Descrição!',
                    type: 'error',
                    duration: 5 * 1000,
                });
            } else {
                self.loading = true;

                let form = {
                    type: "RECEITA",
                    origem: self.origem,
                    origemdescricao: self.origemDescricao,
                    destino: self.destino,
                    destinodescricao: self.destinoDescricao
                }

                http.post('correlacoes', form).then(function(response){
                    self.loading = false;
                    self.dialogCadastrar = false;
                    self.getData();
                    self.limpar();
                });
            }
        },

        handleEditar(element){
            this.idEditar = element.id;
            this.origemEditar = element.origem;
            this.destinoEditar = element.destino;
            this.origemDescricaoEditar = element.origem_descri;
            this.destinoDescricaoEditar = element.destino_descri;
            this.dialogEditar = true;
        },

        handleDelete(element){
            let self = this
            self.loadingDeletar = true;
            let form = {id: element.id}

            http.post('correlacoes/delete', form).then(function(response){
                self.getData();
            });
        },

        handleAtualizar(){
            let self = this

            self.loadingAtualizar = true;

            let form = {
                id: self.idEditar,
                origem: self.origemEditar,
                destino: self.destinoEditar,
                origemdescricao: self.origemDescricaoEditar,
                destinodescricao: self.destinoDescricaoEditar
            }

            http.patch('correlacoes', form).then(function(response){
                self.loadingAtualizar = false;
                self.dialogEditar = false;
                self.getData();
            });
        },

        limpar(){
            let self = this;
            self.origem = '';
            self.destino = '';
            self.origemDescricao = '';
            self.destinoDescricao = '';
        },

        limparPesquisa(){
            let self = this;
            self.pesquisa.origem = '';
            self.pesquisa.destino = '';
            self.pesquisa.origemDescricao = '';
            self.pesquisa.destinoDescricao = '';
            self.getData();
        }
    }
}
</script>

<style>
  .el-row {
    margin-bottom: 20px;
  }
  .el-col {
    border-radius: 4px;
  }
  .grid-content {
    border-radius: 4px;
    min-height: 36px;
  }
  .row-bg {
    padding: 10px 0;
    background-color: #f9fafc;
  }
</style>
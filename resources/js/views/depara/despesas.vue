<template>
  <div>

        <el-dialog title="Cadastrar Correlação" :visible.sync="dialogCadastrar">
            <div style="text-align:center;justify-content:center;padding-top:50px;">
                <el-select v-model="origem" placeholder="Origem" style="width:250px;"
                no-data-text="Carregue um arquivo de Despesa">
                    <el-option
                    v-for="origem in origens"
                    :key="origem.value"
                    :label="origem.value"
                    :value="origem.value"
                    />
                </el-select>

                <el-select v-model="destino" placeholder="Destino" style="width:250px;"
                no-data-text="Carregue um layout de Despesa">
                    <el-option
                    v-for="destino in destinos"
                    :key="destino.value"
                    :label="destino.value"
                    :value="destino.value"
                    />
                </el-select>

            </div>

            <div style="text-align:center;justify-content:center;padding-top:50px;">
                <el-button
                    type="primary"
                    :loading="loading"
                    @click="handleCadastro()"
                >Cadastrar</el-button>

                <el-button
                    :loading="loading"
                    @click="limpar()"
                >Limpar</el-button>
            </div>
        </el-dialog>

        <el-dialog
            title="Editar Correlação"
            :visible.sync="dialogEditar"
        >
            <div style="text-align:center;justify-content:center;padding-top:50px;">
                <el-select v-model="origemEditar" placeholder="Origem">
                    <el-option
                    v-for="origem in origens"
                    :key="origem.value"
                    :label="origem.value"
                    :value="origem.value"
                    />
                </el-select>
                
                <el-select v-model="destinoEditar" placeholder="Destino">
                    <el-option
                    v-for="destino in destinos"
                    :key="destino.value"
                    :label="destino.value"
                    :value="destino.value"
                    />
                </el-select>

            </div>

            <span slot="footer" class="dialog-footer">
                <el-button @click="dialogEditar = false">Cancelar</el-button>
                <el-button type="success" :loading="loadingAtualizar" @click="handleAtualizar">Atualizar</el-button>
            </span>
        </el-dialog>

        <div style="text-align:center;justify-content:center;padding-top:50px;">
            <el-input v-model="pesquisa.origem" placeholder="Origem" style="width:300px;" @change="getData()">
                <el-button @click="getData()" slot="append" icon="el-icon-search"></el-button>
            </el-input>

            <el-input v-model="pesquisa.destino" placeholder="Destino" style="width:300px;" @change="getData()">
                <el-button @click="getData()" slot="append" icon="el-icon-search"></el-button>
            </el-input>

            <el-button
                :loading="loading"
                @click="limparPesquisa()"
            >Limpar</el-button>

            <el-button
                type="primary"
                :loading="loading"
                icon="el-icon-plus"
                @click="dialogCadastrar = true"
            >Nova Correlação</el-button>

        </div>

        <div style="padding-top:50px;">

            <el-table
                :data="correlacoes"
            >
                <el-table-column
                    prop="origem"
                    label="Origem"
                />

                <el-table-column
                    prop="destino"
                    label="Destino"
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
            destino: '',
            origemEditar: '',
            destinoEditar: '',
            idEditar: '',
            correlacoes: [],
            pagination: [],
            pesquisa: {
                origem: '',
                destino: ''
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

            http.get('correlacoes/origens/despesas').then(function(response){
                self.origens = [];
                response.data.forEach(origem => {
                    self.origens.push({ value: origem });
                });
            });

            http.get('correlacoes/destinos?type=DESPESA').then(function(response){
                self.destinos = [];
                response.data.forEach(destino => {
                    self.destinos.push({ value: destino });
                });
            });

            http.get(`correlacoes?type=DESPESA&origem=${self.pesquisa.origem}&destino=${self.pesquisa.destino}`).then(function(response){
                console.log(response)
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
            } else {
                self.loading = true;

                let form = {
                    type: "DESPESA",
                    origem: self.origem,
                    destino: self.destino
                }

                http.post('correlacoes', form).then(function(response){
                    self.getData();
                });
            }
        },

        handleEditar(element){
            this.idEditar = element.id;
            this.origemEditar = element.origem;
            this.destinoEditar = element.destino;
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
                destino: self.destinoEditar
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
        },

        limparPesquisa(){
            let self = this;
            self.pesquisa.origem = '';
            self.pesquisa.destino = '';
            self.getData();
        }
    }
}
</script>

<style>

</style>
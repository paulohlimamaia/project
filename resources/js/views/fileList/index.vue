<template>
  <div>
    <el-table
    :data="files"
    height="250"
    style="width: 100%">
        <el-table-column
            prop="filename"
            label="Arquivo">
        </el-table-column>
        <el-table-column
            prop="type"
            label="Tipo">
        </el-table-column>
        <el-table-column
            prop="created_at"
            label="Data de Upload">
        </el-table-column>
        <el-table-column
            label="Operações">
            <template slot-scope="scope">
                <el-button
                size="mini"
                type="danger"
                @click="handleDelete(scope.row)">Deletar</el-button>
            </template>
        </el-table-column>
    </el-table>
  </div>
</template>

<script>
    import http from '@/utils/request'

    export default {
        data(){
            return {
                pagination: '',
                files: ''
            }
        },
        mounted(){
            let self = this
            http.get('files').then(function(response){
                self.pagination = response.data;
                self.files = response.data.data;
            })
        },
        methods: {
            handleDelete(file){
                let self = this
                if(confirm('Você tem certeza disso?')){
                    http.get(`/files/${file.id_file}/delete`).then(function(response){
                        self.$router.go(0);
                    })
                }
            }
        }
    }
</script>

<style>

</style>
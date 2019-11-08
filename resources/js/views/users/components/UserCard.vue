<template>
  <el-card v-if="user.name">
    <div class="user-profile">
      <!-- <div class="user-avatar box-center">
        <pan-thumb :image="user.avatar" :height="'100px'" :width="'100px'" :hoverable="false" />
      </div> -->
      <div class="box-center">
        <div class="user-name text-center">
          {{ user.name }}
        </div>
        <div class="user-role text-center text-muted">
          {{ getRole() }}
        </div>
      </div>
      <div class="box-social">
        <el-form ref="userEditForm" :model="user" label-position="left" label-width="150px" style="max-width: 500px;">
          <el-form-item label="Nome" prop="name">
            <el-input v-model="user.name" />
          </el-form-item>
          <el-form-item label="E-mail" prop="email">
            <el-input v-model="user.email" />
          </el-form-item>
          <el-form-item label="Nova Senha" prop="password">
            <el-input v-model="user.password" show-password />
          </el-form-item>
          <el-form-item label="Confirmar Senha" prop="confirmPassword">
            <el-input v-model="user.confirmPassword" show-password />
          </el-form-item>
        </el-form>
        <!-- <el-table :data="social" :show-header="false">
          <el-table-column prop="name" label="Name" />
          <el-table-column label="Count" align="left" width="100">
            <template slot-scope="scope">
              {{ scope.row.count | toThousandFilter }}
            </template>
          </el-table-column>
        </el-table> -->
      </div>
      <div class="user-follow">
        <el-button type="primary" style="width: 100%;" @click="updateUser">
          Confirmar
        </el-button>
      </div>
    </div>
  </el-card>
</template>

<script>
// import PanThumb from '@/components/PanThumb';
import http from '@/utils/request';
import { Message } from 'element-ui';

export default {
  // components: { PanThumb },
  props: {
    user: {
      type: Object,
      default: () => {
        return {
          name: '',
          email: '',
          avatar: '',
          roles: [],
        };
      },
    },
  },
  data() {
    return {
      social: [
        {
          'name': 'Followers',
          'count': 1235,
        },
        {
          'name': 'Following',
          'count': 23512,
        },
        {
          'name': 'Friends',
          'count': 7242,
        },
      ],
    };
  },
  methods: {
    getRole() {
      const roles = this.user.roles.map(value => this.$options.filters.uppercaseFirst(value));
      return roles.join(' | ');
    },
    updateUser(){
      self = this;
      http.patch(`/users/${self.user.id}`, self.user).then(function(response){
        if (response.message === 'success'){
          Message({
            message: 'Usuário atualizado!',
            type: 'success',
            duration: 3 * 1000,
          });
          self.user.name = response.user.name;
          self.user.email = response.user.email;
          self.user.password = '';
          self.user.confirmPassword = '';
        }
      }).catch(function(err){
        console.log(err);
      });
    },
  },
};
</script>

<style lang="scss" scoped>
.user-profile {
  .user-name {
    font-weight: bold;
  }
  .box-center {
    padding-top: 10px;
  }
  .user-role {
    padding-top: 10px;
    font-weight: 400;
    font-size: 14px;
  }
  .box-social {
    padding-top: 30px;
    .el-table {
      border-top: 1px solid #dfe6ec;
    }
  }
  .user-follow {
    padding-top: 20px;
  }
}
</style>

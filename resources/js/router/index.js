import Vue from 'vue';
import Router from 'vue-router';

/**
 * Layzloading will create many files and slow on compiling, so best not to use lazyloading on devlopment.
 * The syntax is lazyloading, but we convert to proper require() with babel-plugin-syntax-dynamic-import
 * @see https://doc.laravue.dev/guide/advanced/lazy-loading.html
 */

Vue.use(Router);

/* Layout */
import Layout from '@/layout';

/* Router for modules */
// import elementUiRoutes from './modules/element-ui';
// import componentRoutes from './modules/components';
// import chartsRoutes from './modules/charts';
// import tableRoutes from './modules/table';
import adminRoutes from './modules/admin';
// import nestedRoutes from './modules/nested';
// import errorRoutes from './modules/error';
// import excelRoutes from './modules/excel';
// import permissionRoutes from './modules/permission';

/**
 * Sub-menu only appear when children.length>=1
 * @see https://doc.laravue.dev/guide/essentials/router-and-nav.html
 **/

/**
* hidden: true                   if `hidden:true` will not show in the sidebar(default is false)
* alwaysShow: true               if set true, will always show the root menu, whatever its child routes length
*                                if not set alwaysShow, only more than one route under the children
*                                it will becomes nested mode, otherwise not show the root menu
* redirect: noredirect           if `redirect:noredirect` will no redirect in the breadcrumb
* name:'router-name'             the name is used by <keep-alive> (must set!!!)
* meta : {
    roles: ['admin', 'editor']   Visible for these roles only
    permissions: ['view menu zip', 'manage user'] Visible for these permissions only
    title: 'title'               the name show in sub-menu and breadcrumb (recommend set)
    icon: 'svg-name'             the icon show in the sidebar
    noCache: true                if true, the page will no be cached(default is false)
    breadcrumb: false            if false, the item will hidden in breadcrumb (default is true)
    affix: true                  if true, the tag will affix in the tags-view
  }
**/

export const constantRoutes = [

  {
    path: '',
    component: Layout,
    redirect: 'dashboard',
    children: [
      {
        path: 'dashboard',
        component: () => import('@/views/dashboard/index'),
        name: 'Dashboard',
        meta: { title: 'dashboard', icon: 'dashboard', noCache: false },
      },
    ],
  },
  {
    path: '/redirect',
    component: Layout,
    hidden: true,
    children: [
      {
        path: '/redirect/:path*',
        component: () => import('@/views/redirect/index'),
      },
    ],
  },
  {
    path: '/login',
    component: () => import('@/views/login/index'),
    hidden: true,
  },
  {
    path: '/forgot',
    component: () => import('@/views/forgot/index'),
    hidden: true,
  },
  {
    path: '/auth-redirect',
    component: () => import('@/views/login/AuthRedirect'),
    hidden: true,
  },
  {
    path: '/401',
    component: () => import('@/views/error-page/401'),
    hidden: true,
  },
  {
    path: '/404',
    component: () => import('@/views/error-page/404'),
    hidden: true,
  },
];

export const asyncRoutes = [
  // permissionRoutes,
  // componentRoutes,
  // chartsRoutes,
  // nestedRoutes,
  // tableRoutes,
  adminRoutes,

  {
    path: '/',
    component: Layout,
    name: 'User',
    meta: { title: 'Usuário', noCache: true, permissions: ['manage user'] },
    hidden: true,
    children: [
      {
        path: '/users/edit/:id(\\d+)',
        component: () => import('@/views/users/Profile'),
        name: 'UserProfile',
        meta: { title: 'Perfil', noCache: true, permissions: ['manage user'] },
        hidden: true,
      },
    ],
  },

  {
    path: '/receitas',
    component: Layout,
    redirect: '/receitas/index',
    name: 'Receitas',
    alwaysShow: true,
    meta: {
      title: 'Receitas',
      icon: 'dollar',
      permissions: ['view menu receitas']
    },
    children: [
      {
        path: 'index',
        component: () => import('@/views/receitas/index'),
        name: 'Upload',
        meta: { title: 'Upload', icon: 'guide', noCache: false },
      },
      {
        path: 'lista',
        component: () => import('@/views/receitas/list'),
        name: 'Lista',
        meta: { title: 'Lista', icon: 'list', noCache: false },
      },
      {
        path: 'exportacao',
        component: () => import('@/views/receitas/exportacao'),
        name: 'Exportação',
        meta: { title: 'Exportação', icon: 'form', noCache: false },
      },
    ],
  },

  {
    path: '/despesas',
    component: Layout,
    redirect: '/despesas/index',
    name: 'Despesas',
    alwaysShow: true,
    meta: {
      title: 'Despesas',
      icon: 'dollar',
      permissions: ['view menu despesas']
    },
    children: [
      {
        path: 'index',
        component: () => import('@/views/despesas/index'),
        name: 'Upload',
        meta: { title: 'Upload', icon: 'guide', noCache: false },
      },
      {
        path: 'lista',
        component: () => import('@/views/despesas/list'),
        name: 'Lista',
        meta: { title: 'Lista', icon: 'list', noCache: false },
      },
      {
        path: 'exportacao',
        component: () => import('@/views/despesas/exportacao'),
        name: 'Exportação',
        meta: { title: 'Exportação', icon: 'form', noCache: false },
      },
      {
        path: 'valida',
        component: () => import('@/views/despesas/valida'),
        name: 'Validação',
        hidden: true,
        props: true,
        meta: { title: 'Dados', noCache: true },
      },
    ],
  },
  {
    path: '/correlacoes',
    component: Layout,
    redirect: '/correlacoes/index',
    name: 'Correlações',
    alwaysShow: true,
    meta: {
      title: 'Correlações',
      icon: 'tree',
      permissions: ['view menu correlacoes']
    },
    children: [
      {
        path: 'receitas',
        component: () => import('@/views/depara/receitas'),
        name: 'Receitas',
        meta: { title: 'Receitas', icon: 'tree-table', noCache: false },
      },
      {
        path: 'despesas',
        component: () => import('@/views/depara/despesas'),
        name: 'Despesas',
        meta: { title: 'Despesas', icon: 'tree-table', noCache: false },
      },
    ],
  },
  // {
  //   path: '/theme',
  //   component: Layout,
  //   redirect: 'noredirect',
  //   children: [
  //     {
  //       path: 'index',
  //       component: () => import('@/views/theme/index'),
  //       name: 'Theme',
  //       meta: { title: 'theme', icon: 'theme' },
  //     },
  //   ],
  // },
  // {
  //   path: '/clipboard',
  //   component: Layout,
  //   redirect: 'noredirect',
  //   meta: { permissions: ['view menu clipboard'] },
  //   children: [
  //     {
  //       path: 'index',
  //       component: () => import('@/views/clipboard/index'),
  //       name: 'ClipboardDemo',
  //       meta: { title: 'clipboardDemo', icon: 'clipboard', roles: ['admin', 'manager', 'editor', 'user'] },
  //     },
  //   ],
  // },
  // errorRoutes,
  // excelRoutes,
  // {
  //   path: '/zip',
  //   component: Layout,
  //   redirect: '/zip/download',
  //   alwaysShow: true,
  //   meta: { title: 'zip', icon: 'zip', permissions: ['view menu zip'] },
  //   children: [
  //     {
  //       path: 'download',
  //       component: () => import('@/views/zip'),
  //       name: 'ExportZip',
  //       meta: { title: 'exportZip' },
  //     },
  //   ],
  // },
  // {
  //   path: '/pdf',
  //   component: Layout,
  //   redirect: '/pdf/index',
  //   meta: { title: 'pdf', icon: 'pdf', permissions: ['view menu pdf'] },
  //   children: [
  //     {
  //       path: 'index',
  //       component: () => import('@/views/pdf'),
  //       name: 'Pdf',
  //       meta: { title: 'pdf' },
  //     },
  //   ],
  // },
  // {
  //   path: '/pdf/download',
  //   component: () => import('@/views/pdf/Download'),
  //   hidden: true,
  // },
  // {
  //   path: '/i18n',
  //   component: Layout,
  //   meta: { permissions: ['view menu i18n'] },
  //   children: [
  //     {
  //       path: 'index',
  //       component: () => import('@/views/i18n'),
  //       name: 'I18n',
  //       meta: { title: 'i18n', icon: 'international' },
  //     },
  //   ],
  // },
  // {
  //   path: 'external-link',
  //   component: Layout,
  //   children: [
  //     {
  //       path: 'https://github.com/tuandm/laravue',
  //       meta: { title: 'externalLink', icon: 'link' },
  //     },
  //   ],
  // },
  { path: '*', redirect: '/404', hidden: true },
];

const createRouter = () => new Router({
  // mode: 'history', // require service support
  scrollBehavior: () => ({ y: 0 }),
  routes: constantRoutes,
});

const router = createRouter();

// Detail see: https://github.com/vuejs/vue-router/issues/1234#issuecomment-357941465
export function resetRouter() {
  const newRouter = createRouter();
  router.matcher = newRouter.matcher; // reset router
}

export default router;

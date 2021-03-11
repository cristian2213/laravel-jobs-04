import Vue from 'vue';
import VueRouter from 'vue-router';
// Components
import AuthView from '../views/auth/TheAuth';
import LoginView from '../views/auth/TheLogin';
import NotFoundView from '../views/404/NotFound';

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    redirect: { name: 'Jobs' },
  },

  {
    path: '/',
    name: 'Jobs',
    //component: ,
  },

  {
    path: '/auth',
    name: 'Auth',
    component: AuthView,
  },

  {
    path: '/login',
    name: 'Login',
    component: LoginView,
  },

  {
    path: '/about',
    name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ '../views/About.vue'),
  },

  { path: '/:notFound(.*)', component: NotFoundView },
];

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
  linkActiveClass: 'active',
});

export default router;

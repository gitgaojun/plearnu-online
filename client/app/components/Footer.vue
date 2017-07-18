<template>
  <footer v-show=" ! loading" >
    <div class="wrap">
      <div class="sub-links">
        <a v-if="auth" :href="settings" class="login-btn">{{ lang('settings') }}</a>
        <a v-if="auth" :href="logout" class="login-btn">{{ lang('logout') }}</a>
        <a v-if=" ! auth" :href="login" class="login-btn">Login</a>
      </div>
    </div>
  </footer>
</template>

<script>
  import { mapState } from 'vuex';
  import Helper from '../helper';

  export default {
    mixins: [Helper],

    data() {
      return {
        auth: config.auth,
        logout: config.api + '/logout',
        login: config.url + '/login',
        settings: config.url + '/settings'
      }
    },

    computed: {
      ...mapState({
        loading: state => state.loading
      })
    }
  }
</script>
<template>
  <div id="app">
    <RegistrationForm />
    <LoginForm />
  </div>
</template>

<script>
import RegistrationForm from './components/RegistrationForm.vue';
import LoginForm from './components/LoginForm.vue';

export default {
  name: 'App',
  components: {
    RegistrationForm,
    LoginForm
  }
};
</script>

<style>
/* Add any global styles here */
</style>

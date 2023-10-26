<template>
    <div>
      <h2>Login</h2>
      <form @submit.prevent="login">
        <div>
          <label for="loginEmail">Email:</label>
          <input type="email" id="loginEmail" v-model="email" required>
        </div>
        <div>
          <label for="loginPassword">Password:</label>
          <input type="password" id="loginPassword" v-model="password" required>
        </div>
        <button type="submit">Login</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        email: '',
        password: ''
      };
    },
    methods: {
      login() {
        // For simplicity, we're just checking if the fields are filled.
        // In a real-world scenario, you'd validate the credentials against a backend.
        if (this.email && this.password) {
          alert('Login successful!');
          this.email = '';
          this.password = '';
        } else {
          alert('Please enter your email and password.');
        }
      }
    }
  };
  </script>
  
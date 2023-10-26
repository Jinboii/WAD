<template>
    <div>
      <h2>Register</h2>
      <form @submit.prevent="register">
        <div>
          <label for="username">Username:</label>
          <input type="text" id="username" v-model="username" required>
        </div>
        <div>
          <label for="email">Email:</label>
          <input type="email" id="email" v-model="email" required>
        </div>
        <div>
          <label for="password">Password:</label>
          <input type="password" id="password" v-model="password" required>
        </div>
        <div>
          <label for="confirmPassword">Confirm Password:</label>
          <input type="password" id="confirmPassword" v-model="confirmPassword" required>
        </div>
        <div>
          <label for="role">Role:</label>
          <select id="role" v-model="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
          </select>
        </div>
        <button type="submit">Register</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        username: '',
        email: '',
        password: '',
        confirmPassword: '',
        role: 'user' // default value
      };
    },
    methods: {
      register() {
        if (this.password !== this.confirmPassword) {
          alert('Passwords do not match!');
          return;
        }
        const registrationData = {
          username: this.username,
          email: this.email,
          password: this.password,
          role: this.role
        };
        console.log(registrationData);
        alert('Registration successful!');
        this.username = '';
        this.email = '';
        this.password = '';
        this.confirmPassword = '';
        this.role = 'user';
      }
    }
  };
  </script>
  
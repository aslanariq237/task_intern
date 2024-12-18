<script setup>
import axios from 'axios';
import { RouterLink, RouterView } from 'vue-router'

const isLoggedIn = localStorage.getItem('isLoggedIn') == "true"
const username = localStorage.getItem('username') || ""

const logout = () => {
  localStorage.setItem('idLoggedIn', false);
  this.$router.push('/login')
}
</script>

<template>
  <div class="contain">
    <div class="navbar">
      <div class="right">
        <ul>
          <li>
            <RouterLink :to="{name: 'home'}"><p>Home</p></RouterLink>
          </li>
          <li>
            <RouterLink :to="{name : 'about'}"><p>About</p></RouterLink>
          </li>        
        </ul>
      </div>
      <div class="left">
        <div class="" v-if="isLoggedIn">
          <div class="logos">{{ username }}</div><button @click="logout()">Logout</button>        
        </div>
        <div class="" v-else>          
          <RouterLink :to="{name: 'login'}"><button>Login</button></RouterLink>
        </div>
      </div>
    </div>
  </div>
  <RouterView />
</template>

<style>
.contain{
  padding: 0 40px;
}
.navbar{
  display: flex;  
  justify-content: space-between;   
  align-items: center;  
}
.right ul{
  display: flex;
  margin: 0;
  padding: 0;
  justify-content: space-between;
  list-style-type: none;  
  align-items: center;
  li{
    margin-right: 10px;
    text-decoration: none;    
  }  
}
.left button{
  background-color: aliceblue;  
  padding: 5px 12px;  
}
.form-input{  
  display: flex;
  justify-content: center;
  .title{
    text-align: center;
  }

  input{
    width: 100%;
  }
  .form{
    background-color: rgb(209, 209, 209);
    padding: 20px;
  }
  .form, div{
    margin-bottom: 10px;
    display: flex;
    flex-flow: column;
  }
}
</style>

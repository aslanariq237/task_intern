<script setup>
import { RouterLink, RouterView } from 'vue-router'
import HelloWorld from './components/HelloWorld.vue'
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
        <div class="logos"></div>
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
  li{
    margin-right: 10px;
    text-decoration: none;    
  }  
}
.logos{
  width: 40px;
  height: 40px;
  border-radius: 20px;
  background-color: rgb(70, 70, 70);
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

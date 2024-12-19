<script>
import axios from 'axios';
import { ref, onMounted } from 'vue';

export default{
  data(){
    return{
      users : [],
      num : 0,
      result : []
    }
  },
  created(){
    this.getItems()
  },
  methods: {
    async getItems(){
      try{
        const response = await axios.get('http://localhost:8000/api/product')
        this.users = response.data            
      }catch(err){        
        console.error(err)
      }
    },
    async deleteItems(id){
      try {
        const res = await axios.delete(`http://localhost:8000/api/delete-product/${id}`)
        if (res) {
          alert("data berhasil di hapus")
        }
      } catch (error) {
        
      }
    },
    async editItems(id){
      try{        
        if (id) {
          console.log('editing')   
          this.$router.push(`/edit-product/${id}`)       
        }
      }catch(err){
        console.log(err)
      }
    },
    calculateFibonacci() {
      const n = this.num;
      if (n < 0) {
        alert("Please enter a positive number.");
        return;
      }
      const sequence = [];
      for (let i = 0; i < n; i++) {
        if (i === 0) {
          sequence.push(0);
        } else if (i === 1) {
          sequence.push(1);
        } else {
          sequence.push(sequence[i - 1] + sequence[i - 2]);
        }
      }
      this.result= sequence;
    },
  }
}


</script>

<template>
  <div class="container">
    <div class="dash">
      <div class="fibbonaci">
        <div class="fib">
          <label for="">Fibbonaci</label>
          <form >
            <div class="input">
              <input 
                type="text" 
                name="fib"                 
                min="1"  
                v-model.number="num"            
                placeholder="Masukkan Angka yang anda inginkan Max:10">
              <button type="button" @click="calculateFibonacci">Generate</button>
            </div>
          </form>
        </div>        
        <div class="result">
          <p>Result : {{ result.join(',') }}</p>
        </div>
      </div>
    </div>
    <div class="table-data">
      <div class="row">
        <h1>Table of Product </h1> 
        <RouterLink :to="{name: 'addProduct'}"><button>New Product</button></RouterLink>       
      </div>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>price</th>
            <th>QTY</th>
            <th>Action</th>
          </tr>
        </thead>        
        <tbody>
          <tr v-for="user in users" :key="user.id">
            <td>{{ user.unique}}</td>
            <td>{{ user.name }}</td>
            <td>{{  user.price }}</td>
            <td>{{ user.qty }}</td>
            <td>
              <button @click="editItems(user.id)">Edit</button>
              <button @click="deleteItems(user.id)">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<style>
.container{
  padding: 40px;
  .fibbonaci{
    width: 80%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid rgb(203, 203, 203);
    box-shadow: 8px 10px 5px -6px rgba(0,0,0,0.26);
    -webkit-box-shadow: 8px 10px 5px -6px rgba(0,0,0,0.26);
    -moz-box-shadow: 8px 10px 5px -6px rgba(0,0,0,0.26);
    
    .fib{
      display: flex;
      flex-flow: column;
    }
    input{
      width: 50%;
      border-radius: 2px;
      padding: 2px 5px;
    }
  }
  .dash{
    display: flex;
    justify-content: space-between;    
  }
  table {
    margin-top: 20px;
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  .input, button{
    margin-left: 5px;
    background-color: white;  
  }
  thead, th{
    background-color: rgb(253, 92, 92);
  }
  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }
  .row{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;    
    h1{
      margin: 0;      
    }
    button{
      width: auto;
      height: 30px;
    }
  }
}

</style>

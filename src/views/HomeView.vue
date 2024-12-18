<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';

const users = ref([])
const error = ref(null)
const num = ref();

const formData = ref({
  name: '',
  price: '',
  qty: ''
});

function fibbon(){
  const fib = parseInt(this.count)
  return num = fib;
}

const submitForm = async () => {
  try {
    const response = await axios.post('http://localhost:8000/add-product', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',              
      },
      body: JSON.stringify(formData.value)
    })
    const data = await response.json()
    console.log('success', data)
  } catch (error) {
    console.log(error)    
  }
}

onMounted(async() => {
  try{
    const response = await axios.get('http://localhost:8000/api/product')
    users.value = response.data
  }catch(err){
    error.value = 'Failed to fetch Data'
    console.error(err)
  }
})
</script>

<template>
  <div class="container">
    <div class="dash">
      <div class="fibbonaci">
        <div class="fib">
          <label for="">Fibbonaci</label>
          <form @submit.prevent="fibbon">
            <div class="input">
              <input 
                type="text" 
                name="fib"                 
                min="1"
                v-model="count"
                placeholder="Masukkan Angka yang anda inginkan Max:10">
              <button type="submit">Generate</button>
            </div>
          </form>
        </div>
        
        <div class="result">
          <p>Result {{ num }}</p>
        </div>
      </div>
      <div class="input">
        <div class="form-input">
          <form @submit.prevent="submitForm">
            <div class="form">
              <h3 class="title">ADD PRODUCT</h3>
              <div class="name">
                <label for="">Name Product</label>
                <input type="text" name="name" v-model="formData.name" placeholder="masukkan Nama Barang">
              </div>
              <div class="price">
                <label for="">Price Product</label>
                <input type="text" name="price" v-model="formData.price" placeholder="Masukkan Harga Barang">
              </div>
              <div class="qty">
                <label for="">Quantity</label>
                <input type="text" name="qty" v-model="formData.qty" placeholder="Masukkan Jumlah">
              </div>
              <button type="submit">submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="table-data">
      <div class="row">
        <h1>Table of Product </h1>        
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
            <td>{{ user.id}}</td>
            <td>{{ user.name }}</td>
            <td>{{  user.price }}</td>
            <td>{{ user.qty }}</td>
            <td>
              <button>Edit</button>
              <button>Delete</button>
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

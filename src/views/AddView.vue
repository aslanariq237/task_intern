<template>
    <div class="container">
        <div class="m">
            <div class="form">
                <form @submit.prevent="submitForm">
                    <div class="input">
                        <div class="name">
                            <label for="name_of_product">Name of Product</label>
                            <input type="text" name="name" placeholder="Masukkan Nama Produk" v-model="name">
                        </div>
                        <div class="price">
                            <label for="price_of_product">Price of product</label>
                            <input type="number" name="price" placeholder="Masukkan Harga produk" v-model="price">
                        </div>
                        <div class="qty">
                            <label for="qty_of_product">Quantity of Product</label>
                            <input type="number" name="qty" placeholder="Masukkan Jumlah produk" v-model="qty">
                        </div>
                        <input type="submit" value="submit">
                    </div>
                </form>
            </div>
        </div>        
    </div>
</template>

<script>
import axios from 'axios';
    export default {
        data(){
            return{
                name: '',
                price: '',
                qty: ''
            }
        },
        methods: {
            async submitForm(){                
                const payload = {
                    name: this.name,
                    price : this.price,
                    qty: this.qty
                }
                const response = await axios.post('http://127.0.0.1:8000/api/add-product', payload)
                if (response) {
                    console.log(response)
                }                
            }
        }  
    }
</script>

<style>
.m{        
    display: flex;    
    justify-content: center;
    .form{
        border: 1px double black;
        padding: 10px;
    }
    input{
        width: 470px;
        padding: 6px;
    }
    .input, div{
        margin-bottom: 10px;
        display: flex;
        flex-flow: column;
    }
}
</style>
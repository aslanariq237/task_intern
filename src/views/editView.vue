<template>    
    <div class="container">
        <div class="m">
            <div class="form" v-if="items">
                <form @submit.prevent="postItems">
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
            <div class="" v-else>
                <h1>Barang Not Foud</h1>
            </div>          
        </div>        
    </div>
</template>
<script>
import axios from 'axios';
    export default{
        props: ['id'],
        data(){
            return{
                num : 0,
                items: [], 
                name : '',
                price: '',
                qty : '' ,
                result: []                             
            }
        },
        created(){
            this.getItems();
        },
        methods: {
            async getItems(){   
                const id = this.id;             
                const res = await axios.get(`http://localhost:8000/api/tampil/${id}`)
                this.items = res.data
            },

            async postItems(){
                const id = this.id;
                const payload = {
                    name: this.name,
                    price : this.price,
                    qty : this.qty
                }
                const res = await axios.post(`http://localhost:8000/api/edit-product/${id}`, payload)
                if (res) {
                    alert('Berhasil Mengedit');
                }
            },            
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
<template>    
    <div class="container">
        <div class="m">
            <div class="form" v-if="item">
                <form >
                    <div class="input">
                        <div class="name">
                            <label for="name_of_product">Name of Product</label>
                            <input type="text" name="name" placeholder="Masukkan Nama Produk" value="">                            
                        </div>
                        <div class="price">
                            <label for="price_of_product">Price of product</label>
                            <input type="number" name="price" placeholder="Masukkan Harga produk">
                        </div>
                        <div class="qty">
                            <label for="qty_of_product">Quantity of Product</label>
                            <input type="number" name="qty" placeholder="Masukkan Jumlah produk">
                        </div>
                        <input type="submit" value="submit">
                    </div>
                </form>
            </div>
            <div class="" v-else>
                <h1>Barang Not Found</h1>
            </div>
        </div>        
    </div>
</template>
<script>
    export default{
        props: ['id'],
        data(){
            return{
                items: [],
                item: null
            }
        },
        created(){
            this.item = this.items.find((item) => item.id === parseInt(this.id));
        },
        methods: {
            async getItems(){
                const res = await axios.get('http://localhost:8000/api/product')
                this.items = res.data
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
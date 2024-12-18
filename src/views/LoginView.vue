<template>
    <div class="container">
        <div class="m">
            <div class="form">
                <form @submit.prevent="handleLogin">
                    <div class="input">
                        <div class="email">
                            <label for="Email">Email</label>
                            <input type="text" name="email" placeholder="Masukkan Email Anda" v-model="email">
                        </div>
                        <div class="password">
                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="Masukkan Password Anda" v-model="password">
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
export default{    
    data(){
        return{
            email: '',
            password: ''            
        }
    },
    methods: {
        async handleLogin(){
            const payload = {
                email: this.email,
                password: this.password
            }

            await axios.post('http://127.0.0.1:8000/api/login', payload)
            .then((res) => {
                this.$router.push('/');
                localStorage.setItem('isLoggedIn', 'true')
                localStorage.setItem('username', this.email)                
            }).catch(err => console.log(err))
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
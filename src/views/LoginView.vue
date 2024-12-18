<template>
    <div class="container">
        <form action="" method="post">
            <div class="login">
                <div class="form">
                    <div class="email">
                        <label for="">Email</label>
                        <input type="text" name="email" placeholder="Masukkan Email">
                    </div>
                    <div class="password">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Masukkan Password">
                    </div>
                    <button type="submit">submit</button>
                </div>
            </div>
        </form>
    </div>
</template>

<style>
.container{
    margin: 0;
    box-sizing: border-box;
}
.login{
    display: flex;
    justify-content: center;    

    .form{
        background-color: gainsboro;
        padding: 20px;
        div{
            margin-bottom: 10px;
        } 
    }
    input{
        width: 100%;
    }
}
</style>
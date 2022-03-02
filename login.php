
<style>
    body {
        background: #555;
    }

    .card {
        border-radius: 20px;
        height: 450px
    }

    .forms-inputs {
        position: relative;
        width: 100%;
        border: 2px solid #999;
    }

    .forms-inputs span {
        position: absolute;
        top: -18px;
        left: 10px;
        background-color: #04AA6D;
        padding: 5px 10px;
        font-size: 15px
    }

    .forms-inputs input {
        height: 50px;
        border: 2px solid #eee
    }

    .forms-inputs input:focus {
        box-shadow: none;
        outline: none;
        border: 2px solid #000;
    }

    .btn {
        height: 50px
    }

    .success-data {
        display: flex;
        flex-direction: column
    }

    .bxs-badge-check {
        font-size: 90px
    }
</style>
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card px-5 py-5" id="form1">
                <form action="verification.php" method="post">
                    <div class="form-data" v-if="!submitted">
                        <div class="forms-inputs mb-4"> <span>Email or username</span> <input name="mail" autocomplete="off" type="text" v-model="email" v-bind:class="{'form-control':true, 'is-invalid' : !validEmail(email) && emailBlured}" v-on:blur="emailBlured = true">
                            <div class="invalid-feedback">A valid email is required!</div>
                        </div>
                        <div class="forms-inputs mb-4"> <span>Password</span> <input name="password" autocomplete="off" type="password" v-model="password" v-bind:class="{'form-control':true, 'is-invalid' : !validPassword(password) && passwordBlured}" v-on:blur="passwordBlured = true">
                            <div class="invalid-feedback">Password must be 8 character!</div>
                        </div>
                        <div class="mb-3"> <button type="submit" v-on:click.stop.prevent="submit" class="btn btn-dark w-100">Login</button> </div>
                    </div>
                    <div class="success-data" v-else>
                        <div class="text-center d-flex flex-column"> <i class='bx bxs-badge-check'></i> <span class="text-center fs-1">You have been logged in <br> Successfully</span> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


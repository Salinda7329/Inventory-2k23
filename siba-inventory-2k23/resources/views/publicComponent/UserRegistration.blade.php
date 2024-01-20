{{-- meka thama user registration main view aka --}}

<style>
    .register-logo{
        max-width: 200px;

    }

    .card{
        box-shadow:rgba(8, 1, 1, 0.727) ;
    }
</style>

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <div class="card">
                <div class="card-body">
                    <div class="app-brand justify-content-center">
                        <a href="index.html" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <img class="register-logo" src="img/siba-logo w.png" alt="">
                            </span>
                        </a>
                    </div>
                    <h4 class="mb-2">Adventure starts here 🚀</h4>
                    <p class="mb-4">Make your app management easy and fun!</p>
                    <form id="formAuthentication" class="mb-3" action="index.html" method="POST">
                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                placeholder="Enter your First Name" autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname"
                                placeholder="Enter your Last Name" autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Enter your username" autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Enter your email" />
                        </div>
                        <div class="mb-3">
                            <label for="epf" class="form-label">EPF No :</label>
                            <input type="text" class="form-control" id="epf" name="epf"
                                placeholder="Enter your EPF Number" autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="int" class="form-control" id="phone" name="phone"
                                placeholder="Enter your phone number" autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="department" class="form-label">Choose Departmnt</label>
                            <select class="form-control" id="department" name="department">
                              <option value="option1">Information Technology</option>
                              <option value="option2">Buddhist & Pali Studies</option>
                              <option value="option3">Counselling Psycology</option>
                              <option value="option4">English & Modern Language</option>
                              <option value="option5">Global Studies</option>
                              <option value="option6">Aesthetic Department</option>
                              <option value="option7">management Studies</option>
                            </select>
                          </div>
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                                <label class="form-check-label" for="terms-conditions">
                                    I agree to
                                    <a href="">privacy policy & terms</a>
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-primary d-grid w-100">Sign up</button>
                    </form>
                    <p class="text-center">
                        <span>Already have an account?</span>
                        <a href="/>
                            <span>Sign in instead</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

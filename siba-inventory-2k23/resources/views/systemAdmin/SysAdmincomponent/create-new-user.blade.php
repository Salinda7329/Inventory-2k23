<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Create New User
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{--  --}}
                {{-- meka thama user registration main view aka --}}

                <style>
                    .register-logo {
                        max-width: 200px;

                    }

                    .card {
                        box-shadow: rgba(8, 1, 1, 0.727);
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

                                    <x-validation-errors class="mb-4" />

                                    <form id="formAuthentication" class="mb-3" method="POST"
                                        action="{{ route('register') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter your Name" :value="old('name')" required autofocus
                                                autocomplete="name" />
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Enter your EPF Number" :value="old('email')" autofocus
                                                required />
                                        </div>

                                        <div class="mb-3">
                                            <label for="epf" class="form-label">EPF No :</label>
                                            <input type="text" class="form-control" id="epf" name="epf"
                                                placeholder="Enter your EPF Number" :value="old('epf')" autofocus
                                                required />
                                        </div>

                                        <div class="mb-3">
                                            <label for="department" class="form-label">Choose Departmnt</label>
                                            <select class="form-control" id="department" name="dept_id" required>
                                                <option value="">Select a Department</option>
                                                <option value="1">Information Technology</option>
                                                <option value="2">Buddhist & Pali Studies</option>
                                                <option value="3">Counselling Psycology</option>
                                                <option value="4">English & Modern Language</option>
                                                <option value="5">Global Studies</option>
                                                <option value="6">Aesthetic Department</option>
                                                <option value="7">management Studies</option>
                                                <option value="8">Admin Department</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="role" class="form-label">Select Role</label>
                                            <select class="form-control" id="role" name="role" required>
                                                <option value="">Select a Role</option>
                                                <option value="1">User</option>
                                                <option value="2">Store Manager</option>
                                                <option value="3">Purchase Manager</option>
                                                <option value="4">Head of Administration</option>
                                                {{-- value="5" Admin --}}
                                            </select>
                                        </div>

                                        <div class="mb-3 form-password-toggle">
                                            <label class="form-label" for="password">Password</label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="password" class="form-control"
                                                    name="password"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                    aria-describedby="password" required autocomplete="new-password" />
                                                <span class="input-group-text cursor-pointer"><i
                                                        class="bx bx-hide"></i></span>
                                            </div>
                                        </div>

                                        <div class="mb-3 form-password-toggle">
                                            <label class="form-label" for="password_confirmation">Confirm
                                                Password</label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="password_confirmation"
                                                    class="form-control" name="password_confirmation"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                    aria-describedby="password" required
                                                    autocomplete="new-password" />
                                                <span class="input-group-text cursor-pointer"><i
                                                        class="bx bx-hide"></i></span>
                                            </div>
                                        </div>


                                        <button class="btn btn-primary d-grid w-100">Create New User</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--  --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>

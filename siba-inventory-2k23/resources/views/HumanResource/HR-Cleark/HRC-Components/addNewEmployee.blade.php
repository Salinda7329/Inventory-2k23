



<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <div class="card">
          <h5 class="card-header">Add New Employee</h5>
          <div class="card-body">
            <div class="row">
                <div class="row g-3">
                    <div class="col mb-0">
                        <label for="titleBackdrop" class="form-label">Title</label>
                        <select id="titleBackdrop" class="form-control">
                            <option value="Mr.">Mr.</option>
                            <option value="Mrs.">Mrs.</option>
                            <option value="Miss">Miss</option>
                            <option value="Miss">Ven.</option>
                        </select>
                    </div>
                    <div class="col mb-0">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" id="firstname" class="form-control" placeholder="" />
                    </div>
                    <div class="col mb-0">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" id="dobBackdrop" class="form-control" placeholder="" />
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col mb-3">
                        <label for="nameBackdrop" class="form-label">Name With Initials</label>
                        <input type="text" id="nameBackdrop" class="form-control" placeholder="A.B.C.D.RODRIGO" />
                    </div>
                </div>

                <div class="modal-body">
                    <div id="page1" class="row g-3">
                        <div class="col mb-0">
                            <label for="nameBackdrop" class="form-label">Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="male" name="gender"/>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="female" name="gender"/>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>


                        <div class="col mb-0">
                            <label for="nameBackdrop" class="form-label">Marital Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="single" checked />
                                <label class="form-check-label" for="single">Single</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="married" checked />
                                <label class="form-check-label" for="married">Married</label>
                            </div>
                        </div>
                    </div>

                <div class="row g-2 mt-4">
                    <div class="col mb-0">
                        <label for="emailBackdrop" class="form-label">Email</label>
                        <input type="text" id="emailBackdrop" class="form-control" placeholder="xxxx@xxx.xx" />
                    </div>
                    <div class="col mb-0">
                        <label for="dobBackdrop" class="form-label">DOB</label>
                        <input class="form-control" type="date" value="2021-06-18" id="html5-date-input" />
                    </div>
                </div>

                <div class="row g-2 mt-2">
                    <div class="col mb-0">
                        <label for="tp" class="form-label">Contact No - 1 (personal)</label>
                        <input type="text" id="tp" class="form-control" placeholder="" />
                    </div>
                    <div class="col mb-0">
                        <label for="tp2" class="form-label">Contact No - 2 (Home)</label>
                        <input type="text" id="tp2" class="form-control" placeholder="" />
                    </div>
                </div>
                <div class="row g-2 mt-2">
                    <div class="col mb-0">
                        <label for="nic" class="form-label">NIC No</label>
                        <input type="text" id="nic" class="form-control" placeholder="" />
                    </div>
                    <div class="col mb-0">
                        <label for="passportno" class="form-label">Passport No</label>
                        <input type="text" id="passportno" class="form-control" placeholder="" />
                    </div>
                </div>

                <div class="row g-3 mt-2">
                    <div class="col mb-0">
                        <label for="line1" class="form-label">Address Line - 1</label>
                        <input type="text" id="line1" class="form-control" placeholder="" />
                    </div>
                    <div class="col mb-0">
                        <label for="line2" class="form-label">Address Line - 2</label>
                        <input type="text" id="line2" class="form-control" placeholder="" />
                    </div>
                    <div class="col mb-0">
                        <label for="line3" class="form-label">Address Line - 3</label>
                        <input type="text" id="line3" class="form-control" placeholder="" />
                    </div>
                </div>

            </div>
          </div>
        </div>
      </div>
    </div>
</div>







<div class="modal fade" id="backDropModal" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Personal Informations</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="page1">


                </div>
                <div id="page2" style="display: none;">
                    <!-- Page 2 content -->
                    <h3>Employee Information</h3>
        <div class="row g-3 mt-2">
            <div class="col mb-0">
                <label for="linex1" class="form-label">Address Line - 1</label>
                <input type="text" id="linex1" class="form-control" placeholder="" />
            </div>
            <div class="col mb-0">
                <label for="linex2" class="form-label">Address Line - 2</label>
                <input type="text" id="linex2" class="form-control" placeholder="" />
            </div>
            <div class="col mb-0">
                <label for="linex3" class="form-label">Address Line - 3</label>
                <input type="text" id="linex3" class="form-control" placeholder="" />
            </div>
        </div>
    </div>
                <div id="page3" style="display: none;">
                    <!-- Page 3 content -->

                </div>
            </div>
            <div class="modal-footer mt-4">
                <button type="button" class="btn btn-outline-secondary" onclick="prevPage()">Previous</button>
                <button type="button" class="btn btn-primary" onclick="nextPage()">Next</button>
                <button type="button" class="btn btn-primary" onclick="saveChanges()">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
    let currentPage = 1;

function nextPage() {
    if (currentPage < 3) {
        currentPage++;
        updateModalContent();
    }
}

function prevPage() {
    if (currentPage > 1) {
        currentPage--;
        updateModalContent();
    }
}

function updateModalContent() {
    console.log('Updating modal content for page', currentPage);
    document.getElementById('backDropModalTitle').innerText = 'Page ' + currentPage;
    for (let i = 1; i <= 3; i++) {
        console.log('Setting display for page', i, 'to', i === currentPage ? 'block' : 'none');
        document.getElementById('page' + i).style.display = i === currentPage ? 'block' : 'none';
    }
}

function saveChanges() {
    alert('Changes saved!');
    // You can close the modal if needed
    $('#backDropModal').modal('hide');
}

// Use event listeners to handle button clicks
document.getElementById('nextBtn').addEventListener('click', nextPage);
document.getElementById('prevBtn').addEventListener('click', prevPage);
document.getElementById('saveBtn').addEventListener('click', saveChanges);
</script>

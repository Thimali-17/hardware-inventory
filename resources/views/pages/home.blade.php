@extends('shared.welcome')
@section('content')

<!-- Datatable plugin CSS file -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />

<!-- jQuery library file -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

<!-- Datatable plugin JS library file -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="/src/css/home.css">

<!-- Bootstrap CSS -->
{{--
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<div class="container-fluid">
    <div class="row">
        <div class="card2">
            <div class="col-md-4">
                <div class="card-header">
                    <div class="main-icon">
                        <span class="material-icons" style="font-size: 20px">
                            inventory
                        </span>
                    </div>
                    <h4>Inventory Form</h4>
                </div>
                <div class="card1">
                    <form class="inventory_form" action="/store-inventory" method="post">
                        @csrf
                        <!-- Section 01 -->
                        <div>
                            <label class="inventorylbl">*Department</label>
                            <select class="form-control" name="department" id="departmentId"
                                onchange="showDiv('hidden_div1', this)" required>
                                <option value="0">Select Department</option>
                                <option>IT</option>
                                <option>Admin</option>
                                <option>Human Resources</option>
                                <option>Finance</option>
                                <option>Customer Relations CC</option>
                                <option>Operation SL</option>
                                <option>Operation QSB</option>
                                <option>Operation HSB</option>
                                <option>Operation B&P (H&L)</option>
                                <option>Operation B&P (M)</option>
                                <option>Sales & Marketing</option>
                                <option>Supply Chain Proc</option>
                            </select>
                        </div><br>

                        <div>
                            <div class="sub_form1" id="hidden_div1" style=" gap: 10px;">
                                <div class="form-group" style="width: 40%;">
                                    <label for="exampleInputEmail1">*Emp Number</label>
                                    <input type="text" class="form-control" id="Eno" name="eno" onkeyup="nicCalc()"
                                        maxlength=12 style="text-transform: uppercase; font-size: 11px;">
                                </div>
                                <div class="form-group" id="myDIV1" style="width: 30%">
                                    <label for="exampleInputEmail1">*Emp Name</label>
                                    <input type="text" class="form-control" id="Ename" name="ename" onkeyup="nicCalc()"
                                        style="font-size: 11px;">
                                </div>
                                <div class="form-group" id="myDIV1" style="width: 29%">
                                    <label for="exampleInputEmail1">*Designation</label>
                                    <input type="text" class="form-control" id="Designation" name="designation"
                                        onkeyup="nicCalc()" style="font-size: 11px;">
                                </div>
                            </div><br><br>
                        </div>

                        <!-- Section 02 -->
                        <div>
                            <label class="inventorylbl">*Type</label>
                            <select class="form-control" name="type" id="typeId" onchange="showDiv('hidden_div2', this)"
                                required>
                                <option value="0">Select Type</option>
                                <option>CPU</option>
                                <option>Monitor</option>
                                <option>Laptop</option>
                                <option>UPS</option>
                                <option>Mouse</option>
                                <option>Key Board</option>
                                <option>Printer</option>
                            </select>
                        </div><br>

                         <div class="sub_form1" id="hidden_div2">
                            <div class="form-group" id="myDIV1" style="width: 32%">
                                <label for="exampleInputEmail1">*Brand</label>
                                <input type="text" class="form-control" id="Brand" name="brand" onkeyup="nicCalc()"
                                    style="font-size: 11px;">
                            </div>
                           
                            <div class="form-group" id="myDIV1" style="width: 60%">
                                <label for="exampleInputEmail1">*Warranty (Month)</label>
                                <input type="text" class="form-control" id="Warranty" name="warranty"
                                    onkeyup="nicCalc()" maxlength=6 style="font-size: 11px;">
                            </div>

                               <div class="form-group" id="myDIV1" style="width: 50%">
                                <label for="Spec">*Spec</label>
                                <textarea class="form-control" id="Spec" name="spec" onkeyup="nicCalc()"
                                    style="font-size: 11px; margin-top: 2px;"></textarea>
                            </div>
                        </div>


                        <!-- Form Button -->
                        <button type="submit" class="create-user-btn">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-header">
                    <div class="main-icon">
                        <span class="material-icons" style="font-size: 20px">
                            inventory
                        </span>
                    </div>
                    <h4>Inventory Table</h4>
                </div>
                <div class="tbl-div" style="margin-top: 20px; width: 100%;">
                    <table id="permision_id" class="display" style="width:100%">
                        <thead id="theademployeetab">
                            <tr>
                                <th>Id</th>
                                <th>Action</th>
                                <th>Department</th>
                                <th>Emp_No</th>
                                <th>Emp Name</th>
                                <th>Designation</th>
                                <th>Type</th>
                                <th>Brand</th>
                                <th>Spec</th>
                                <th>Warranty (Month)</th>
                                <th>Uploads</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventoryData as $item)
                            <tr data-id="{{ $item->id }}">
                                <td>
                                    {{ $item->id }}
                                </td>

                                <td>
                                    <div style="display: flex; align-items: center;">
                                        <div onclick="enableEdit(this)" class="edit-btn"
                                            style="cursor: pointer; margin-right: 10px;">
                                            <span class="material-icons">edit</span>
                                        </div>

                                        <div onclick="enableVisible(this)" class="visible-btn" style="cursor: pointer;">
                                            <span class="material-icons">
                                                visibility
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                <td data-field="department">{{ $item->department }}</td>
                                <td data-field="employeenumber" style="text-align: center">{{ $item->employeenumber }}
                                </td>
                                <td data-field="employeename">{{ $item->employeename }}</td>
                                <td data-field="designation">{{ $item->designation }}</td>
                                <td data-field="type">{{ $item->type }}</td>
                                <td data-field="brand">{{ $item->brand }}</td>
                                <td data-field="spec">{{ $item->spec }}</td>
                                <td data-field="warranty" style="text-align: center">{{ $item->warranty }}</td>
                                <td data-field="upload" data-upload-path="{{ $item->upload_path }}">
                                    <input type="file" accept="image/*" style="display: none;"
                                        onchange="uploadFile(this)" />
                                    <div type="button" onclick="triggerFileInput(this)" class="upload-btn">
                                        <span class="material-icons"
                                            style="font-size: 17px; color: {{ $item->upload_path ? '#28a745' : '#999' }}">
                                            upload_file
                                        </span>
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- View Modal -->
<div class="modal fade" id="viewInventoryModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="padding: 20px;">
            <div class="modal-header">
                <div class="main-icon">
                    <span class="material-icons" style="font-size: 20px">
                        inventory
                    </span>
                </div>
                <h4 style="margin-left: 20px">Inventory Table</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    onclick="$('#viewInventoryModal').modal('hide')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- New Row with Emp Info -->
            <div class="row" style="padding: 0 20px 20px 20px; font-size: 12px;">
                <div class="col-md-3"><strong>Department</strong> <br><span id="view_department"></span></div>
                <div class="col-md-3"><strong>Emp Number</strong><br> <span id="view_employeenumber"></span></div>
                <div class="col-md-3"><strong>Emp Name</strong> <br><span id="view_employeename"></span></div>
                <div class="col-md-3"><strong>Designation</strong><br> <span id="view_designation"></span></div>
            </div>

            <div class="modal-body">
                <table class="table table-bordered" style="font-size: 12px; table-layout: fixed; width: 100%;">
                    <tbody>
                        <tr>
                            <th style="width: 25%;">Type</th>
                            <td id="view_type"></td>
                        </tr>
                        <tr>
                            <th style="width: 25%;">Brand</th>
                            <td id="view_brand"></td>
                        </tr>
                        <tr>
                            <th style="width: 25%;">Spec</th>
                            <td id="view_spec"></td>
                        </tr>
                        <tr>
                            <th style="width: 25%;">Warranty</th>
                            <td id="view_warranty"></td>
                        </tr>
                        <tr>
                            <th style="width: 25%;">Image</th>
                            <td id="img">
                                <div class="row" style="padding: 0 20px 20px 0;">
                                    <div class="col-md-4">
                                        <div id="inventory-image-box"
                                            style="width: 100%; height: 150px; display: flex; align-items: center; justify-content: center; background-color: #f9f9f9;">
                                            <span class="material-icons" style="font-size: 80px; color: #c2bfbf;">
                                                image
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="./src/js/permission.js"></script>

<script>
    function enableVisible(button) {
    const row = button.closest('tr');

    document.getElementById('view_department').innerText = row.querySelector('[data-field="department"]').innerText.trim();
    document.getElementById('view_employeenumber').innerText = row.querySelector('[data-field="employeenumber"]').innerText.trim();
    document.getElementById('view_employeename').innerText = row.querySelector('[data-field="employeename"]').innerText.trim();
    document.getElementById('view_designation').innerText = row.querySelector('[data-field="designation"]').innerText.trim();
    document.getElementById('view_type').innerText = row.querySelector('[data-field="type"]').innerText.trim();
    document.getElementById('view_brand').innerText = row.querySelector('[data-field="brand"]').innerText.trim();
    document.getElementById('view_spec').innerText = row.querySelector('[data-field="spec"]').innerText.trim();
    document.getElementById('view_warranty').innerText = row.querySelector('[data-field="warranty"]').innerText.trim();

    // Get image path and preview
    const uploadTd = row.querySelector('[data-field="upload"]');
    const path = uploadTd.dataset.uploadPath;
    if (path) {
        setInventoryImage(`/storage/${path}`);
    } else {
        setInventoryImage(null); 
    }

    $('#viewInventoryModal').modal('show');
}


// function setInventoryImage(imageUrl) {
//     const box = document.getElementById('inventory-image-box');
//     if (imageUrl) {
//         box.innerHTML = `<img src="${imageUrl}" alt="Inventory Image" style="max-width: 100%; max-height: 100%; object-fit: contain;">`;
//     } else {
//         box.innerHTML = `<span class="material-icons" style="font-size: 80px; color: #aaa;">image</span>`;
//     }
// }

// if (res.success) {
//     alert('File uploaded successfully!');

//     const uploadTd = input.closest('td');
//     uploadTd.dataset.uploadPath = res.path; 

//     uploadTd.querySelector('.material-icons').style.color = '#28a745';
// }

    const departmentOptions = [
        'IT',
        'Admin',
        'Human Resources',
        'Finance',
        'Customer Relations CC',
        'Operation SL',
        'Operation QSB',
        'Operation HSB',
        'Operation B&P (H&L)',
        'Operation B&P (M)',
        'Sales & Marketing',
        'Supply Chain Proc'
    ];

    const typeOptions = [
        'CPU',
        'Monitor',
        'Laptop',
        'UPS',
        'Mouse',
        'Key Board',
        'Printer'
    ];

    function showDiv(divId, element) {
        document.getElementById(divId).style.display = element.value !== 'None' ? 'flex' : 'none';
    }

    function enableEdit(button) {
        const row = button.closest('tr');
        button.style.display = 'none';

        let hasChanges = false;

        row.querySelectorAll('td[data-field]').forEach(td => {
            const val = td.innerText.trim();
            const field = td.dataset.field;

            if (field === 'upload') return;

            let inputElement;

            if (field === 'department') {
                inputElement = `<select name="${field}" class="form-control" style="font-size:11px;">
                    ${departmentOptions.map(opt => `<option value="${opt}" ${opt === val ? 'selected' : ''}>${opt}</option>`).join('')}
                </select>`;
            } else if (field === 'type') {
                inputElement = `<select name="${field}" class="form-control" style="font-size:11px;">
                    ${typeOptions.map(opt => `<option value="${opt}" ${opt === val ? 'selected' : ''}>${opt}</option>`).join('')}
                </select>`;
            } else {
                inputElement = `<input type="text" name="${field}" value="${val}" class="form-control" style="font-size:11px;">`;
            }

            td.innerHTML = inputElement;
        });

        const inputs = row.querySelectorAll('input, select');

        inputs.forEach(input => {
            input.addEventListener('input', () => hasChanges = true);
            input.addEventListener('change', () => hasChanges = true);

            input.addEventListener('keypress', function (e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    if (hasChanges) {
                        saveRow(row);
                        hasChanges = false;
                    }
                }
            });
        });

        row.addEventListener('focusout', () => {
            setTimeout(() => {
                if (!row.contains(document.activeElement)) {
                    if (hasChanges) {
                        saveRow(row);
                        hasChanges = false;
                    }
                }
            }, 100);
        });
    }

    function saveRow(row) {
        const id = row.dataset.id;
        const inputs = row.querySelectorAll('input, select');
        const data = { id };

        inputs.forEach(input => data[input.name] = input.value);

        fetch('/update-inventory', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(data)
        }).then(res => res.json()).then(res => {
            if (res.success) {
                inputs.forEach(input => {
                    const td = input.parentElement;
                    td.innerText = input.value;
                });
                row.querySelector('.edit-btn').style.display = 'inline-block';
            } else {
                alert("Update failed");
            }
        });
    }

    function triggerFileInput(button) {
        const fileInput = button.parentElement.querySelector('input[type="file"]');
        fileInput.click();
    }

    function uploadFile(input) {
        const file = input.files[0];
        if (!file) return;

        const row = input.closest('tr');
        const id = row.dataset.id;

        const formData = new FormData();
        formData.append('file', file);
        formData.append('id', id);
        formData.append('_token', '{{ csrf_token() }}');

        fetch('/upload-inventory-file', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(res => {
            if (res.success) {
                alert('File uploaded successfully!');
            } else {
                alert('Upload failed!');
            }
        })
        .catch(() => alert('Upload error.'));
    }


    
function setInventoryImage(imageUrl) {
    const box = document.getElementById('inventory-image-box');
    if (imageUrl) {
        box.innerHTML = `<img src="${imageUrl}" alt="Inventory Image" style="max-width: 100%; max-height: 100%; object-fit: contain;">`;
    } else {
        box.innerHTML = `<span class="material-icons" style="font-size: 80px; color: #aaa;">image</span>`;
    }
}

if (res.success) {
    alert('File uploaded successfully!');

    const uploadTd = input.closest('td');
    uploadTd.dataset.uploadPath = res.path; 

    uploadTd.querySelector('.material-icons').style.color = '#28a745';
}

</script>


@endsection
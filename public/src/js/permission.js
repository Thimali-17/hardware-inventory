/* Initialization of datatable */
$(document).ready(function () {
    $('#permision_id').DataTable({});
});


function myFunction() {
    const getById = id => document.getElementById(id);
    getById("checkBox").style.display = "none";
    getById("myDIV1").style.display = "none";
    getById("checkBox1").style.display = "block";
    getById("myDIV").style.display = "block";

    myFunctionCount++;
    if (myFunctionCount > 2) {
        displayAdminMessage();
    }
}

function myFunction1() {
    const getById = id => document.getElementById(id);
    getById("checkBox").style.display = "block";
    getById("myDIV1").style.display = "block";
    getById("checkBox1").style.display = "none";
    getById("myDIV").style.display = "none";

    myFunction1Count++;
    if (myFunction1Count > 2) {
        displayAdminMessage();
    }
}

let roleModules = new Set();

function fetchRoleModules(roleId) {
    if (roleId == 0) return;
    document.querySelectorAll('.module-checkbox').forEach(cb => cb.checked = false);
    fetch(`/get-modules-for-role/${roleId}`)
        .then(response => response.json())
        .then(data => {
            roleModules = new Set(data);
            data.forEach(moduleId => {
                const cb = document.querySelector(`input[value="${moduleId}"]`);
                if (cb) cb.checked = true;
            });
        })
        .catch(() => document.querySelectorAll('.module-checkbox').forEach(cb => cb.checked = false));
}

document.getElementById('reset').addEventListener('click', () => {
    const icon = document.querySelector('#reset .material-symbols-outlined');
    icon.classList.add('rotate');

    setTimeout(() => {
        icon.classList.remove('rotate');
    }, 600);

    document.querySelectorAll('.module-checkbox').forEach(cb => {
        if (!roleModules.has(cb.value)) {
            cb.checked = false;
        }
    });

    document.querySelectorAll('.submodules, .subsubmodules, .subsubsubmodules').forEach(div => {
        div.style.display = 'none';
    });
});


document.getElementById('delete_all').addEventListener('click', function () {
    document.querySelectorAll('.module-checkbox').forEach(cb => cb.checked = false);

    document.querySelectorAll('.submodules, .subsubmodules, .subsubsubmodules').forEach(el => el.style.display = 'none');
});


function toggleSubmodules(moduleId) {
    var submodulesDiv = document.getElementById('submodules-' + moduleId);
    if (submodulesDiv.style.display === "none") {
        submodulesDiv.style.display = "block";
    } else {
        submodulesDiv.style.display = "none";
    }
}

function toggleSubsubmodules(submoduleId) {
    var subsubmodulesDiv = document.getElementById('subsubmodules-' + submoduleId);
    if (subsubmodulesDiv.style.display === "none") {
        subsubmodulesDiv.style.display = "block";
    } else {
        subsubmodulesDiv.style.display = "none";
    }
}

function toggleSubsubsubmodules(subsubmoduleId) {
    var subsubsubmodulesDiv = document.getElementById('subsubsubmodules-' + subsubmoduleId);
    if (subsubsubmodulesDiv.style.display === "none") {
        subsubsubmodulesDiv.style.display = "block";
    } else {
        subsubsubmodulesDiv.style.display = "none";
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const userDrop = document.getElementById('userdrop');
    const userRoleDiv = document.getElementById('user_role');
    const roleDrop = document.getElementById('roledrop');
    const moduleDiv = document.getElementById('module_div');
    const assignPermissionsButton = document.querySelector('.create-user-btn');

    function toggleVisibility(dropdown, targetDiv, hiddenClass) {
        targetDiv.classList.toggle(hiddenClass, dropdown.value === '0');
    }

    userDrop.addEventListener('change', () => toggleVisibility(userDrop, userRoleDiv, 'hidden'));
    roleDrop.addEventListener('change', () => {
        toggleVisibility(roleDrop, moduleDiv, 'hidden');
        toggleVisibility(roleDrop, assignPermissionsButton, 'hidden');
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const roleDrop = document.getElementById('roledrop');
    const moduleDiv = document.getElementById('module_div');
    const assignPermissionsButton = document.querySelector('.create-user-btn');

    roleDrop.addEventListener('change', function () {
        if (roleDrop.value !== '0') {
            moduleDiv.classList.remove('hidden');
            assignPermissionsButton.classList.remove('hidden');
        } else {
            moduleDiv.classList.add('hidden');
            assignPermissionsButton.classList.add('hidden');
        }
    });
});

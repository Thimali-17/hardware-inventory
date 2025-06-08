function apicall(endpoint, data, method) {
    let x = $.ajax(endpoint, {
        type: method
        , data: data
        , success: function (res) {
            return res;
        }
        , error: function (err) {
            return err;
        }
    });
    return x;
}

async function uploaderapicall(endpoint, formdata, method) {
    let x = await $.ajax({
        url: endpoint
        , type: 'POST'
        , data: formdata
        , async: false
        , cache: false
        , contentType: false
        , enctype: 'multipart/form-data'
        , processData: false
        , success: function (res) {
            return res;
        }
    });
    return x;
}

function generaterandomstring(size) {
    var stream_ = "ABcdefghijkl7890_CDELMNOPmnopqrt123654QRSTUVWFGHIJKXYZac";
    var namestring = "";
    for (var i = 0; i < size; i++) {
        var rand = Math.floor(Math.random() * 55);
        namestring += stream_[rand];
    }
    return namestring;
}

// add module
function showAddModule(event) {
    var dialog = document.getElementById('add_module');

    var leftPosition = 280;

    var topPosition = 60;

    dialog.style.left = `${leftPosition}px`;
    dialog.style.top = `${topPosition}px`;

    dialog.style.display = "block";
}

function closeAddModule() {
    document.getElementById('add_module').style.display = "none";
}

// add sub module
function showAddSubModule(event, moduleId) {
    var dialog = document.getElementById('add_sub_module');
    var moduleInput = document.getElementById('module_id');

    // Set the module ID in the hidden input field
    moduleInput.value = moduleId;

    var leftPosition = 280;
    var topPosition = 250;

    dialog.style.left = `${leftPosition}px`;
    dialog.style.top = `${topPosition}px`;

    dialog.style.display = "block";
}


function closeAddSubModule() {
    document.getElementById('add_sub_module').style.display = "none";
}

// add page
function showAddSubPage(event, subModuleId) {
    event.preventDefault();

    let createPageDialog = document.getElementById('create_page');
    if (!createPageDialog) {
        createPageDialog = document.createElement('dialog');
        createPageDialog.id = 'create_page';
        createPageDialog.classList.add('module_div');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        createPageDialog.innerHTML = `
            <div class="modal-header">
                <div class="card-header">
                    <div class="main-icon">
                        <span class="material-symbols-outlined">
                            view_module
                        </span>
                    </div>
                    <h4>Create Page</h4>
                </div>
                <button type="button" class="close" onclick="closeAddPage()">
                    <span class="material-symbols-outlined">
                        close
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/create-page" method="POST">
                    <input type="hidden" name="_token" value="${csrfToken}">
                    <input type="hidden" name="submodule_id" value="${subModuleId}">
                    <div class="text-field">
                        <label for="">*Page Name</label>
                        <input id="page_name" type="text" name="page_name" style="text-transform: capitalize;" required>
                    </div>
                    <div class="text-field">
                        <div style="display: grid;">
                            <label for="">*Icon</label>
                            <span style="color: red;font-size: 12px;margin-top: -5px;">*Note: Use the
                                <a href="https://fonts.google.com/icons" target="_blank">google icon</a>
                                name
                            </span>
                        </div>
                        <input id="page_icon" type="text" name="page_icon" required>
                    </div>
                    <div class="text-field">
                        <div style="display: grid;">
                            <label for="">*Path</label>
                        </div>
                        <input id="ppage_ath" type="text" name="page_path" required>
                    </div>
                    <div>
                        <label for="">Description</label><br>
                        <textarea name="description" id="description" style="width: 100%;"></textarea>
                    </div>
                    <button type="submit" class="create-user-btn" style="background-color: #595959;">Create Page</button>
                </form>
            </div>`;
        document.body.appendChild(createPageDialog);
    }

    createPageDialog.style.display = "block";

    var offset = event.target.getBoundingClientRect();
    createPageDialog.style.left = `${offset.right}px`;
    createPageDialog.style.top = `${offset.top}px`;

    createPageDialog.showModal();
}


function closeAddPage() {
    location.reload();
    const createPageDialog = document.getElementById('create_page');
    if (createPageDialog) {
        createPageDialog.close();
        createPageDialog.style.display = "none";
    }

    const modalContainer = document.querySelector('.modal-container');
    if (modalContainer) {
        modalContainer.style.pointerEvents = 'auto';
        modalContainer.style.opacity = '1';
    }
}

async function fetchhtmlview(conid,uniuqname){
    //await cleandiv();
    // console.log("fromfetch:",conid);
    u_name = uniuqname;
    // var xmlhttp = new XMLHttpRequest();
    // await xmlhttp.open("GET", content, false);
    // await xmlhttp.send();
    // document.getElementById(conid).innerHTML = await xmlhttp.responseText;
    var tbl = `<div class="container1">
                    <div id="table-header-menu-${uniuqname}" class="table-header-menu">
                        <input type="text" id="search-${uniuqname}" class="search_table" placeholder="Search">
                        <div id="table-header-buttons-${uniuqname}"></div>
                    </div>

                    <div class="table-container">
                        <div class="table1">
                            
                            <div class="table-header" id="table-header-${uniuqname}">
                            </div>
                            <div id="table-body-${uniuqname}" class="table-body">
                                
                            </div>

                            <div id="no-data-message-${uniuqname}" style="display: none; padding: 5px; border-bottom: 1px solid #ddd; font-size:11px;">
                                No Data Found
                            </div>
                        </div>
                    </div>

                    
                    <div class="pagination1">
                        <button id="prev1-${uniuqname}" disabled>
                            <span class="material-symbols-outlined">
                                skip_previous
                            </span>
                        </button>
                        <span id="page-number-${uniuqname}">Page 1</span>
                        <button id="next1-${uniuqname}">
                            <span class="material-symbols-outlined">
                                skip_next
                            </span>
                        </button>
                    </div>

                    
                    <div class="button-controls">
                        <button id="move-to-start-left-${uniuqname}"><i class="fa fa-fast-backward" aria-hidden="true"></i></button>
                        <button id="move-left-${uniuqname}"><i class="fa fa-step-backward" aria-hidden="true"></i></button>
                        <button id="move-right-${uniuqname}"><i class="fa fa-step-forward" aria-hidden="true"></i></button>
                        <button id="move-to-start-right-${uniuqname}"><i class="fa fa-fast-forward" aria-hidden="true"></i></button>
                    </div>
                </div>`;

    document.getElementById(conid).innerHTML = tbl;
    
}



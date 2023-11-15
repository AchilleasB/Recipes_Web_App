const usersAPIendpoint = "http://localhost/api/users";
const recipesAPIendpoint = "http://localhost/api/recipes";

const itemsListContainer = document.getElementById("items-list");
const recipesRadioButtons = document.getElementById("btnradio1");
const usersRadioButtons = document.getElementById("btnradio2");
const addRecipeButtonContainer = document.getElementById("add-recipe-button");
const addUserButtonContainer = document.getElementById("add-user-button");
const addRecipeFormContainer = document.getElementById("add-recipe-form-container")
const addUserFormContainer = document.getElementById("add-user-form-container")


document.addEventListener("DOMContentLoaded", function () {
   
    recipesRadioButtons.addEventListener("click", function () {
        loadItems(recipesAPIendpoint, "recipes");
        htmlAddRecipeButton();
        addUserButtonContainer.innerHTML = null;
        addUserFormContainer.innerHTML = null;
        addRecipeFormContainer.innerHTML = null;

    });

    usersRadioButtons.addEventListener("click", function () {
        loadItems(usersAPIendpoint, "users");
        htmlAddUserButton();
        addRecipeButtonContainer.innerHTML = null;
        addRecipeFormContainer.innerHTML = null;
        addUserFormContainer.innerHTML = null;

    });

    loadItems(recipesAPIendpoint, "recipes");
    htmlAddRecipeButton();

});

function loadItems(apiEndpoint, itemType) {
    itemsListContainer.innerHTML = "";

    const itemsLabel = createItemLabel(itemType);
    const itemList = document.createElement("div");

    fetch(apiEndpoint)
        .then(response => response.json())
        .then(data => {
            data.forEach(item => {
                const itemElement = createItemElement(item, itemType);
                itemList.appendChild(itemElement);
            });

            itemsListContainer.appendChild(itemsLabel);
            itemsListContainer.appendChild(itemList);
        })
        .catch(error => console.log(error));
}

function htmlAddRecipeButton() {
    addRecipeButtonContainer.innerHTML = `
    <div class="d-flex justify-content-center align-items-center" style="height: 10vh;">
        <button id="add-recipe-button" class="btn btn-outline-success btn-lg">Add recipe</a>
    </div>
    `;
}

function htmlAddUserButton() {
    addUserButtonContainer.innerHTML = `
        <div class="d-flex justify-content-center align-items-center" style="height: 10vh;">
            <button id="add-user-button" class="btn btn-outline-success btn-lg">Add user</a>
        </div>
    `;
}

function createItemLabel(itemType) {
    const itemLabel = document.createElement("div");
    itemLabel.classList.add("label", "mb-5", "mt-5");

    if (itemType === "recipes") {
        itemLabel.innerHTML = `
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-8 text-center">
                        <div class="row d-flex align-items-center border-botttom">
                            <div class="col">
                                <div class="item-data-label border-bottom"><em>Image</em></div>
                            </div>
                            <div class="col">
                                <div class="item-data-label border-bottom"><em>Title</em></div>
                            </div>
                            <div class="col">
                                <div class="item-data-label border-bottom"><em>Creator</em></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    } else if (itemType === "users") {
        itemLabel.innerHTML = `
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-8 text-center">
                        <div class="row d-flex align-items-center border-botttom">
                            <div class="col">
                                <div class="item-data-label border-bottom"><em>Name</em></div>
                            </div>
                            <div class="col">
                                <div class="item-data-label border-bottom"><em>Email</em></div>
                            </div>
                            <div class="col">
                                <div class="item-data-label border-bottom"><em>Role</em></div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        `;
    }

    return itemLabel;
}

function createItemElement(item, itemType) {
    const itemElement = document.createElement("div");
    itemElement.classList.add("item", "mb-5", "mt-5");

    let itemData = "";

    if (itemType === "recipes") {
        itemData = `
            <div class="row border-bottom">
                <div class="col-sm-6 col-md-8 text-center">
                    <div class="row d-flex align-items-center">
                        <div class="col">
                            <span class="item-data-value"><img src="${item.image_path}" class="img-thumbnail" style="max-width: 100px; height: auto;"></span>
                        </div>
                        <div class="col">
                            <span class="item-data-value">${item.title}</span>
                        </div>
                        <div class="col">
                            <span class="item-data-value">by ${item.creator}</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 d-flex mt-3 mb-3 ">
                    ${htmlGenerateButtons()}
                </div>
            </div>
            <div class="container" id="edit-recipe-container-${item.id}">
            </div>
        `;
    } else if (itemType === "users") {
        itemData = `
            <div class="row border-bottom">
                <div class="col-sm-6 col-md-8 text-center">
                    <div class="row d-flex align-items-center">
                        <div class="col">
                            <span class="item-data-value">${item.name}</span>
                        </div>
                        <div class="col">
                            <span class="item-data-value">${item.email}</span>
                        </div>
                        <div class="col">
                            <span class="item-data-value">${item.role}</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 d-flex mb-3 ">
                    ${htmlGenerateButtons()}
                </div>
            </div>
            <div class="container" id="edit-user-container-${item.id}">
            </div> 
        `;
    }

    itemElement.innerHTML = itemData;

    const editButton = itemElement.querySelector(".edit-item-button");
    editButton.addEventListener("click", function () {
        if (itemType === "recipes") {
            handleEditRecipe(item);
        } else if (itemType === "users") {
            handleEditUser(item);
        }
    });

    const deleteButton = itemElement.querySelector(".delete-item-button");
    deleteButton.addEventListener("click", function () {
        if (itemType === "recipes") {
            handleDeleteRecipe(item.id);
        } else if (itemType === "users") {
            handleDeleteUser(item.id);
        }
    });

    return itemElement;
}

function htmlGenerateButtons() {
    return `
        <div class="row">
            <div class="col">
                <span class="item-data-value">
                    <button class="btn btn-outline-primary edit-item-button">Edit</button>
                </span>
            </div>
            <div class="col">
                <span class="item-data-value">
                    <button class="btn btn-outline-danger delete-item-button">Delete</button>
                </span>
            </div>
        </div>
    `;
}

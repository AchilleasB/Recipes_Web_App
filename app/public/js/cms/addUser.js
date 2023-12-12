
document.addEventListener("DOMContentLoaded", function () {

    const addUserButton = document.getElementById("add-user-button");

    addUserButton.addEventListener("click", function () {

        htmlAddUserForm();

        const saveUser = document.getElementById("save-user-button");
        saveUser.addEventListener("click", function (e) {
            e.preventDefault();
            saveUserDataToDatabase();
            addUserFormContainer.innerHTML = null;

        });

        const closeUserForm = document.getElementById("close-user-form");
        closeUserForm.addEventListener("click", function () {
            addUserFormContainer.innerHTML = null;
        });

    })
});


function htmlAddUserForm() {
    addUserFormContainer.innerHTML = `
    <form id="add-user-form">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input class="form-control" id="email" name="email" rows="3" required></input>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <input class="form-control" id="role" name="role" rows="3" required></input>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" aria-describedby="passwordHelpBlock" required>
        </div>
        <button type="submit" class="btn btn-primary" id="save-user-button">Save</button>
        <button type="submit" class="btn btn-danger" id="close-user-form">Close</button>
    </form>
`;
}


async function saveUserDataToDatabase() {
    await fetch(`/api/users`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            name: document.getElementById("name").value,
            email: document.getElementById("email").value,
            role: document.getElementById("role").value,
            password: document.getElementById("password").value
        })
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            itemsListContainer.innerHTML = "";
            loadItems(usersAPIendpoint, "users");
        })
        .catch(error => console.log(error));

}
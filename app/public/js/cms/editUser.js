
function handleEditUser(user){

    const editUserContainerId = `edit-user-container-${user.id}`;
    const editUserContainer = document.getElementById(editUserContainerId);

    editUserContainer.innerHTML = `
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form id="edit-user-form" style="margin-top:6px">
                <h3>Edit ${user.name}'s Information</h3>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="edit-user-name" name="${user.name}" value="${user.name}" class="form-control" aria-describedby="nameHelpBlock" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="edit-user-email" name="${user.email}" value="${user.email}" class="form-control" aria-describedby="emailHelpBlock" required>
                </div>
                <div class="mb-3">
                    <input type="hidden" id="edit-user-password" name="password" value="${user.password}">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" value="********" class="form-control" disabled>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <input type="text" id="edit-user-role" name="${user.role}" value="${user.role}" class="form-control" aria-describedby="roleHelpBlock" required>
                </div>
                <button type="submit" class="btn btn-primary" id="update-user-button">Update</button>
                <button type="submit" class="btn btn-danger" id="close-user-button">Close</button>
            </form>
        </div>
    </div>
    `;

    const updateUserButton = document.getElementById("update-user-button");

    updateUserButton.addEventListener("click", function (e) {
        e.preventDefault();
        updateUserData(user);
        loadItems(usersAPIendpoint, "users");
        editUserContainer.innerHTML = null;
    });

    const closeUserFormButton = document.getElementById("close-user-button");

    closeUserFormButton.addEventListener("click", function () {
        editUserContainer.innerHTML = null;
    });
           
}

async function updateUserData(user) {
    await fetch(`/api/users/editUser`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            id: user.id,
            name: document.getElementById("edit-user-name").value,
            email: document.getElementById("edit-user-email").value,
            password: document.getElementById("edit-user-password").value,
            role: document.getElementById("edit-user-role").value
        })
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
        })
        .catch(error => console.log(error));
}

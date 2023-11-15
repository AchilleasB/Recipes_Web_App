async function handleDeleteUser(itemId) {
    await fetch(`/api/users/deleteUser/${itemId}`, {
        method: "DELETE"
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            console.log(itemId);
            loadItems(usersAPIendpoint, "users");
        })
        .catch(error => console.log(error));
}

async function handleDeleteUser(item) {
    await fetch(`/api/users`, {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            id: item.id,
            name: item.name
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

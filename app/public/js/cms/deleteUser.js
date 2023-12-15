async function handleDeleteUser(item) {
    const response = await fetch(`/api/users`, {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            id: item.id,
            name: item.name
        })
    });

    const data = await response.json();
    console.log(data);
    itemsListContainer.innerHTML = "";
    loadItems(usersAPIendpoint, "users");
}

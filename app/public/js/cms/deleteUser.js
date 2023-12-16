async function handleDeleteUser(item) {
    const request = await fetch(`/api/users`, {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            id: item.id,
            name: item.name
        })
    });

    const response = await request.json();
    console.log(response);
    itemsListContainer.innerHTML = "";
    loadItems(usersAPIendpoint, "users");
}

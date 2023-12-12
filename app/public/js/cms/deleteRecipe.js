async function handleDeleteRecipe(item) {
    await fetch(`/api/recipes`, {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            id: item.id,
            title: item.title
        })
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            itemsListContainer.innerHTML = "";
            loadItems(recipesAPIendpoint, "recipes");
        })
        .catch(error => console.log(error));
}
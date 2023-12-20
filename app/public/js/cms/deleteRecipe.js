async function handleDeleteRecipe(item) {
    const response = await fetch(`/api/recipes`, {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            id: item.id,
            title: item.title
        })
    });
    
    const data = await response.json();
    console.log(data);
    displayMessage(data.message, 3000);
    itemsListContainer.innerHTML = "";
    loadItems(recipesAPIendpoint, "recipes");
}
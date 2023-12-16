async function handleDeleteRecipe(item) {
    const request = await fetch(`/api/recipes`, {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            id: item.id,
            title: item.title
        })
    });
    
    const response = await request.json();
    console.log(response);
    itemsListContainer.innerHTML = "";
    loadItems(recipesAPIendpoint, "recipes");
}
function handleDeleteRecipe(itemId) {
    fetch(`/api/recipes/deleteRecipe/${itemId}`, {
        method: "DELETE"
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            console.log(itemId);
            loadItems(recipesAPIendpoint, "recipes");
        })
        .catch(error => console.log(error));
}
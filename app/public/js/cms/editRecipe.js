
function handleEditRecipe(recipe) {
    const editRecipeContainerId = `edit-recipe-container-${recipe.id}`;
    const editRecipeContainer = document.getElementById(editRecipeContainerId);

    editRecipeContainer.innerHTML = `
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form id="edit-recipe-form" style="margin-top:6px">
                <h3>Edit ${recipe.title}'s Information</h3>
                <div class="mb-3">
                    <input type="hidden" id="id" name="id" rows="3" value="${recipe.id}"></input>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input class="form-control" id="title" name="title" rows="3" value="${recipe.title}" required></input>
                </div>
                <div class="mb-3">
                    <label for="creator" class="form-label">Creator</label>
                    <input class="form-control" id="creator" name="creator" rows="3" value="${recipe.creator}" required></input>
                </div>
                <div class="mb-3">
                    <label for="ingredients" class="form-label">Ingredients</label>
                    <input class="form-control" id="ingredients" name="ingredients" rows="3" value="${recipe.ingredients}" required></input>
                </div>
                <div class="mb-3">
                    <label for="instructions" class="form-label">Instructions</label>
                    <input class="form-control" id="instructions" name="instructions" rows="3" value="${recipe.instructions}" required></input>    
                </div>
                <div class="mb-3">
                    <label for="prep-time" class="form-label">Preparation Time</label>
                    <input type="text" class="form-control" id="prep_time" name="prep_time" value="${recipe.prep_time}" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                    <input type="hidden" id="image_path" name="image_path" value="${recipe.image_path}">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" id="category" name="category_id"  required>
                        <option value="1" ${recipe.$category_id === 1 ? 'selected' : ''}>Salads</option>
                        <option value="2" ${recipe.$category_id === 2 ? 'selected' : ''}>Pasta</option>
                        <option value="3" ${recipe.$category_id === 3 ? 'selected' : ''}>Fish</option>
                        <option value="4" ${recipe.$category_id === 4 ? 'selected' : ''}>Meat</option>
                        <option value="5" ${recipe.$category_id === 5 ? 'selected' : ''}>Desserts</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" id="update-recipe-button">Update</button>
                <button type="button" class="btn btn-danger" id="close-recipe-button">Close</button>
            </form>
        </div>
    </div>
`;

    const updateRecipeButton = document.getElementById("update-recipe-button");

    updateRecipeButton.addEventListener("click", function (e) {
        e.preventDefault();
        updateRecipeData();
        editRecipeContainer.innerHTML = null;
    });

    const closeRecipeFormButton = document.getElementById("close-recipe-button");

    closeRecipeFormButton.addEventListener("click", function () {
        editRecipeContainer.innerHTML = null;
    });

}

async function updateRecipeData() {
    const formData = new FormData(document.getElementById("edit-recipe-form"));

    console.log("FormData Content:");
    formData.forEach((value, key) => {
        console.log(key, value);
    });

    const response = await fetch("/api/recipes", {
        method: "POST",
        body: formData
    });

    const data = await response.json();
    console.log(data);
    itemsListContainer.innerHTML = "";
    loadItems(recipesAPIendpoint, "recipes");
}

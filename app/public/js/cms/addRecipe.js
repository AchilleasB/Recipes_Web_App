
document.addEventListener("DOMContentLoaded", function () {

    const addRecipeButton = document.getElementById("add-recipe-button");

    addRecipeButton.addEventListener("click", function () {

        htmlAddRecipeForm();

        const saveRecipe = document.getElementById("save-recipe-button");

        saveRecipe.addEventListener("click", function (e) {
            e.preventDefault();
            saveRecipeDataToDatabase();
            addRecipeFormContainer.innerHTML = null;
        });

        const closeRecipeForm = document.getElementById("close-recipe-button");

        closeRecipeForm.addEventListener("click", function () {
            addRecipeFormContainer.innerHTML = null;
        });
    });
});


function htmlAddRecipeForm() {

    addRecipeFormContainer.innerHTML = `
    <form id="add-recipe-form" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredients</label>
            <textarea class="form-control" id="ingredients" name="ingredients" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="instructions" class="form-label">Instructions</label>
            <textarea class="form-control" id="instructions" name="instructions" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="prep_time" class="form-label">Preparation Time</label>
            <input type="text" class="form-control" id="prep_time" name="prep_time" required>
        </div>
        <div class="mb-3">
            <label for="creator" class="form-label">Creator</label>
            <input type="text" class="form-control" id="creator" name="creator" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" id="category" name="category_id" required>
                <option value="" disabled selected>Select a category</option>
                <option value="1">Salads</option>
                <option value="2">Pasta</option>
                <option value="3">Fish</option>
                <option value="4">Meat</option>
                <option value="5">Desserts</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" id="save-recipe-button">Save</button>
        <button type="button" class="btn btn-danger" id="close-recipe-button">Close</button>
    </form>
`;
}



function saveRecipeDataToDatabase() {
    const formData = new FormData(document.getElementById("add-recipe-form"));

    fetch("/api/recipes", {
        method: "POST",
        body: formData
    })
        .then(response => {
            console.log(response);
        })
        .then(data => {
            console.log(data);
        })
        .catch(error => console.log(error));
}




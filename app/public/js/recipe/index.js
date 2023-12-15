import { addToFavorites, removeFromFavorites, initializeFavorites } from '../favorite/index.js';

document.addEventListener('DOMContentLoaded', initializePageByCategory);

const page = getPageFromURL();

function initializePageByCategory() {
    try {
        console.log('page: ', page);

        if (page === 'Salads') {
            loadRecipesByCategory(1)
        } else if (page === 'Pasta') {
            loadRecipesByCategory(2)
        } else if (page === 'Fish') {
            loadRecipesByCategory(3)
        } else if (page === 'Meat') {
            loadRecipesByCategory(4)
        } else if (page === 'Desserts') {
            loadRecipesByCategory(5)
        } else if (page === 'favorites') {
            initializeFavorites();
        } else {
            console.log('Page not found');
        }

    } catch (error) {
        console.error('Error initializing:', error);
    }
}

async function loadRecipesByCategory(categoryId) {
    const recipesData = await getDataFromRecipesAPI();
    const recipes = recipesData.filter(recipe => recipe.category_id === categoryId);
    displayRecipes(recipes);
}

async function getDataFromRecipesAPI() {

    console.log('getting recipes data ...');
    try {
        const response = await fetch('http://localhost/api/recipes');
        if (!response.ok) {
            throw new Error('Failed to fetch data');
        }
        const data = await response.json();
        return data;
    }
    catch (error) {
        console.log(error);
        return [];
    }

}


export function displayRecipes(recipes) {

    console.log("generating recipes ...")

    const container = document.getElementById('recipes');

    const wrapper = document.createElement('div');
    wrapper.classList.add('row');

    for (let i = 0; i < recipes.length; i++) {
        const recipeCard = generateRecipeCard(recipes[i]);
        wrapper.appendChild(recipeCard);
    }

    container.appendChild(wrapper);

    console.log('recipes generated ...')

}

function getPageFromURL() {
    const url = window.location.href;
    const urlParts = url.split('/');
    const page = urlParts[urlParts.length - 1];
    return page;
}

export function generateRecipeCard(recipe) {

    const cardContainer = document.createElement('div');
    cardContainer.classList.add('recipe-card', 'h-50', 'w-100', 'mb-3', 'shadow-sm', 'p-5');

    const cardBody = document.createElement('div');
    cardBody.classList.add('recipe-card-body', 'd-flex', 'align-items-center', 'justify-content-between');

    const cardImage = htmlRecipeCardImage(recipe);
    const cardDetails = htmlRecipeCardDetails(recipe);

    cardBody.appendChild(cardImage);
    cardBody.appendChild(cardDetails);
    cardContainer.appendChild(cardBody);

    return cardContainer;

}

function htmlRecipeCardImage(recipe) {
    const cardImage = document.createElement('div');
    const image = document.createElement('img');
    cardImage.classList.add('card-image', 'col-md-5');
    image.classList.add('w-100', 'h-100', 'object-fit-cover');
    image.src = recipe.image_path;
    cardImage.appendChild(image);
    return cardImage;
}

function htmlRecipeCardDetails(recipe) {
    const cardDetails = document.createElement('div');
    cardDetails.classList.add('card-details', 'w-50', 'px-3');

    const cardTitle = htmlRecipeTitle(recipe);
    cardDetails.appendChild(cardTitle);

    const cardIngredients = htmlRecipeIngredients(recipe);
    cardDetails.appendChild(cardIngredients);

    const cardInstructions = htmlRecipeInstructions(recipe);
    cardDetails.appendChild(cardInstructions);

    const cardPrepTime = htmlRecipePrepTime(recipe);
    cardDetails.appendChild(cardPrepTime);

    const cardCreator = htmlRecipeCreator(recipe);
    cardDetails.appendChild(cardCreator);

    const addToOrRemoveFromFavoritesButton = htmlAddToOrRemoveFromFavoritesButton();
    cardDetails.appendChild(addToOrRemoveFromFavoritesButton);

    addToOrRemoveFromFavoritesButton.addEventListener('click', () => {

        console.log('User id: ', loggedInUserId);
        console.log('Recipe object: ', recipe);
        console.log('Recipe id: ', recipe.id);

        if (loggedInUserId !== null) {
            if (page == 'favorites') {
                removeFromFavorites(recipe.id, loggedInUserId);
            } else {
                addToFavorites(recipe.id, loggedInUserId);
            }

            const recipesList = document.getElementById('recipes');
            recipesList.innerHTML = '';
            initializePageByCategory();
            
        } else {
            alert('Please log in to add to favorites');
            window.location.href = 'http://localhost/login';
        }
    });

    return cardDetails;
}


function htmlRecipeTitle(recipe) {
    const cardTitle = document.createElement('h5');
    cardTitle.classList.add('card-title', 'mb-5');
    cardTitle.innerHTML = recipe.title;

    return cardTitle;
}

function htmlRecipeIngredients(recipe) {
    const ingredientsSection = document.createElement('div');

    const cardIngredientsTitle = document.createElement('h6');
    cardIngredientsTitle.classList.add('ingredients-title', 'mt-3', 'border-bottom');
    cardIngredientsTitle.innerHTML = 'Ingredients: ';

    const cardIngredients = document.createElement('p');
    cardIngredients.classList.add('card-ingredients', 'mb-3');
    cardIngredients.innerHTML = recipe.ingredients;

    ingredientsSection.appendChild(cardIngredientsTitle);
    ingredientsSection.appendChild(cardIngredients);

    return ingredientsSection;
}

function htmlRecipeInstructions(recipe) {

    const instructionsSection = document.createElement('div');

    const cardInstructionsTitle = document.createElement('h6');
    cardInstructionsTitle.classList.add('instructions-title', 'mt-3', 'border-bottom');
    cardInstructionsTitle.innerHTML = 'Instructions: ';

    const cardInstructions = document.createElement('p');
    cardInstructions.classList.add('card-instructions', 'mb-3');
    cardInstructions.innerHTML = recipe.instructions;

    instructionsSection.appendChild(cardInstructionsTitle);
    instructionsSection.appendChild(cardInstructions);

    return instructionsSection;
}

function htmlRecipePrepTime(recipe) {
    const prepTimeSection = document.createElement('div');

    const cardPrepTimeTitle = document.createElement('h6');
    cardPrepTimeTitle.classList.add('preptime-title', 'mt-3', 'border-bottom');
    cardPrepTimeTitle.innerHTML = 'Preparation time: ';

    const cardPrepTime = document.createElement('p');
    cardPrepTime.classList.add('card-preptime', 'mb-3');
    cardPrepTime.innerHTML = recipe.prep_time;

    prepTimeSection.appendChild(cardPrepTimeTitle);
    prepTimeSection.appendChild(cardPrepTime);

    return prepTimeSection;
}

function htmlRecipeCreator(recipe) {
    const creatorSection = document.createElement('div');

    const cardCreatorTitle = document.createElement('h6');
    cardCreatorTitle.classList.add('creator-title', 'mt-3', 'border-bottom');
    cardCreatorTitle.innerHTML = 'Created by: ';

    const cardCreator = document.createElement('p');
    cardCreator.classList.add('card-creator', 'mb-3');
    cardCreator.innerHTML = recipe.creator;

    creatorSection.appendChild(cardCreatorTitle);
    creatorSection.appendChild(cardCreator);

    return creatorSection;
}

function htmlAddToOrRemoveFromFavoritesButton() {
    const addToOrRemoveFromFavoritesButton = document.createElement('button');
    if (page == 'favorites') {
        addToOrRemoveFromFavoritesButton.classList.add('btn', 'btn-danger', 'mt-3');
        addToOrRemoveFromFavoritesButton.innerHTML = 'Remove from Favorites';
    } else {
        addToOrRemoveFromFavoritesButton.classList.add('btn', 'btn-primary', 'mt-3');
        addToOrRemoveFromFavoritesButton.innerHTML = 'Add to Favorites';
    }

    return addToOrRemoveFromFavoritesButton;
}





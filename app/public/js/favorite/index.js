import { displayRecipes } from '../recipe/index.js';

async function getLoggedInUserFavoriteRecipes() {
    console.log('Fetching favorites ...');
    const response = await fetch('http://localhost/api/favorites');
    const data = await response.json();
    return data;
}

export async function initializeFavorites() {
    try {
        const favorites = await getLoggedInUserFavoriteRecipes();
        console.log(favorites);
        favorites.forEach(favorite => {
            displayRecipes(favorite);
        });
    } catch (error) {
        console.error('Error initializing:', error);
    }
}

// document.addEventListener('DOMContentLoaded', initializeFavorites);

export async function addToFavorites(recipeId, loggedInUserId){

    await fetch('/api/favorites', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            user_id: loggedInUserId,
            recipe_id: recipeId
            })
    })
    .then(response => response.json())
    .then(data=> {
        console.log('Response:', data);
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

export async function removeFromFavorites(recipeId, loggedInUserId){
    
    await fetch('/api/favorites', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            user_id: loggedInUserId,
            recipe_id: recipeId})
    })
    .then(response => response.json())
    .then(data=> {
        console.log('Response:', data);
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

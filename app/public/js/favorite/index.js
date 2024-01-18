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

export async function addToFavorites(recipeId, loggedInUserId) {

    const response = await fetch('/api/favorites', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            user_id: loggedInUserId,
            recipe_id: recipeId
        })
    })
    const data = await response.json();
    displayMessage(data.message, 3000);
    console.log(data);
}

export async function removeFromFavorites(recipeId, loggedInUserId) {

    const response = await fetch('/api/favorites', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            user_id: loggedInUserId,
            recipe_id: recipeId
        })
    })

    const data = await response.json();
    displayMessage(data.message, 3000);
    console.log(data);
}

function displayMessage(message, duration){
    const messageContainer = document.createElement("div");
    messageContainer.style.position = "fixed";
    messageContainer.style.top = "50%";
    messageContainer.style.left = "50%";
    messageContainer.style.transform = "translate(-50%, -50%)";
    messageContainer.style.background = "rgba(0, 0, 0, 0.7)";
    messageContainer.style.color = "white";
    messageContainer.style.padding = "10px";
    messageContainer.style.borderRadius = "5px";
    messageContainer.innerText = message;

    document.body.appendChild(messageContainer);

    setTimeout(() => {
        document.body.removeChild(messageContainer);
    }, duration);
}
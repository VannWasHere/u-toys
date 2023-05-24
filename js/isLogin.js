if (isLoggedIn) {
    document.getElementById('userLogged').style.display = 'block';
    document.getElementById('userNotLogged').style.display = 'none';
} else if (isLoggedIn !== undefined) {
    document.getElementById('userLogged').style.display = 'none';
    document.getElementById('userNotLogged').style.display = 'block';
}

console.log(isLoggedIn);
document.addEventListener("DOMContentLoaded", () => {
    fetch("backend/get_menu.php")
        .then(response => response.json())
        .then(data => {
            const menuList = document.getElementById("menu-list");
            menuList.innerHTML = data.map(item => `
                <div class="menu-item">
                    <img src="img/${item.image}" alt="${item.name}">
                    <div class="details">
                        <h3>${item.name}</h3>
                        <p>${item.description}</p>
                        <p><strong>Price:</strong> $${item.price}</p>
                    </div>
                </div>
            `).join("");
        })
        .catch(error => console.error("Error loading menu:", error));
});

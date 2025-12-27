// Load softwares from admin dashboard
const softwares = JSON.parse(localStorage.getItem("softwares")) || [];

// Load earnings
let earnings = parseInt(localStorage.getItem("earnings")) || 0;

// Store container
const storeGrid = document.getElementById("storeGrid");

// Render softwares
function renderStore() {
  storeGrid.innerHTML = "";

  if (softwares.length === 0) {
    storeGrid.innerHTML = "<p style='opacity:0.6'>No software available yet.</p>";
    return;
  }

  softwares.forEach(soft => {
    const card = document.createElement("div");
    card.className = "card";

    card.innerHTML = `
      <h2>${soft.name}</h2>
      <p>${soft.desc}</p>
      <div class="price">₹${soft.price}</div>
      <button class="buy-btn" onclick="buySoftware(${soft.price})">
        Buy Now
      </button>
    `;

    storeGrid.appendChild(card);
  });
}

// Buy logic (demo payment)
function buySoftware(price) {
  const confirmBuy = confirm(
    "Confirm purchase for ₹" + price + " ?"
  );

  if (!confirmBuy) return;

  // Add earnings to admin
  earnings += parseInt(price);
  localStorage.setItem("earnings", earnings);

  alert("Purchase successful! (Demo)");
}

// Init
renderStore();

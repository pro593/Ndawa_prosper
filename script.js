let panier = [];
let total = 0;

function acheter(nom, prix) {
    panier.push({nom, prix});
    total += prix;

    afficherPanier();
}

function afficherPanier() {
    let liste = document.getElementById("liste-panier");
    liste.innerHTML = "";

    panier.forEach(item => {
        let li = document.createElement("li");
        li.textContent = item.nom + " - " + item.prix + " FCFA";
        liste.appendChild(li);
    });

    document.getElementById("total").textContent = total;
}

function payer() {
    let mode = document.getElementById("paiement").value;

    if (panier.length === 0) {
        alert("Panier vide !");
        return;
    }

    alert("Paiement réussi via " + mode + " ✅");
    panier = [];
    total = 0;
    afficherPanier();
}
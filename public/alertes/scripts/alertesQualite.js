

const alertes = document.querySelectorAll('.alerte');

let maxHeight = 0;

alertes.forEach(alerte => {
    const height = alerte.offsetHeight;
    if (height > maxHeight) {
        maxHeight = height;
    }
});

alertes.forEach(alerte => {
    alerte.style.height = maxHeight + 'px';
});


let switchCategorie;

function changerDeCategorie() {
    if (!switchCategorie) {
        document.querySelector(".bouton-categorie.active").classList.remove("active");
        document.querySelectorAll(".bouton-categorie")[1].classList.add("active");
        switchCategorie = true;
    } else {
        document.querySelector(".bouton-categorie.active").classList.remove("active");
        document.querySelectorAll(".bouton-categorie")[0].classList.add("active");

        switchCategorie = false;
    }
}

function preventDefaultScroll(e) {
    e.preventDefault();
    e.stopPropagation();
}




document.querySelectorAll(".container-bouton-supprimer-alerte").forEach(function (e) {
    e.addEventListener("click", function () {
        document.querySelector(".bgr").style.top = window.scrollY + "px";
        document.querySelector(".bgr").classList.remove("opacity-0");
        document.querySelector(".fenetre-demande-de-supprimer").style.top = window.scrollY + (window.innerHeight / 100 * 30) + "px";

        function supprimerAlerte() {

        }

        document.querySelector(".bouton-acceptation-de-suppression").onclick = function () {
            e.parentElement.parentElement.remove();
            fetch("/alertes/evaluation/supprimer/" + e.parentElement.parentElement.id, {
                method: "DELETE",
            });

            document.querySelector(".bgr").classList.remove("opacity-1");
            document.querySelector(".fenetre-demande-de-supprimer").classList.add("hidden");
            document.querySelector("body").removeEventListener("wheel", preventDefaultScroll)

            document.querySelector(".bgr").classList.add("opacity-0");
            let nouveauBouton = document.createElement("div");
            nouveauBouton.classList.add("bouton-acceptation-de-suppression");

        }


        document.querySelector(".fenetre-demande-de-supprimer").classList.remove("hidden");

        document.querySelector("body").addEventListener("wheel", preventDefaultScroll, { passive: false });
        document.querySelector(".bgr").classList.add("opacity-1");

        document.querySelector(".bouton-refuse-de-suppression").addEventListener("click", function () {
            document.querySelector(".bgr").classList.remove("opacity-1");
            document.querySelector(".fenetre-demande-de-supprimer").classList.add("hidden");
            document.querySelector("body").removeEventListener("wheel", preventDefaultScroll)

            document.querySelector(".bgr").classList.add("opacity-0");
            document.querySelector(".bouton-acceptation-de-suppression").addEventListener("click", function () { });
        })
    })
})

document.querySelectorAll(".btn-marquer-alerte").forEach(function (element) {
    element.addEventListener("click", function (e) {
        e.preventDefault();
        element.outerHTML = `<div class="marque-lu">
        <img src="{{ asset('imgs/path1.png') }}" alt="" width="39" height="29" />
    </div>`;
    })
});

function marquerCommeLu(id) {
    console.log(id);
    fetch("/alertes/evaluation/marquer-comme-lu/" + id, {
        method: "POST",
    });

}

// modification de pagination

if (document.querySelector(".pagination .first a")) {
    document.querySelector(".pagination .first a").textContent = "Première page";
}

if (document.querySelector(".pagination .last a")) {
    document.querySelector(".pagination .last a").textContent = "Dernière page";
}

if (document.querySelector(".pagination .current").textContent == 2)
    document.querySelector(".pagination .first a").remove();

if (document.querySelector(".pagination .current").textContent == 3)
    document.querySelector(".pagination .first a").remove();

function trierParFormation(selectElement) {
    window.location.href = selectElement.value;
}

function trier(e, formation) {
    e.preventDefault();
    if (document.querySelector(".champ-saisie-stagiaire").value.split(" ").length > 3) return undefined;
    let baseUrl;
    if (!document.querySelector(".champ-saisie-stagiaire").value.length) {
        baseUrl = window.location.origin + "/alertes/evaluation" + "/trier";
        
        window.location.href = baseUrl + "?formationId=" + formation + "&stagiaireNomPrenom=" + document.querySelector(".champ-saisie-stagiaire").value.length;
        return undefined;
    }
    let [nom, prenom] = document.querySelector(".champ-saisie-stagiaire").value.split(" ");

    baseUrl = window.location.origin + "/alertes/evaluation" + "/trier";
    window.location.href = baseUrl + "?formationId=" + formation + "&stagiaireNomPrenom=" + nom + "%20" + prenom;
}

let formationId = false; 




document.getElementById("form-filter").addEventListener("submit", function (e) {
    trier(e, formationId)
})

document.querySelector(".liste-formation").addEventListener("change", function (e) {
    formationId = e.target.value;
    trier(e,formationId);
})
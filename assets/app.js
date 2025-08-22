/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
import 'flowbite';

import { Application } from '@hotwired/stimulus'
import { definitionsFromContext } from '@hotwired/stimulus-webpack-helpers'

// Démarrer Stimulus
const application = Application.start()

// Charger automatiquement tous les contrôleurs de /controllers
const context = require.context('./controllers', true, /\.js$/)
application.load(definitionsFromContext(context))


let stagiaireListeFormation = document.querySelectorAll(".stagiaire-liste-formation")

document.querySelectorAll(".pagination-sofiane-actif, .pagination-sofiane").forEach((v,k,p) =>
{
    v.addEventListener("click", ()=>
    {

        p.forEach(lmn => {
            if(lmn == v)
            {
                lmn.classList.remove("pagination-sofiane")
                lmn.classList.add("pagination-sofiane-actif")
                console.log(lmn, v)
            }
            else
            {
                console.log(lmn, v)
                lmn.classList.add("pagination-sofiane")
                lmn.classList.remove("pagination-sofiane-actif")
            }
        });


        stagiaireListeFormation.forEach((list, kBis)=>
        {
            if(kBis == k)
            {
                list.classList.remove("hidden")
            }
            else
            {
                list.classList.add("hidden")
            }
        })
        stagiaireListeFormation[k].classList.remove("hidden")

    })
})
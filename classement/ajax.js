let array = []
let hidden = document.getElementById("profil");

hidden.classList.add("invisible");
hidden.classList.remove("visible");

fetch('stock.json')
    // transformation en données normal
    .then(res => res.json())

    // res => réponse du json
    // data => données récupéré.

    .then(data => {
            data.forEach(element => {
                array.push(element.pseudo + "/" + element.total_score + "/" + element.game_played + "/" + element.image)


            });

            // On a établi un tableau array dans lequel on push chaque élément JSON. (voir JSON)

    })


          const search = document.getElementById('search');
          const matchList = document.getElementById('match-list');

          const searchStates = async searchText => {

            // Await permet d'attendre la résolution des promesses .then

                const res = await fetch('stock.json');
                const states = await res.json();

                // le filter crée un nouveau tableau ( ici state ) avec les éléments qui réussissent le test filter.
                let matches = states.filter(state => {

                    // RegExp est utile pour la reconnaissance d'un modèle dans un texte,
                    // si il match je le range dans regex
                    const regex = new RegExp(`^${searchText}`,'gi');

                    // Et on retourne regex si il match au tableau
                    return state.pseudo.match(regex)
                })

                // la taille de seachText est strictement égale à 0,
                // on réinitialise le tableau matches

                if(searchText.length === 0){
                    matches = [];
                }

                // on déclenche la fonction outputHtml avec en paramètre matches
                exit(matches);
          }

          // Si le tableau matches est supérieur à 0.

          const exit = matches =>  {
              if(matches.length > 0){

                    const html = matches.map(match => `
                    <div class="bg-white search-bar">
                    <div id="recup" type="button" class="text-dark fw-2" onclick="doAjax(this)"> ${match.pseudo}</div>
                    </div>
                    `)
                    .join('');

                    matchList.innerHTML = html;
              }else{
                matchList.innerHTML = null;
              }
          }

          // A chaque input on enclanche searStates avec la valeur de l'input
          search.addEventListener('input', () => searchStates(search.value))

          function doAjax(x){


            let points2 = document.getElementById("points");
            let game = document.getElementById("game_p");
            let pseudo2 = document.getElementById("name");
            let imagen = document.getElementById('imagen')

            let recup = x.innerHTML;

    

            for(i=0; i<array.length; i++){
                const str = array[i].split('/')
                let salu = str[0].trim();
                let points = str[1].trim()
                let game_p = str[2].trim()
                let image = str[3].trim()
                


                // -- FONCTION PRINCIPALE D AFFICHAGE

                if(recup.trim() === salu ){


                    hidden.classList.remove("invisible");
                    hidden.classList.add("visible");
                    pseudo2.innerHTML = 'Pseudo : ' + salu;
                    game.innerHTML = 'Nombre de parties joués : ' + game_p;
                    points2.innerHTML = 'Vos nombre de points : ' + points;
                    imagen.src ="/uploads/" + image;
                    
                


                }
            }



          }

(function (){
    const artistasInput = document.querySelector("#artistas");
    
    if(artistasInput){
        let artistas = [];
        let artistasFiltrados = [];

        const listadoArtistas = document.querySelector("#listado-artistas");
        const artistaHidden = document.querySelector('[name="artista_id"]');

        obtenerArtistas();
        artistasInput.addEventListener("input", buscarArtistas);

        if(artistaHidden.value){
            (async ()=>{
                const artista = await obtenerArtista(artistaHidden.value);
                const {nombre} = artista;
                const artistaDOM = document.createElement("LI");
                artistaDOM.classList.add("listado-artistas__artista", "listado-artistas__artista--seleccionado");
                artistaDOM.textContent = `${nombre}`;
                listadoArtistas.appendChild(artistaDOM);
            })();
        }

        async function obtenerArtistas(){
            const url = "/api/artistas";

            respuesta = await fetch(url);
            resultado = await respuesta.json();
            formatearArtistas(resultado);
        }

        async function obtenerArtista(id){
            const url = `/api/artista?id=${id}`;
            const respuesta = await fetch(url);
            const resultado = respuesta.json();
            return resultado;
        }

        function formatearArtistas(arrayArtistas = []){
            artistas = arrayArtistas.map(artista => {
                return {
                    nombre : `${artista.nombre.trim()}`,
                    id: `${artista.id}`
                }
            });
        }

        function buscarArtistas(e) {
            const busqueda = e.target.value;
            if(busqueda.length > 3){
                const expresion = new RegExp(busqueda, "i");
                artistasFiltrados = artistas.filter( artista => {
                    if(artista.nombre.toLowerCase().search(expresion) != -1){
                        return artista; 
                    }
                })
                mostrarArtistas();
            } else {
                artistasFiltrados = [];
            }
        }

        function mostrarArtistas(){

            while(listadoArtistas.firstChild){
                listadoArtistas.removeChild(listadoArtistas.firstChild);
            }

            if(artistasFiltrados.length > 0){
                artistasFiltrados.forEach( artista => {
                    const artistaHtml = document.createElement("LI");
                    artistaHtml.classList.add("listado-artistas__artista");
                    artistaHtml.textContent = artista.nombre;
                    artistaHtml.dataset.artistaId = artista.id;
                    artistaHtml.onclick = seleccionarArtista;

                    //Agregar al dom
                    listadoArtistas.appendChild(artistaHtml);
                });
            } else {
                const noResultados = document.createElement("P");
                noResultados.classList.add("listado-artistas__no-resultado");
                noResultados.textContent = "No hay resultados para tu búsqueda";
                listadoArtistas.appendChild(noResultados);
            }

        }

        function seleccionarArtista(e){
            const artista = e.target;

            //Remover la clase previa
            const artistaPrevio = document.querySelector(".listado-artistas__artista--seleccionado");
            if(artistaPrevio){
                artistaPrevio.classList.remove("listado-artistas__artista--seleccionado");
            }
            artista.classList.add("listado-artistas__artista--seleccionado");

            artistaHidden.value = artista.dataset.artistaId;
        }
    }
})();
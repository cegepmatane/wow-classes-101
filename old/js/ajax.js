function afficherDetailSpecialisation(id)
{
    ajax = new XMLHttpRequest();
    url = "https://theholydomain.com/devoir-ajax-2023-GalahadIII/dao/detaillerSpecialisation.php?id="+id;
    ajax.open('GET', url, true);
    ajax.onreadystatechange = function( ) 
    { 
        if(4 == ajax.readyState) 
        {
            console.log('recevoirRecevoirSpecialisation()');
            specialisation = JSON.parse(ajax.responseText);
            specialisation = new Specialisation (specialisation.nom, specialisation.description, specialisation.role, specialisation.distanceCombat, specialisation.id);
            document.getElementById('zone-affichage').innerHTML = "<h3>Nom : "+specialisation.nom+"</h3>" + "<h3>Description : </h3> <p>"+specialisation.description+"</p>";
        }
    };	
    ajax.send('');
}
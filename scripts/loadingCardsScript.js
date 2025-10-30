let formData = new FormData();
    formData.append("search", search);
    
    fetch("actions/getCardCount.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
    })
    .catch(error => console.error("Erreur :", error));
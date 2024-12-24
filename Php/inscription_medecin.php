<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', 'Data@Brain314', 'gooddoctor'); 


// Récupérer les données du formulaire
$MedID = $_POST['MedID'];
$Nom = $_POST['Nom'];
$Prenom = $_POST['Prenom'];
$Age = $_POST['Age'];
$Sex = $_POST['Sex'];
$MotDePasse = $_POST['MotDePasse'];
$AdresseMail = $_POST['AdresseMail'];
$Specialites = $_POST['Specialites'];

// Insérer les données dans la base de données
$sql = "INSERT INTO medecin (MedID, Nom, Prenom, Age, Sex, MotDePasse, AdresseMail, Specialites)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Erreur lors de la préparation de la requête : " . $conn->error);
}

$stmt->bind_param("ssssssss", $MedID, $Nom, $Prenom, $Age, $Sex, $MotDePasse, $AdresseMail, $Specialites);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Vous êtes inscrit!";
} else {
    echo "Erreur lors de l'inscription. Veuillez réessayer.";
}

// Fermer la connexion
$conn->close();
?>

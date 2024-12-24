<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', 'Data@Brain314', 'gooddoctor'); 

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$SecuID = $_POST['SecuID'];
$Nom = $_POST['Nom'];
$Prenom = $_POST['Prenom'];
$Age = $_POST['Age'];
$Sex = $_POST['Sex'];
$MotDePasse = $_POST['MotDePasse'];
$AdresseMail = $_POST['AdresseMail'];


// Insérer les données dans la base de données
$sql = "INSERT INTO patient (SecuID, Nom, Prenom, Age, Sex, MotDePasse, AdresseMail)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);


$stmt->bind_param("sssssss", $SecuID, $Nom, $Prenom, $Age, $Sex, $MotDePasse, $AdresseMail);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Vous êtes inscrit!";
} else {
    echo "Erreur lors de l'inscription. Veuillez réessayer.";
}

$conn->close(); // Fermez la connexion

?>

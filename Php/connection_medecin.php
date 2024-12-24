<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', 'Data@Brain314', 'gooddoctor');

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les données soumises par le formulaire
$MedID = $_POST['MedID'];
$MotDePasse = $_POST['MotDePasse'];

// Préparer et exécuter la requête SQL pour vérifier les informations d'identification
$sql = "SELECT * FROM medecin WHERE MedID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $MedID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // L'utilisateur existe, vérifier le mot de passe
    $user = $result->fetch_assoc();
    if ($user['MotDePasse'] === $MotDePasse) {
        // Le mot de passe correspond, connexion réussie
        echo "Connexion réussie ! Bienvenue, " . htmlspecialchars($user['Prenom']) . " " . htmlspecialchars($user['Nom']);
        // Démarrer une session pour conserver l'état de connexion
        session_start();
        $_SESSION['MedID'] = $MedID;
        $_SESSION['Prenom'] = $user['Prenom'];
        $_SESSION['Nom'] = $user['Nom'];
        // Rediriger vers une autre page si nécessaire
        header("Location: page_de_maintenance.html");
        exit();
    } else {
        // Mot de passe incorrect
        echo "Mot de passe incorrect. Veuillez réessayer.";
    }
} else {
    // Aucun utilisateur trouvé avec ce MedID
    echo "Aucun compte trouvé avec ce numéro de medecin.";
}

// Fermer la connexion
$conn->close();
?>

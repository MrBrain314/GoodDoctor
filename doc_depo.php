<?php
$conn = new mysqli('localhost', 'root', '', 'gooddoctor'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['document'])) {
    $user_id = 1; // Remplacez par l'ID utilisateur connecté
    $upload_dir = 'uploads/';
    $file_name = basename($_FILES['document']['name']);
    $file_path = $upload_dir . $file_name;

    // Vérifiez si le fichier a bien été téléchargé
    if (move_uploaded_file($_FILES['document']['tmp_name'], $file_path)) {
        // Enregistrez le fichier dans la base de données
        $stmt = $conn->prepare("INSERT INTO documents (user_id, file_name, file_path) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $file_name, $file_path);
        $stmt->execute();

        echo "Document déposé avec succès. <a href='Interface-Patient.html'>Retour</a>";
    } else {
        echo "Erreur lors du dépôt du document.";
    }
} else {
    echo "Aucun fichier sélectionné.";
}


// Récupérez les documents de l'utilisateur
$documents = [];
$sql = "SELECT file_name FROM documents WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $documents[] = $row['file_name'];
}

$stmt->close();



?>

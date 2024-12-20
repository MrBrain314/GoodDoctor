<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déposer un document</title>
    <link rel="stylesheet" href="style_doc.css">
</head>
<body>
    <div class="container">
        <!-- Section pour déposer un document -->
        <div class="form-section">
            <h1>Déposer un document</h1>
            <form action="doc_depo.php" method="POST" enctype="multipart/form-data">
                <label for="document">Choisissez un document :</label>
                <input type="file" name="document" id="document" required>
                <button type="submit">Déposer</button>
            </form>
        </div>

        <!-- Section pour afficher les documents déjà enregistrés -->
        <div class="documents-section">
            <h2>Vos documents</h2>
            <ul>
                <?php if (empty($documents)): ?>
                    <li>Aucun document trouvé.</li>
                <?php else: ?>
                    <?php foreach ($documents as $document): ?>
                        <li><?= htmlspecialchars($document) ?></li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</body>
</html>

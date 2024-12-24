<?php
session_start();


$Prenom = isset($_SESSION['Prenom']) ? $_SESSION['Prenom'] : 'Prénom';
$Nom = isset($_SESSION['Nom']) ? $_SESSION['Nom'] : 'Nom';
$SecuID = $_SESSION['SecuID'];
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/Interface-Patient.css">
    <title>Accueil GoodDoctor</title>
</head>
<body>
        <!-- Barre de navigation -->
        <header>
            <div class="logo">
                <img src="../image/Logo.jpg" alt="Logo de téléconsultation">
                <p>GoodDoctor</p>
            </div>
            <nav>
                <a href="#">Accueil</a>
                <a href="#services">Nos Services</a>
                <a href="#about">À Propos</a>
                <a href="#contact">Nous Contacter</a>
                <a href="deposer_document.php"> Mes Documents</a>
            </nav>
            <div class="profil-menu">
             <div class="profil-info" onclick="toggleMenu()">
                <img src="../image/Photo profil.jpeg" alt="Photo du patient" class="profil-photo">
                <span class="profil-nom"><?php echo htmlspecialchars($Prenom) . ' ' . htmlspecialchars($Nom); ?></span>
             </div>
            <div class="menu-deroulant" id="menu">
                <div class="profil-details">
                    <img src="../image/Photo profil.jpeg" alt="Photo du patient" class="menu-photo">
                    <span class="profil-nom"><?php echo htmlspecialchars($Prenom) . ' ' . htmlspecialchars($Nom); ?></span>
                    <span class="menu-email"><?php echo htmlspecialchars($SecuID) ?></span>
                </div>
                <a href="profil.html">Mon Profil</a>
                <a href="parametres.html">Paramètres</a>
                <a href="deconnexion.php">Se Déconnecter</a>
                </div>
            </div>
        </header>

        <!-- Section centrale -->
        <main>
            <div class="image-main">
                <img src="../image/Doctoresse.jpg" alt="Médecin en téléconsultation">
            </div>
            <div class="main-content">
                    <h1>Bienvenue sur <span class="welcome">GoodDoctor</span></h1>
                    <p>Votre plateforme de  <br>
                        prise de rendez-vous <br>
                         en ligne.
                    </p>
                    <div class="searching">
                        <form action="post" action="GoodDoctor.php">
                            <p>
                                <input type="search" name="doctor" id="doctor" placeholder="Recherchez un Docteur">
                                <input type="search" name="specialite" id="specialite" placeholder="Recherchez une spécialité">
                            </p>
                        </form>
                    </div>
            </div>
        </main>

         <!-- Section Prise de Rendez-vous -->
         <section id="rdv" class="rdv-section">
            <h2 class="rdv-title">Prendre un Rendez-vous</h2>
            <div class="rdv-container">
                <form action="#" method="post" class="rdv-form">
                    <!-- Sélection de la spécialité -->
                    <label for="speciality">Spécialité :</label>
                    <select id="speciality" name="speciality" required>
                        <option value="" disabled selected>-- Sélectionnez une spécialité --</option>
                        <option value="cardiologie">Cardiologie</option>
                        <option value="dermatologie">Dermatologie</option>
                        <option value="pediatrie">Pédiatrie</option>
                        <option value="generaliste">Médecine Générale</option>
                    </select>

                    <!-- Sélection de la date -->
                    <label for="date">Date :</label>
                    <input type="date" id="date" name="date" class="temps" required>

                    <!-- Sélection de l'heure -->
                    <label for="time">Heure :</label>
                    <input type="time" id="time" name="time" class="temps" required>

                    <!-- Bouton de soumission -->
                    <button type="submit" class="btn-rdv">Confirmer le Rendez-vous</button>
                </form>
            </div>
        </section>

        <!--Nos Services-->
        <section class="services" id="services">
            <h2 class="services-title">Nos Services</h2>
            <div class="services-container">
                <!-- Service 1: Prise de rendez-vous -->
                <div class="service-item">
                    <img src="../image/RDV.jpg" alt="Prise de rendez-vous" class="service-image">
                    <h3 class="service-title">Prise de rendez-vous</h3>
                    <p class="service-description">
                        Planifiez facilement vos rendez-vous grâce à notre plateforme intuitive et rapide.
                    </p>
                </div>
        
                <!-- Service 2: Consultation Vidéos -->
                <div class="service-item">
                    <img src="../image/Teleconsultation.jpg" alt="Consultation Vidéos" class="service-image">
                    <h3 class="service-title">Consultation Vidéos</h3>
                    <p class="service-description">
                        Accédez à des consultations vidéo en direct avec nos experts, où que vous soyez.
                    </p>
                </div>
        
                <!-- Service 3: Suivis -->
                <div class="service-item">
                    <img src="../image/Suivi.jpg" alt="Suivis" class="service-image">
                    <h3 class="service-title">Suivis</h3>
                    <p class="service-description">
                        Profitez d'un suivi personnalisé pour garantir votre satisfaction et vos progrès.
                    </p>
                </div>
            </div>
        </section>
            
        
        <!-- Section À Propos -->
            <section id="about" class="about-us"">
                <div class="about-container">
                    <div class="about-image">
                        <img src="../image/about-img.png" alt="Femme sur un canapé">
                    </div>
                    <div class="about-content">
                        <h2>À PROPOS</h2>
                        <p>Chez <span class="good">GoodDoctor</span>, nous croyons en l'importance de la santé pour tous. 
                            Nous offrons des services de prise de rendez-vous simplifiés, des consultations en ligne 
                            accessibles et un suivi personnalisé, pour que vous puissiez rester en bonne santé sans effort.
                        </p>
                        <button class="read-more">En savoir plus</button>
                    </div>
                </div>
            </section>
            <!--Nous contacter-->
            <section id="contact" class="contact-us">
                <div class="contact-container">
                    <!-- Formulaire -->
                    <div class="contact-form">
                        <h2>NOUS CONTACTER</h2>
                        <form action="#" method="post">
                            <input type="text" name="name" placeholder="Votre Nom" required>
                            <input type="tel" name="phone" placeholder="Numéro de Téléphone" required>
                            <input type="email" name="email" placeholder="Email" required>
                            <textarea name="message" placeholder="Message" rows="4" required></textarea>
                            <button type="submit">ENVOYER</button>
                        </form>
                    </div>
            
                    <!-- Image de la carte -->
                    <div class="contact-map">
                        <img src="../image/Contacter.png" alt="Carte de localisation" style="width: 100%; height: auto; border-radius: 10px;">
                    </div>
                </div>
            </section>
           
            <footer>
               <div class="footer-container">
                    <div class="contacts-us">
                        <div class="logo-final">
                            <img src="../image/LOGOFINAL.png" alt="">
                        </div>
                        <div class="nous-voir">
                            <div class="nous-joindres">
                                <img src="../image/Tel.png" alt="tel">
                                <p>Call : +33 0753843098</p>
                                
                            </div>
                        </div>
                        <div class="nous-joindre">
                            <img src="../image/Mail.png" alt="email">
                            <p>Email : bastououro314@gmail.com</p>
                            
                        </div>
                        <div class="nous-joindress">
                            <img src="../image/Location.png" alt="">
                            <p>Localisation</p>
                        </div>
                    </div>
                    <div class="other">
                        <div class="final-links">
                            <div class="links">
                                <a href="#services">Nos Services</a>
                                <a href="#about">À Propos</a>
                                <a href="#contact">Nous Contacter</a>
                            </div>
                        </div>
                        <div class="medical">
                            <p class="texte-medical">Vitalité</p>
                            <div class="image-medical">
                                <img src="../image/M5.png" alt="m5">
                                <img src="../image/M1.png" alt="m1">
                                <img src="../image/M4.png" alt="m4">
                                <img src="../image/M2.png" alt="m2">
                                <img src="../image/M6.png" alt="m6">
                                <img src="../image/M3.png" alt="m3">
                            </div>
                        </div>
                        <div class="else">
                            <div class="texte-else">
                                <p>Inscrivez-vous pour nos informations</p>
                            </div>
                            <form action="traitement.php" method="post" class="nosinfo">
                                <label for="email">
                                    <input type="email" name="email" placeholder="Entrer votre mail" required>
                                </label>
                                    <input type="submit" value="S'abonner" class="abonne">
                            </form>
                            <div class="nosreseau">
                                <img src="../image/Face.png" alt="Facebook">
                                <img src="../image/Twitter.png" alt="X">
                                <img src="../image/Insta.png" alt="Insta">
                                <img src="../image/Link.png" alt="Linked">
                            </div>
                        </div>
                    </div>
               </div>
            </footer>
            <p class="copy"> &copy;copyright 2024 <span class="signature">MrBrain</span>. Tous droits réservés.</p>

            <script>
               function toggleMenu(event) {
                    event.stopPropagation();
                    const menu = document.getElementById('menu');
                    menu.classList.toggle('active');
                }

                function closeMenu() {
                    const menu = document.getElementById('menu');
                    menu.classList.remove('active');
                }

                document.querySelector('.profil-info').addEventListener('click', toggleMenu);
                document.addEventListener('click', closeMenu);
                document.getElementById('menu').addEventListener('click', function(event) {
                    event.stopPropagation();
                });

            </script>
            
</body>
</html>

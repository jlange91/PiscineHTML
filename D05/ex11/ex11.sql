SELECT UPPER(fiche_personne.nom) as 'NOM', prenom, prix
FROM fiche_personne
JOIN membre ON membre.id_fiche_perso = fiche_personne.id_perso
JOIN abonnement ON membre.id_abo = abonnement.id_abo
WHERE abonnement.prix > 42
ORDER BY fiche_personne.nom, prenom;

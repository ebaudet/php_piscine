SELECT UPPER(C.nom) AS NOM, C.prenom, A.prix
FROM abonnement A
INNER JOIN membre B ON A.id_abo = B.id_abo
INNER JOIN fiche_personne C ON B.id_fiche_perso = C.id_perso
WHERE A.prix > 42
ORDER BY NOM, C.prenom;

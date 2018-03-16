SELECT count(*)
FROM historique_membre
WHERE date BETWEEN '30-10-2006' AND ' 27-07-2007'
OR MONTH(date) = 12 AND DAY(date) = 24;

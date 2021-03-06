<?
/**
 * Prepared.php
 * 
 * Where all of the global SQL queries are defined and prepared
 * 
 * @category php file
 * @author Matthew Hutchings
 */
?>

<?php

/*
 * $names
 * 
 * gets all information about the 5 most recent films in the database sorted by thier theatrical release
 * 
 */

$names = $db->prepare('

SELECT *
FROM film
LIMIT 5;
ORDER BY theatricalRelease Desc;

');

/*
 * $reviewCounter
 * 
 * Gets the top 3 films by the number of positive reviews 
 * 
 */

$reviewCounter = $db->prepare('

SELECT COUNT(review.id) as num, film.name, film.id, film.description
FROM film
INNER JOIN review
ON film.id = review.film_id
WHERE review.liked = 1
GROUP BY film.name
ORDER BY COUNT(review.id) DESC

LIMIT 3;

');

/*
 * $reviewNumber
 * 
 * selects all IDs from the review table, used to count the number of reviews on the website
 * 
 */

$reviewNumber = $db->prepare('

SELECT id
FROM review;

');

/*
 * $number 
 * 
 * selects all IDs from the film table, used to count the number of film on the website
 * 
 */

$number = $db->prepare('

SELECT id
FROM film;

');

/*
 * $random 
 * 
 * gets all information about a random film within the film table
 * 
 */

$random = $db->prepare('

SELECT *
FROM film
ORDER BY RAND();
LIMIT 1;

');

/*
 * $filmInfo 
 * 
 * gets all information about every film within the film database
 * 
 */

$filmInfo = $db->prepare('

SELECT *
FROM film

');

/*
 * $filmInfoI
 * 
 * gets the imbd id of all films in the database
 */

$filmInfoI = $db->prepare('

SELECT imdb_id
FROM film;

');

/*
 * $genrenames 
 * 
 * creates a new table view with a genre name and genre id from the genre and film tables
 * 
 */

$genreNames =$db->prepare('

SELECT DISTINCT genre.name, genre.id
FROM genre
INNER JOIN film
ON genre.id = film.genre_id;

');


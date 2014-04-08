<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   connexion.php                                      :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: ebaudet <ebaudet@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2014/04/06 21:10:16 by ebaudet           #+#    #+#             */
/*   Updated: 2014/04/06 21:10:45 by ebaudet          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

	include ("connect.php");
	$login = isset($_POST["login"]) ? mysql_real_escape_string(htmlspecialchars($_POST['login'])) : "";
	$pass = isset($_POST["pass"]) ? mysql_real_escape_string(htmlspecialchars($_POST['pass'])) : "";
	$pass = hash('whirlpool', $pass);
	echo $pass."<br/>\n";
	$query = "SELECT * FROM `user` WHERE `pseudo` = '" . $login . "' AND `password` = '" . $pass . "';";
	$res = mysqli_query($con, $query);
	$val = mysqli_num_rows($res);
	echo $val;
	if (!$val)
		header('Location: index.php?error=login');
	else
	{
		include ("session.php");
		header('Location: index.php');
	}
?>

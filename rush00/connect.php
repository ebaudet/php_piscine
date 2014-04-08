<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   connect.php                                        :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: ebaudet <ebaudet@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2014/04/06 13:38:01 by ebaudet           #+#    #+#             */
/*   Updated: 2014/04/06 13:44:10 by ebaudet          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

// inclusion des variables de connexion
include ("configuration.php");

$con = mysqli_connect($host, $user, $password, $dbname) or die("ERROR" . mysmysqli_error($con));

?>